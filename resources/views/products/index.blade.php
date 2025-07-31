<x-app-layout>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-green-400 via-emerald-500 to-teal-500 py-20 md:py-24 overflow-hidden">
        <div class="container mx-auto px-6 md:px-8 text-center text-black">
            <h1 class="text-4xl md:text-5xl font-bold mb-8 leading-tight">Our Products</h1>
            <p class="text-lg md:text-xl mb-12 opacity-90 max-w-3xl mx-auto">Explore our full range of clothing and fashion-focused design assets.</p>

            <div class="inline-flex items-center bg-black/10 px-6 py-3 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                <span class="font-medium">{{ $products->total() }} items</span>
            </div>
        </div>
    </section>

    @if($products->count() > 0)
        <!-- All Products Title -->
        <div class="w-[90%] mx-auto mt-12 mb-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">All Products</h2>
            <p class="text-sm text-gray-500 mt-2">Explore our full range of clothing and fashion-focused design assets.</p>
        </div>

        <!-- Products Grid -->
        <section class="w-[90%] mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <a href="{{ route('products.show', [$product->slug]) }}" class="transition-transform transform hover:scale-105 duration-300">
                    <div class="bg-white shadow-md hover:shadow-lg rounded-xl overflow-hidden h-full flex flex-col">
                        <!-- Image Section -->
                        <div class="flex items-center justify-center bg-gray-50 py-6">
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-24 h-24 object-contain" />
                        </div>

                        <!-- Product Info -->
                        <div class="px-4 py-5 text-black flex-grow flex flex-col justify-between">
                            <div class="mb-3">
                                <h3 class="text-lg font-bold truncate">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $product->category->name }}</p>
                            </div>

                            <div class="flex justify-between items-center mt-auto">
                                <p class="text-green-600 text-lg font-semibold">${{ $product->price }}</p>
                                <div class="flex items-center text-yellow-400 text-sm">
                                    ★★★★★
                                    <span class="ml-1 text-green-500">({{ rand(100, 1000) }})</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </section>

        <!-- Pagination -->
        <div class="w-[90%] mx-auto mt-10">
            {{ $products->links() }}
        </div>
    @else
        <!-- No Products Message -->
        <div class="w-full text-center py-20">
            <img src="{{ asset('assets/hanger.png') }}" alt="No products" class="mx-auto w-40 h-40 mb-6" />
            <h2 class="text-2xl font-semibold text-gray-700">No products found</h2>
            <p class="text-gray-500 mt-2">There are currently no products available. Please check back later.</p>
        </div>
    @endif

    <x-footer />
</x-app-layout>
