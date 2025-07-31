<x-app-layout>
            <section class=" bg-transparent bg-gradient-to-r from-green-400 via-emerald-500 to-teal-500 py-16 md:py-24">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center text-black">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">{{$category->name}}</h1>
                <p class="text-xl opacity-90 mb-8">{{$category->description}}</p>
            </div>
        </div>
    </section>
    <div class=" px-12 pt-5">
        <h1 class=" font-bold text-xl uppercase">Products available in {{$category->name}} category</h1>
    </div>
       <div class="w-[90%] flex flex-wrap gap-6 justify-between m-auto mt-3">
    @foreach ($products as $product)
    <a href="{{route('products.show',[$product->slug])}}" class="w-full sm:w-[48%] md:w-[30%] lg:w-[22%]">
    <div class=" shadow-md hover:shadow-lg transition-shadow duration-300 rounded-lg text-black mt-3 overflow-hidden">
        <div class="bg-white flex items-center justify-center">
            <img src="{{ asset($product->image) }}" alt="{{$product->name}}" class="h-48 object-cover rounded-t-lg">
        </div>
        <div class="px-4 py-5 text-black">
            <div class="flex flex-col mb-2">
                <span class="text-xl font-bold">{{ $product->name }}</span>
                <span class="text-sm text-gray-500">{{ $product->name}}</span>
            </div>
            <div class="flex justify-between items-center">
                <p class="text-lg font-semibold text-green-500">${{$product->price}}</p>
                <div class="flex items-center space-x-1 text-yellow-300">
                    @if($product->stock > 0)
                        <p class=" text-green-500">In stock</p>
                    
                    @else
                        <p class=" text-red-600">Out of stock</p>
                    
                    @endif
                    {{-- <p>★★★★★</p>
                    <span class="text-sm text-green-500">({{ rand(100, 1000) }})</span> --}}
                </div>
            </div>
        </div>
    </div>
    </a>
    @endforeach
    <div class="w-[90%] m-auto mt-10">
    {{ $products->links() }}
</div>
</div>
<x-footer>
</x-footer>
</x-app-layout>