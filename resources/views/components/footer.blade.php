<footer class="bg-gray-900 text-white py-12 mt-16">
    <div class="container mx-auto px-6 md:px-12 grid grid-cols-1 md:grid-cols-4 gap-8">
        
        <!-- Logo + Description -->
        <div>
            <h2 class="text-2xl font-bold mb-4 text-emerald-400">Clothes</h2>
            <p class="text-gray-400 mb-4">Discover trendy and timeless clothing for every occasion. Your wardrobe starts here.</p>
            <p class="text-gray-400 font-semibold mb-2">Pay with:</p>
            {{-- <div class="flex space-x-3">
                <img src="{{ asset('assets/visa.png') }}" class="h-6" alt="Visa">
                <img src="{{ asset('assets/payments/mastercard.png') }}" class="h-6" alt="MasterCard">
                <img src="{{ asset('assets/payments/paypal.png') }}" class="h-6" alt="PayPal">
                <img src="{{ asset('assets/payments/applepay.png') }}" class="h-6" alt="Apple Pay">
            </div> --}}
            <div class="flex space-x-3">
    <!-- Visa -->
    <svg class="h-6 w-auto text-gray-500" viewBox="0 0 100 32" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
        <path d="M43.6 9.7l-5.4 12.6h-3.6l-2.3-10.2c-.1-.5-.2-.7-.4-.9-.4-.2-1.3-.5-2.3-.5h-5.4l-.1.5c1.8.4 3.9 1.1 5.2 2l4.2 9.1h-3.7l-5.4-12.6h5.8c1.3 0 2.4.1 3.3.4 1.1.3 2.1 1.1 2.5 2.1l2.5 10.1h2.8l5.3-12.5h2.9zm10.1 12.6h-3.1l-1.9-12.6h3.1l1.9 12.6zm6.5-6.3c0 1.7.1 3.1 2.1 3.1.5 0 1-.1 1.4-.2l.4 2.4c-.7.3-1.6.4-2.5.4-2.8 0-4.4-1.9-4.4-4.8 0-2.6 1.4-5.3 4.6-5.3 3.2 0 4.1 2.6 3.7 5.6h-5.3zm1.8-2.1c-.5 0-1.3.3-1.3 1.3v.1h2.4c0-.7-.1-1.4-1.1-1.4z"/>
    </svg>

    <!-- MasterCard -->
    <svg class="h-6 w-auto text-red-500" viewBox="0 0 48 32" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
        <circle cx="19" cy="16" r="10" fill="#EB001B"/>
        <circle cx="29" cy="16" r="10" fill="#F79E1B"/>
        <path fill="#FF5F00" d="M24 6a10 10 0 0 0 0 20 10 10 0 0 0 0-20z"/>
    </svg>

    <!-- PayPal -->
    <svg class="h-6 w-auto text-blue-600" viewBox="0 0 48 32" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
        <path d="M18.8 6.3h8.7c4.7 0 8 1.6 7.4 6.4-.4 3.4-2.8 5.3-6.1 5.5h-.7c-.2 0-.3.2-.4.3l-.9 5.7c0 .1-.1.2-.3.2h-3.7c-.2 0-.3-.2-.2-.4l.9-5.4c.1-.4.3-.5.7-.6h1.1c2.1 0 4.4-1.6 4.8-4 .4-2.5-1.1-3.7-3.6-3.7h-5.3c-.2 0-.3.1-.4.3l-2.5 15.7c0 .1-.1.2-.2.2h-3.6c-.2 0-.3-.2-.2-.4l3.3-20.2c.1-.2.2-.3.4-.3z"/>
    </svg>

    <!-- Apple Pay -->
    <svg class="h-6 w-auto text-gray-800" viewBox="0 0 48 32" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
        <path d="M32.3 17.2c0-3.2 2.6-4.7 2.7-4.7-1.5-2.1-3.8-2.4-4.6-2.4-2-0.2-3.9 1.2-4.9 1.2-1 0-2.5-1.2-4.1-1.1-2.1 0-4 1.2-5.1 3.2-2.2 3.7-.6 9.3 1.6 12.4 1.1 1.5 2.4 3.2 4.1 3.1 1.6-.1 2.2-1 4.1-1 1.9 0 2.5 1 4.2 1 1.7 0 2.9-1.5 4-3 1.3-2 1.8-3.9 1.8-4-.1 0-3.4-1.3-3.5-5.7zm-3.2-10.8c0-1.6 1.3-3.7 3-3.7.2 0 .4 0 .6.1-1.2 2-3 3.4-3.6 3.6z"/>
    </svg>
</div>

        </div>

        <!-- Help -->
        <div>
            <h3 class="font-semibold text-lg mb-4">Help</h3>
            <ul class="space-y-2 text-gray-400">
                <li><a href="#" class="hover:text-white">Customer Service</a></li>
                <li><a href="#" class="hover:text-white">Shipping Info</a></li>
                <li><a href="#" class="hover:text-white">Return Policy</a></li>
                <li><a href="#" class="hover:text-white">Track Order</a></li>
            </ul>
        </div>

        <!-- Company -->
        <div>
            <h3 class="font-semibold text-lg mb-4">Company</h3>
            <ul class="space-y-2 text-gray-400">
                <li><a href="{{route('about-us')}}" class="hover:text-white">About Us</a></li>
                <li><a href="#" class="hover:text-white">Careers</a></li>
                <li><a href="#" class="hover:text-white">Affiliates</a></li>
                <li><a href="#" class="hover:text-white">Blog</a></li>
            </ul>
        </div>

        <!-- Legal + Social -->
        <div>
            <h3 class="font-semibold text-lg mb-4">Legal</h3>
            <ul class="space-y-2 text-gray-400">
                <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
                <li><a href="#" class="hover:text-white">Terms of Service</a></li>
                <li><a href="#" class="hover:text-white">Sitemap</a></li>
            </ul>
            <div class="flex mt-6 space-x-4">
    <!-- X (formerly Twitter) -->
    <a href="#" class="text-gray-400 hover:text-black" aria-label="X">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M20.76 3H3.24C2.01 3 1 4 1 5.24v13.52C1 20 2 21 3.24 21h17.52C22 21 23 20 23 18.76V5.24C23 4 22 3 20.76 3zM17.7 17h-2.01l-2.95-3.88L9.9 17H7.89l3.86-4.88L7.89 7h2.03l2.78 3.61L15.59 7h2l-3.73 4.67L17.7 17z"/>
        </svg>
    </a>

    <!-- Instagram -->
    <a href="#" class="text-gray-400 hover:text-pink-600" aria-label="Instagram">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
            <path d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2zm0 1.5A4.25 4.25 0 003.5 7.75v8.5A4.25 4.25 0 007.75 20.5h8.5A4.25 4.25 0 0020.5 16.25v-8.5A4.25 4.25 0 0016.25 3.5h-8.5zM12 7a5 5 0 110 10 5 5 0 010-10zm0 1.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7zm5.25-.75a.75.75 0 110 1.5.75.75 0 010-1.5z"/>
        </svg>
    </a>

    <!-- Facebook -->
    <a href="#" class="text-gray-400 hover:text-blue-600" aria-label="Facebook">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
            <path d="M22 12a10 10 0 10-11.6 9.87v-7h-2v-2.87h2V9.41c0-2 1.2-3.13 3-3.13.87 0 1.8.15 1.8.15v2h-1.02c-1 0-1.31.62-1.31 1.25v1.5h2.23L15.5 14.9h-2v7A10 10 0 0022 12z"/>
        </svg>
    </a>

    <!-- TikTok -->
    <a href="#" class="text-gray-400 hover:text-black" aria-label="TikTok">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M16.5 3a5.5 5.5 0 01-4.7-2.5V12a3.5 3.5 0 11-3.5-3.5 3.48 3.48 0 011.5.36V6.5a7 7 0 106.7 7V7.29a8.2 8.2 0 004 1.21V5.73A5.57 5.57 0 0116.5 3z"/>
        </svg>
    </a>
</div>

        </div>
    </div>

    <div class="mt-10 border-t border-gray-700 pt-6 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} Style Hub. All rights reserved.
    </div>
    
</footer>
