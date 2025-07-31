<x-app-layout>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-green-400 via-emerald-500 to-teal-500 py-16 md:py-24 text-black">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">Browse All Categories</h1>
            <p class="text-xl opacity-90 mb-8">Find the perfect theme or template for your next project</p>

            <div class="inline-flex items-center bg-black/10 px-6 py-3 rounded-full mx-auto text-black">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                <span class="font-medium">{{ $categories->count() }} items</span>
            </div>
        </div>
    </section>

    @if($categories->count() > 0)
        <!-- All Categories Header -->
        <div class="w-[90%] mx-auto mt-12 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">All Categories</h2>
            <p class="text-sm text-gray-500 mt-2">Explore our full range of clothing and fashion-focused design assets.</p>
        </div>
    @endif

    <!-- Category Cards -->
    <div class="flex flex-wrap gap-6 mt-8 justify-center w-[90%] mx-auto">
        @php
            $gradients = [
                'from-blue-500 to-indigo-600',
                'from-emerald-500 to-teal-600',
                'from-purple-500 to-indigo-600',
                'from-rose-500 to-pink-600',
                'from-amber-500 to-orange-600',
                'from-cyan-500 to-blue-600'
            ];
        @endphp

        @forelse ($categories as $category)
            @php
                $gradient = $gradients[$category->id % count($gradients)];
            @endphp

            <div class="w-full sm:w-[48%] md:w-[30%] lg:w-[22%] bg-white rounded-xl shadow-md overflow-hidden h-[300px] flex flex-col transform transition-transform duration-300 hover:scale-105">
                <!-- Image Section -->
                <div class="flex-grow-[7] flex items-center justify-center bg-gray-50">
                    <img src="{{ $category->image }}" alt="{{ $category->name }} Icon" class="w-24 h-24 object-contain" />
                </div>

                <!-- Text Section -->
                <div class="flex-grow-[3] p-4">
                    <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $category->name }}</h3>
                    <p class="text-sm text-gray-600 mt-1 line-clamp-2">{{ $category->description }}</p>

                    <div class="flex justify-between items-center mt-3 text-sm">
                        <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded-full">
                            {{ $category->products_count }} items
                        </span>
                        <a href="{{ route('categories.show', [$category->slug]) }}" class="text-emerald-600 font-semibold hover:underline flex items-center">
                            Browse All
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <!-- No Categories Found -->
            <div class="w-full text-center py-16">
                <img src="{{ asset('assets/hanger.png') }}" alt="No categories" class="mx-auto w-40 h-40 mb-6" />
                <h2 class="text-2xl font-semibold text-gray-700">No categories found</h2>
                <p class="text-gray-500 mt-2">We couldn’t find any categories. Please check back later.</p>
            </div>
        @endforelse
    </div>

    <x-footer />
</x-app-layout>
