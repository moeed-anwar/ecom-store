<x-app-layout>

    <!-- Hero Section (Gradient) -->
    <section class="py-20 bg-gradient-to-r from-green-400 via-emerald-500 to-teal-500 text-white">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-5xl font-bold mb-4">About Us</h1>
            <p class="text-xl max-w-3xl mx-auto opacity-90">
                Fashion-forward, timeless styles — we bring you premium clothing to elevate your everyday look.
            </p>
        </div>
    </section>

    <!-- Our Mission (White) -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6 max-w-5xl text-center text-gray-800">
            <h2 class="text-3xl font-semibold mb-4">Our Mission</h2>
            <p class="text-gray-600 text-lg leading-relaxed">
                Our mission is to redefine your wardrobe with stylish, affordable, and high-quality clothing.
                We believe fashion should be accessible to everyone — blending comfort, confidence, and class in every piece we create.
            </p>
        </div>
    </section>

    <!-- Why Choose Us (Gradient) -->
    <section class="py-20  text-black">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-10 text-center">
                <div class="bg-white/10 shadow-lg p-8 rounded-xl">
                    <div class="text-4xl mb-4">👕</div>
                    <h3 class="text-xl font-bold mb-2">Premium Quality</h3>
                    <p class="text-black/80">Crafted from the finest materials for durability and everyday comfort.</p>
                </div>
                <div class="bg-white/10 shadow-lg p-8 rounded-xl">
                    <div class="text-4xl mb-4">🛒</div>
                    <h3 class="text-xl font-bold mb-2">Trendy Collections</h3>
                    <p class="text-black/80">Stay ahead of the curve with our seasonally refreshed styles for men, women, and kids.</p>
                </div>
                <div class="bg-white/10 shadow-lg p-8 rounded-xl">
                    <div class="text-4xl mb-4">🚚</div>
                    <h3 class="text-xl font-bold mb-2">Fast Shipping</h3>
                    <p class="text-black/80">Reliable and quick delivery to ensure you receive your favorites in no time.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Meet Our Team (White) -->
    <section class="py-20 bg-gradient-to-r from-green-400 via-emerald-500 to-teal-500">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-semibold text-gray-800 mb-10">Meet Our Team</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10">
                @foreach(range(1, 4) as $i)
                    <div class="bg-gray-50 shadow-md rounded-lg p-6">
                        <div class="w-24 h-24 mx-auto rounded-full bg-gray-300 mb-4"></div>
                        <h3 class="text-lg font-bold text-gray-800">Team Member {{ $i }}</h3>
                        <p class="text-sm text-gray-600">Fashion Specialist</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Call to Action (Gradient) -->
    <section class="py-16 text-black/80 text-center">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-4">Ready to refresh your wardrobe?</h2>
            <p class="text-lg mb-6">Discover our latest arrivals and best-selling outfits.</p>
            <a href="{{ route('categories.index') }}" class="inline-block bg-white/80 text-black-600 bg-gradient-to-r from-green-400 via-emerald-500 to-teal-500 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                Shop Now
            </a>
        </div>
    </section>

</x-app-layout>
