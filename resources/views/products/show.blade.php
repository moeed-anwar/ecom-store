<x-app-layout>
<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-white shadow-md rounded-xl p-6">
        <!-- Product Image -->
        <div class="w-full h-full flex items-center justify-center">
            <img src="{{ asset('assets\SD_01_T53_2621U_NB_X_EC_0.avif') }}" alt="{{ $product->name }}" class="rounded-xl object-contain w-full max-h-[500px]">
        </div>

        <!-- Product Details -->
        <div class="space-y-4">
            <h1 class="text-3xl font-bold text-gray-800">{{ $product->name }}</h1>
            <p class="text-gray-600 text-sm">{{ $product->description }}</p>

            <!-- Reviews -->
                <div class="flex items-center space-x-1 text-yellow-300">
                    <p>★★★★★</p>
                    <span class="text-sm text-green-500">({{ rand(100, 1000) }} Reviews)</span>
                </div>

            <!-- Price -->
            <div class="text-2xl font-semibold text-emerald-600">${{$product->price}}</div>

            <!-- Add to Cart -->
            <form action="{{route('checkout.index',$product)}}" method="GET">
                @csrf
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2 px-6 rounded-lg shadow transition">
                    Add to Cart
                </button>
            </form>
        </div>
    </div>
</div>
<x-footer>
</x-footer>
</x-app-layout>