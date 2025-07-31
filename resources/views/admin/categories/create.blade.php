<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Create Category</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100" x-data="{ sidebarOpen: false }">

    <!-- Mobile Hamburger -->
    <div class="md:hidden flex items-center justify-between p-4 bg-white shadow">
        <button @click="sidebarOpen = true" class="text-2xl text-emerald-600">
            <i class="ri-menu-line"></i>
        </button>
        <h1 class="text-lg font-semibold text-gray-800">Admin Panel</h1>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div 
        class="fixed inset-0 bg-black bg-opacity-50 z-40 transition-opacity md:hidden"
        x-show="sidebarOpen"
        x-transition.opacity
        @click="sidebarOpen = false"
    ></div>

    <!-- Slide-in Sidebar (Mobile) -->
    <div 
        class="fixed top-0 left-0 w-64 bg-white h-full shadow-md z-50 transform transition-transform duration-300 md:hidden"
        x-show="sidebarOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
    >
        <div class="p-6 border-b text-2xl font-bold text-emerald-600">Menu</div>
        <nav class="p-4 space-y-3">
            <a href="{{ route('admin.categories.index') }}" class="block text-gray-700 hover:text-emerald-600">Categories</a>
            <a href="{{ route('admin.products.index') }}" class="block text-gray-700 hover:text-emerald-600">Products</a>
            <a href="#" class="block text-gray-700 hover:text-emerald-600">Orders</a>
            <a href="{{ route('dashboard') }}" class="block text-gray-800 font-semibold pt-4 border-t mt-4">
                <i class="ri-home-4-line mr-1"></i> Back to Site
            </a>
        </nav>
    </div>

    <div class="flex min-h-screen">
        <!-- Sidebar (Desktop) -->
        <aside class="hidden md:block w-64 bg-white shadow-md">
            <div class="p-6 text-2xl font-bold text-emerald-600 border-b">Admin Panel</div>
            <nav class="p-4 space-y-3">
                <a href="{{ route('admin.categories.index') }}" class="block text-gray-700 hover:text-emerald-600">Categories</a>
                <a href="{{ route('admin.products.index') }}" class="block text-gray-700 hover:text-emerald-600">Products</a>
                <a href="#" class="block text-gray-700 hover:text-emerald-600">Orders</a>
                <a href="{{ route('dashboard') }}" class="block text-gray-800 font-semibold pt-4 border-t mt-4">
                    <i class="ri-home-4-line mr-1"></i> Back to Site
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-4 sm:p-6 md:p-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                <h1 class="text-2xl sm:text-3xl font-semibold text-gray-800">Create Category</h1>
            </div>

            <div class="bg-white p-4 sm:p-6 rounded-xl shadow-md w-full max-w-2xl mx-auto">
                <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="block mb-1 font-semibold text-gray-700">Name</label>
                        <input type="text" name="name" id="name" placeholder="Name your category"
                               class="w-full border border-gray-300 p-2 rounded-lg focus:ring focus:border-emerald-500">
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block mb-1 font-semibold text-gray-700">Description</label>
                        <input type="text" name="description" id="description" placeholder="Enter description"
                               class="w-full border border-gray-300 p-2 rounded-lg focus:ring focus:border-emerald-500">
                        @error('description')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="image" class="block mb-1 font-semibold text-gray-700">Image</label>
                        <input type="file" name="image" id="image"
                               class="w-full border border-gray-300 p-2 rounded-lg focus:ring focus:border-emerald-500">
                        @error('image')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center pt-4 gap-4">
                        <a href="{{ route('admin.categories.index') }}" class="text-emerald-600 font-semibold hover:underline">
                            ← Back to Categories
                        </a>
                        <button type="submit" class="bg-emerald-600 text-white px-5 py-2 rounded-lg hover:bg-emerald-700 transition">
                            Create Category
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
