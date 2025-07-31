<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
</head>
<body x-data="{ sidebarOpen: false }" class="bg-gray-100">

    <!-- Mobile Topbar -->
    <div class="w-full lg:hidden flex items-center justify-between px-4 py-4 bg-white shadow-md">
        <button @click="sidebarOpen = true" class="text-2xl text-emerald-600">
            <i class="ri-menu-line"></i>
        </button>
        <h1 class="text-lg font-semibold text-gray-800">Admin Panel</h1>
    </div>

    <!-- Sidebar Overlay -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden"></div>

    <!-- Mobile Sidebar -->
    <aside
        x-show="sidebarOpen"
        class="fixed top-0 left-0 w-64 bg-white h-full shadow-md z-50 transform transition-transform duration-300 lg:hidden"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
    >
        <div class="p-6 text-2xl font-bold text-emerald-600 border-b">Admin Panel</div>
        <nav class="p-4 space-y-3">
            <a href="{{ route('admin.dashboard') }}"
            class="block {{ request()->routeIs('admin.dashboard') ? 'text-emerald-600 font-semibold' : 'text-gray-700' }} hover:text-emerald-600">
            Dashboard
            </a>            <a href="{{ route('admin.categories.index') }}" class="block text-gray-700 hover:text-emerald-600">Categories</a>
            <a href="{{ route('admin.products.index') }}" class="block text-gray-700 hover:text-emerald-600">Products</a>
            <a href="#" class="block text-gray-700 hover:text-emerald-600">Orders</a>
            <hr class="my-2">
            <a href="{{ route('dashboard') }}" class="block font-semibold text-gray-800">
                <i class="ri-home-4-line mr-1"></i> Back to Site
            </a>
        </nav>
    </aside>

    <!-- Main Layout -->
    <div class="flex min-h-screen">
        <!-- Sidebar Desktop -->
        <aside class="hidden lg:block w-64 bg-white shadow-md">
            <div class="p-6 text-2xl font-bold text-emerald-600 border-b">Admin Panel</div>
            <nav class="p-4 space-y-3">
                <a href="{{ route('admin.dashboard') }}"
                class="block {{ request()->routeIs('admin.dashboard') ? 'text-emerald-600 font-semibold' : 'text-gray-700' }} hover:text-emerald-600">
                Dashboard
                </a>
                <a href="{{ route('admin.categories.index') }}" class="block text-gray-700 hover:text-emerald-600">Categories</a>
                <a href="{{ route('admin.products.index') }}" class="block text-gray-700 hover:text-emerald-600">Products</a>
                <a href="{{route('admin.orders.index')}}" class="block text-gray-700 hover:text-emerald-600">Orders</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-4 sm:p-6 lg:p-8">
            <div class=" hidden lg:flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                <h1 class="text-3xl font-semibold text-gray-800">Dashboard</h1>
                <a href="{{ route('dashboard') }}" class="text-md font-semibold bg-white px-4 py-2 rounded shadow flex items-center gap-2">
                    <i class="ri-home-4-line text-xl"></i> Back to Site
                </a>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <p class="text-sm text-gray-500">Total Categories</p>
                    <h2 class="text-3xl font-bold text-emerald-600">{{ $totalCategories }}</h2>
                </div>
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <p class="text-sm text-gray-500">Total Products</p>
                    <h2 class="text-3xl font-bold text-emerald-600">{{ $totalProducts }}</h2>
                </div>
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <p class="text-sm text-gray-500">Total Orders</p>
                    <h2 class="text-3xl font-bold text-emerald-600">{{$totalOrders}}</h2>
                </div>
            </div>

            <!-- Recent Items -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Recent Categories -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-4 text-center text-emerald-600 border-b pb-2">Recent Categories</h3>
                    <ul class="space-y-4">
                        @forelse ($recentCategories as $category)
                            <li>
                                <p class="text-gray-800 font-medium">{{ $category->name }}</p>
                                <p class="text-sm text-gray-500">{{ $category->description }}</p>
                            </li>
                        @empty
                            <li class="text-gray-500">No recent categories.</li>
                        @endforelse
                    </ul>
                </div>

                <!-- Recent Products -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-4 text-center text-emerald-600 border-b pb-2">Recent Products</h3>
                    <ul class="space-y-4">
                        @forelse ($recentProducts as $product)
                            <li>
                                <p class="text-gray-800 font-medium">{{ $product->name }}</p>
                                <p class="text-sm text-gray-500">Price: ${{ number_format($product->price, 2) }}</p>
                            </li>
                        @empty
                            <li class="text-gray-500">No recent products.</li>
                        @endforelse
                    </ul>
                </div>
                
                
            </div>
            {{-- <div class="bg-white p-6 rounded-lg shadow w-full mt-5">
                    <h3 class="text-xl font-bold mb-4 text-center text-emerald-600 border-b pb-2">Recent Orders</h3>
                    <ul class="space-y-4">
                        @forelse ($recentOrders as $order)
                            <li>
                                <p class="text-gray-800 font-medium">{{ $order->order_number }}</p>
                                <p class="text-sm text-gray-500">Price: ${{ number_format($order->amount, 2) }}</p>
                            </li>
                        @empty
                            <li class="text-gray-500">No recent products.</li>
                        @endforelse
                    </ul>
                </div> --}}
                <div class="bg-white p-6 rounded-2xl shadow-lg w-full mx-auto mt-5 max-w-7xl">
    <h3 class="text-2xl font-bold mb-6 text-center text-emerald-600 border-b pb-3">Recent Orders</h3>

    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        @forelse ($recentOrders as $order)
            <li class="border border-gray-200 rounded-lg p-5 bg-gray-50 hover:shadow-md transition-shadow duration-200">
                <div class="flex flex-col sm:flex-row justify-between sm:items-center mb-2">
                    <p class="text-lg font-semibold text-gray-800">Order #{{ $order->order_number }}</p>
                </div>

                <div class="grid grid-cols-1 gap-3 text-sm text-gray-700">
                    <div>
                        <p><span class="font-medium">Customer:</span> {{ $order->first_name }} {{ $order->last_name }}</p>
                        <p><span class="font-medium">Email:</span> {{ $order->email }}</p>
                        <p><span class="font-medium">Phone:</span> {{ $order->phone }}</p>
                        @if (!empty($order->notes))
                            <p><span class="font-medium">Notes:</span> {{ $order->notes }}</p>
                        @endif
                        <p class="mt-2 font-medium">Price: 
                            <span class="bg-emerald-100 text-emerald-700 text-sm px-3 py-1 rounded-full">
                                ${{ number_format($order->amount, 2) }}
                            </span>
                        </p>
                    </div>
                </div>
            </li>
        @empty
            <li class="text-center text-gray-400 text-sm col-span-full">No recent orders found.</li>
        @endforelse
    </ul>
</div>


        </main>
    </div>
</body>
</html>
