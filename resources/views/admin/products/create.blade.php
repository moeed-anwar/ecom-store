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
        <main class=" flex-1 p-6">
            <div class=" w-full mb-4">
                <h1 class=" text-xl font-bold">Add Product</h1>
            </div>
            <div>
                <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="grid md:grid-cols-2 gap-6">
    <!-- Left Column -->
    <div class="space-y-4">
        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-semibold text-gray-700">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter name"
                class="w-full px-4 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-emerald-400 focus:outline-none bg-white">
            @error('name')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

    <!-- Description -->
<div class="h-[77%] flex flex-col">
    <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
    <textarea name="description" rows="4" placeholder="Enter description"
        class="flex-1 w-full px-4 py-2 border @error('description') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-emerald-400 focus:outline-none bg-white resize-none">{{ old('description') }}</textarea>
    @error('description')
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
    @enderror
</div>

       
    </div>

    <!-- Right Column -->
    <div class="space-y-4">
        <!-- Image -->
         <div>
            <label for="image" class="block text-sm font-semibold text-gray-700">Image</label>
            <input type="file" name="image"
                class="w-full px-4 py-2 border @error('image') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-emerald-400 focus:outline-none bg-white">
            @error('image')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- Category -->
        <div>
            <label for="category_id" class="block text-sm font-semibold text-gray-700">Category</label>
            <select name="category_id"
                class="w-full px-4 py-2 border @error('category_id') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-emerald-400 focus:outline-none bg-white">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? "selected" : "" }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Price -->
        <div>
            <label for="price" class="block text-sm font-semibold text-gray-700">Price</label>
            <input type="number" name="price" value="{{ old('price') }}" placeholder="Enter price"
                class="w-full px-4 py-2 border @error('price') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-emerald-400 focus:outline-none bg-white">
            @error('price')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Stock -->
        <div>
            <label for="stock" class="block text-sm font-semibold text-gray-700">Stock</label>
            <input type="number" name="stock" value="{{ old('stock') }}" placeholder="Enter stock"
                class="w-full px-4 py-2 border @error('stock') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-emerald-400 focus:outline-none bg-white">
            @error('stock')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Is Active -->
        <div class="flex items-center space-x-2 mt-4">
            <input type="checkbox" name="is_active" value="1" id="is_active"
                class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-400"
                {{ old('is_active') ? "checked" : "" }}>
            <label for="is_active" class="text-sm text-gray-700">Available</label>
        </div>
    </div>
</div>

<!-- Action Buttons -->
<div class="mt-8 p-6 rounded-lg flex flex-col sm:flex-row justify-between items-center gap-4">
    <a href="{{ route('admin.products.index') }}"
        class="text-gray-600 hover:text-emerald-600 font-semibold underline">
        ← Back to Products
    </a>
    <button type="submit"
        class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-lg font-semibold shadow transition duration-200">
        Add Product
    </button>
</div>

                </form>
            </div>
        </main>
    </body>
</html>