<x-app-layout>
        <div class="flex w-[90%] m-auto h-auto justify-between mb-5 pt-10">
        <div class=" text-2xl font-bold text-black ">
            <h1>Browse By Categories</h1>
        </div>
        <div>
            <a href="{{route('categories.index')}}" class=" text-black hover:underline">View All</a>
        </div>
    </div>

<div class="flex flex-wrap gap-12 justify-center w-[90%] mx-auto">

    <!-- Box 1: Mens -->
        <a href="{{route('categories.show',['category' => 'men'])}}" class=" block w-full sm:w-[48%] md:w-[30%] lg:w-[22%]">
    <div class="relative  h-40 rounded-xl shadow-lg bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 hover:scale-105 transition-transform duration-300 p-4 text-white">
        <div class="font-bold text-xl">Men</div>
        <p class="text-sm mt-1">Clothing, footwear, and accessories for men</p>
       
    </div>
     </a>

    <!-- Box 2: Womens -->
    <a href="{{route('categories.show',['category' => 'women'])}}" class=" block w-full sm:w-[48%] md:w-[30%] lg:w-[22%]">
    <div class="relative h-40 rounded-xl shadow-lg bg-gradient-to-r from-green-400 via-emerald-500 to-teal-500 hover:scale-105 transition-transform duration-300 p-4 text-white">
        <div class="font-bold text-xl">Women</div>
        <p class="text-sm mt-1">Trendy apparel and fashion for women</p>
    </div>
    </a>

    <!-- Box 3: kids -->
    <a href="{{route('categories.show',['category' => 'kids'])}}" class=" block w-full sm:w-[48%] md:w-[30%] lg:w-[22%]">
    <div class="relative h-40 rounded-xl shadow-lg bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 hover:scale-105 transition-transform duration-300 p-4 text-white">
        <div class="font-bold text-xl">Kids</div>
        <p class="text-sm mt-1">Clothes and essentials for boys and girls</p>
    </div>
       </a>

    <!-- Box 4: Accessories -->
    <a href="{{route('categories.show',['category' => 'accessories'])}}" class=" block w-full sm:w-[48%] md:w-[30%] lg:w-[22%]">
    <div class="relative h-40 rounded-xl shadow-lg bg-gradient-to-r from-sky-500 via-blue-500 to-indigo-600 hover:scale-105 transition-transform duration-300 p-4 text-white">
        <div class="font-bold text-xl">Accessories</div>
        <p class="text-sm mt-1">Bags, belts, hats, jewelry, and more</p>
    </div>
       </a>

</div>


        <section class=" mt-10">      
    <div class="flex w-[90%] m-auto h-auto justify-between">
        <div class=" text-2xl font-bold text-black ">
            <h1>Latest Products</h1>
        </div>
        <div>
            <a href="{{route('products.index')}}" class=" text-black hover:underline">View All</a>
        </div>
    </div>
   <div class="w-[90%] flex flex-wrap gap-6 justify-between m-auto">
    @foreach ($latestProducts as $product)
    <a href="{{route('products.show',[$product->slug])}}" class="w-full sm:w-[48%] md:w-[30%] lg:w-[22%]">
    <div class=" shadow-md hover:shadow-lg transition-shadow duration-300 rounded-lg text-black mt-3 overflow-hidden">
        <div class="bg-gray-500 flex items-center justify-center">
            <img src="{{ $product->image }}" alt="{{$product->name}}" class="h-48 object-cover rounded-t-lg">
        </div>
        <div class="px-4 py-5 text-black">
            <div class="flex flex-col mb-2">
                <span class="text-xl font-bold">{{ $product->name }}</span>
                <span class="text-sm text-gray-500">{{ $product->category->name}}</span>
            </div>
            <div class="flex justify-between items-center">
                <p class="text-lg font-semibold text-green-500">${{$product->price}}</p>
                <div class="flex items-center space-x-1 text-yellow-300">
                    <p>★★★★★</p>
                    <span class="text-sm text-green-500">({{ rand(100, 1000) }})</span>
                </div>
            </div>
        </div>
    </div>
    </a>
    @endforeach
</div>
    </section>
        <section class=" mt-10">      
    <div class="flex w-[90%] m-auto h-auto justify-between">
        <div class=" text-2xl font-bold text-black ">
            <h1>Best Selling Products</h1>
        </div>
        <div>
            <a href="{{route('products.index')}}" class=" text-black hover:underline">View All</a>
        </div>
    </div>
   <div class="w-[90%] flex flex-wrap gap-6 justify-between m-auto">
    @foreach ($bestSellers as $product)
    <a href="{{route('products.show',[$product->slug])}}" class="w-full sm:w-[48%] md:w-[30%] lg:w-[22%]">
    <div class=" shadow-md hover:shadow-lg transition-shadow duration-300 rounded-lg text-black mt-3 overflow-hidden">
        <div class="bg-gray-500  flex items-center justify-center">
            <img src="{{ $product->image }}" alt="{{$product->name}}" class="h-48 object-cover rounded-t-lg">
        </div>
        <div class="px-4 py-5 text-black">
            <div class="flex flex-col mb-2">
                <span class="text-xl font-bold">{{ $product->name }}</span>
                <span class="text-sm text-gray-500">{{ $product->category->name}}</span>
            </div>
            <div class="flex justify-between items-center">
                <p class="text-lg font-semibold text-green-500">${{$product->price}}</p>
                <div class="flex items-center space-x-1 text-yellow-300">
                    <p>★★★★★</p>
                    <span class="text-sm text-green-500">({{ rand(100, 1000) }})</span>
                </div>
            </div>
        </div>
    </div>
    </a>
    @endforeach
</div>
    </section>
    <section class=" mt-10">      
    <div class="flex w-[90%] m-auto h-auto justify-between">
        <div class=" text-2xl font-bold text-black ">
            <h1>Fatured Products</h1>
        </div>
        <div>
            <a href="{{route('products.index')}}" class=" text-black hover:underline">View All</a>
        </div>
    </div>
   <div class="w-[90%] flex flex-wrap gap-6 justify-between m-auto">
    @foreach ($featuredProducts as $product)
    <a href="{{route('products.show',[$product->slug])}}" class="w-full sm:w-[48%] md:w-[30%] lg:w-[22%]">
    <div class=" shadow-md hover:shadow-lg transition-shadow duration-300 rounded-lg text-black mt-3 overflow-hidden">
        <div class="bg-gray-500 flex items-center justify-center">
            <img src="{{ $product->image }}" alt="{{$product->name}}" class="h-48 object-cover rounded-t-lg">
        </div>
        <div class="px-4 py-5 text-black">
            <div class="flex flex-col mb-2">
                <span class="text-xl font-bold">{{ $product->name }}</span>
                <span class="text-sm text-gray-500">{{ $product->category->name}}</span>
            </div>
            <div class="flex justify-between items-center">
                <p class="text-lg font-semibold text-green-500">${{$product->price}}</p>
                <div class="flex items-center space-x-1 text-yellow-300">
                    <p>★★★★★</p>
                    <span class="text-sm text-green-500">({{ rand(100, 1000) }})</span>
                </div>
            </div>
        </div>
    </div>
    </a>
    @endforeach
</div>
    </section>
    <x-footer>
    </x-footer>
</x-app-layout>
