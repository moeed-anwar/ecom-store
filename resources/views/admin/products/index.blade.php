<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
</head>
<body x-data="{ sidebarOpen: false }" class="bg-gray-100">

    <!-- Mobile Navbar -->
    <div class="w-full md:hidden flex items-center justify-between px-4 py-4 bg-white shadow">
        <button @click="sidebarOpen = true" class="text-2xl text-emerald-600">
            <i class="ri-menu-line"></i>
        </button>
        <h1 class="text-lg font-semibold text-gray-800">Admin Panel</h1>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div 
        x-show="sidebarOpen"
        @click="sidebarOpen = false"
        class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden"
        x-transition.opacity
    ></div>

    <!-- Mobile Slide-in Sidebar -->
    <div 
        x-show="sidebarOpen"
        class="fixed top-0 left-0 w-64 bg-white h-full shadow-md z-50 transform transition-transform duration-300 md:hidden"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
    >
        <div class="p-6 text-2xl font-bold text-emerald-600 border-b">Menu</div>
        <nav class="p-4 space-y-3">
            <a href="{{ route('admin.dashboard') }}" class="block text-gray-700 hover:text-emerald-600">Dashboard</a>
            <a href="{{ route('admin.categories.index') }}" class="block text-gray-700 hover:text-emerald-600">Categories</a>
            <a href="{{ route('admin.products.index') }}"
            class="block {{ request()->routeIs('admin.products.*') ? 'text-emerald-600 font-semibold' : 'text-gray-700' }} hover:text-emerald-600">
            Products
            </a>
            <a href="{{ route('admin.orders.index') }}" class="block text-gray-700 hover:text-emerald-600">Orders</a>
            <hr class="my-2">
            <a href="{{ route('dashboard') }}" class="block font-semibold text-gray-800">
                <i class="ri-home-4-line mr-1"></i> Back to Site
            </a>
        </nav>
    </div>

    <div class="flex min-h-screen">
        <!-- Sidebar Desktop -->
        <aside class="hidden md:block w-64 bg-white shadow-md">
            <div class="p-6 text-2xl font-bold text-emerald-600 border-b">Admin Panel</div>
            <nav class="p-4 space-y-3">
                <a href="{{route('admin.dashboard')}}" class="block text-gray-700 hover:text-emerald-600">Dashboard</a>
                <a href="{{route('admin.categories.index')}}" class="block text-gray-700 hover:text-emerald-600">Categories</a>
                <a href="{{ route('admin.products.index') }}"
                class="block {{ request()->routeIs('admin.products.*') ? 'text-emerald-600 font-semibold' : 'text-gray-700' }} hover:text-emerald-600">
                Products
                </a>
                <a href="{{ route('admin.orders.index')}}" class="block text-gray-700 hover:text-emerald-600">Orders</a>
                <hr class="my-2">
                <a href="{{route('dashboard')}}" class="block font-semibold text-gray-800">
                    <i class="ri-home-4-line mr-1"></i> Back to Site
                </a>
            </nav>
        </aside>

        <!-- Content -->
            <main class="w-full md:flex-1 p-4 sm:p-6 md:p-8">
            <div class="w-full flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                <h1 class="text-3xl font-semibold text-gray-800">Products</h1>
            </div>

            <!-- Alert Messages -->
            @if (session('success'))
                <div class="mb-4 p-4 rounded-lg bg-emerald-100 text-emerald-800 border border-emerald-300">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <!--Product Card -->
            <div class="bg-white rounded-2xl shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="sm:text-2xl sm:font-bold text-gray-800">Manage Products</h1>
                    <a href="{{ route('admin.products.create') }}" class="text-white font-semibold bg-emerald-600 hover:bg-emerald-700 py-2 px-4 rounded-lg transition duration-200">
                        + Add new Product
                    </a>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-max table-auto">
                        <thead>
                            <tr class="bg-emerald-50 text-emerald-700 text-left">
                                <th class="px-4 py-3 text-sm font-semibold">Id</th>
                                <th class="px-4 py-3 text-sm font-semibold">Name</th>
                                <th class="px-4 py-3 text-sm font-semibold">Slug</th>
                                <th class="px-4 py-3 text-sm font-semibold">Price</th>
                                <th class="px-4 py-3 text-sm font-semibold">Stock</th>
                                <th class="px-4 py-3 text-sm font-semibold">Description</th>
                                <th class="px-4 py-3 text-sm font-semibold">Delete</th>
                                <th class="px-4 py-3 text-sm font-semibold">Edit</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-sm divide-y divide-gray-100">
                            @forelse ($products as $product)
                                <tr>
                                    <td class="px-4 py-2">{{ $product->id }}</td>
                                    <td class="px-4 py-2">{{ $product->name }}</td>
                                    <td class="px-4 py-2">{{ $product->slug }}</td>
                                    <td class="px-4 py-2">{{ $product->price }}</td>
                                    <td class="px-4 py-2">{{ $product->stock }}</td>
                                    <td class="px-4 py-2">{{ $product->description }}</td>
                                    <td class="px-4 py-2 text-xl text-red-600">
                                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')">
                                                <i class="ri-delete-bin-5-line"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-4 py-2 text-xl text-blue-600">
                                        <a href="{{ route('admin.products.edit', $product) }}">
                                            <i class="ri-edit-2-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-gray-500">No Products found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </main>
    </div>
</body>
</html>
