<x-app-layout>
    <div class="flex flex-col lg:flex-row gap-6 w-[90%] m-auto py-6">
        <!-- Left Section: Checkout Form -->
        <div class="flex-1 pt-4 px-6 shadow-md bg-white rounded-lg">
            <h1 class="text-2xl font-bold mb-4">Checkout Details</h1>
            <h2 class="text-lg font-semibold mb-4">Personal Information</h2>
            
            <form method="POST" action="{{route('checkout.store',$product)}}" id="stripe-form">
                @csrf 
                <!-- Name Fields -->
                <div class="flex flex-col md:flex-row gap-4 mb-6">
                    <div class="w-full">
                        <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                        <input type="text" name="first_name" placeholder="Enter Your First Name" class="w-full p-2 border rounded-md text-sm" value="{{ old('first_name') }}">
                        @error('first_name')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                        <input type="text" name="last_name" placeholder="Enter Your Last Name" class="w-full p-2 border rounded-md text-sm" value="{{ old('last_name') }}">
                        @error('last_name')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Email and Phone -->
                <div class="flex flex-col gap-4 mb-6">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" placeholder="Enter Your Email" class="w-full p-2 border rounded-md text-sm" value="{{ old('email') }}">
                        @error('email')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <input type="text" name="phone" placeholder="Enter Your Phone Number" class="w-full p-2 border rounded-md text-sm" value="{{ old('phone') }}">
                        @error('phone')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="mb-6">
                    <h3 class="text-md font-semibold mb-2">Additional Information</h3>
                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Order Notes <span class=" text-gray-600 text-sm">(optional)</span></label>
                        <textarea name="notes" id="notes" rows="3" class="w-full p-2 border rounded-md text-sm">{{ old('notes') }}</textarea>
                        @error('notes')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <input type="hidden" name="price" value="{{$product->price}}">
                <input type="hidden" name="stripeToken" id="stripe-token">
                {{-- ADDING STRIPE CARD  --}}
               <div class="mb-6">
    <label for="card-element" class="block text-sm font-medium text-gray-700 mb-1">Card Details</label>
    <div id="card-element" class="w-full p-2 border rounded-md text-sm bg-white"></div>
    <div id="card-errors" role="alert" class="text-sm text-red-600 mt-1"></div>
</div>
                <!-- Submit Button -->
                <div class="w-full mb-4">
                    <button type="button" onclick="createToken()" class="bg-green-500 w-full text-white text-sm font-semibold text-center py-3 rounded-md hover:bg-green-700 transition duration-200">
                        Pay ${{ $product->price }}
                    </button>
                </div>
            </form>
        </div>

        <!-- Right Section: Order Summary -->
        <div class="w-full lg:w-[35%] shadow-md p-4 bg-white rounded-md flex-shrink-0">
            <h1 class="font-bold text-xl mb-4">Order Summary</h1>

            <!-- Product Image and Info -->
            <div class="flex h-1/2 items-center gap-4 pb-4">
                <div class="w-24 h-24 flex-shrink-0">
                    @if ($product->image)
                        <img src="{{ asset($product->image) }}" alt="Product Image" class="w-full h-full object-cover rounded">
                    @else
                        <div class="w-full h-full bg-green-500 rounded-sm"></div>
                    @endif
                </div>
                <div class="flex-1">
                    <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
                    <p class="text-sm text-gray-500">{{ $product->description }}</p>
                </div>
            </div>

            <!-- Subtotal & Total -->
            <div class="border-t pt-4 flex justify-between text-sm">
                <div>
                    <h2 class="text-gray-600 mb-1">Subtotal</h2>
                    <h2 class="text-gray-900 font-semibold">Total</h2>
                </div>
                <div class="text-right">
                    <h2 class="text-gray-600 mb-1">${{ $product->price }}</h2>
                    <h2 class="text-gray-900 font-semibold">${{ $product->price }}</h2>
                </div>
            </div>
        </div>
    </div>

   
</x-app-layout>
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        var stripe = Stripe('{{env("STRIPE_KEY")}}');
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');
        function createToken() {
            stripe.createToken(cardElement).then(function(result) {
             // Handle result.error or result.token
             console.log(result);
             if (result.token) {
                document.getElementById('stripe-token').value = result.token.id ;
                document.getElementById('stripe-form').submit() ;
             }
             
            });
        }

    </script>
