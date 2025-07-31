<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Orders</title>
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
            <a href="{{route('admin.dashboard')}}" class="block text-gray-700 hover:text-emerald-600">Dashboard</a>
            <a href="{{route('admin.categories.index')}}" class="block text-gray-700 hover:text-emerald-600">Categories</a>
            <a href="{{route('admin.products.index')}}" class="block text-gray-700 hover:text-emerald-600">Products</a>
            <a href="{{ route('admin.orders.index') }}"
            class="block {{ request()->routeIs('admin.orders.*') ? 'text-emerald-600 font-semibold' : 'text-gray-700' }} hover:text-emerald-600">
            Orders
            </a> 
            <hr class="my-2">
            <a href="{{route('dashboard')}}" class="block font-semibold text-gray-800">
                <i class="ri-home-4-line mr-1"></i> Back to Site
            </a>
        </nav>
    </div>

    <!-- Main Layout -->
    <div class="flex min-h-screen">
        <!-- Sidebar Desktop -->
        <aside class="hidden md:block w-64 bg-white shadow-md">
            <div class="p-6 text-2xl font-bold text-emerald-600 border-b">Admin Panel</div>
            <nav class="p-4 space-y-3">
                <a href="{{route('admin.dashboard')}}" class="block text-gray-700 hover:text-emerald-600">Dashboard</a>
                <a href="{{route('admin.categories.index')}}" class="block text-gray-700 hover:text-emerald-600">Categories</a>
                <a href="{{route('admin.products.index')}}" class="block text-gray-700 hover:text-emerald-600">Products</a>
                <a href="{{ route('admin.orders.index') }}"
                class="block {{ request()->routeIs('admin.orders.*') ? 'text-emerald-600 font-semibold' : 'text-gray-700' }} hover:text-emerald-600">
                Orders
                </a>    
                <hr class="my-2">
                <a href="{{route('dashboard')}}" class="block font-semibold text-gray-800">
                    <i class="ri-home-4-line mr-1"></i> Back to Site
                </a>
            </nav>
        </aside>

        <!-- Content -->
            <main class="w-full md:flex-1 p-4 sm:p-6 md:p-8">
            <div class="w-full flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                <h1 class="text-3xl font-semibold text-gray-800">Orders</h1>
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

            <!-- Orders Card -->
            <div class="bg-white rounded-2xl shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="sm:text-2xl sm:font-bold text-gray-800">Manage Orders</h1>
                   
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-max table-auto">
                        <thead>
                            <tr class="bg-emerald-50 text-emerald-700 text-left">
                                <th class="px-4 py-3 text-sm font-semibold">Order Number</th>
                                <th class="px-4 py-3 text-sm font-semibold">Customer Name</th>
                                <th class="px-4 py-3 text-sm font-semibold">Email</th>
                                <th class="px-4 py-3 text-sm font-semibold">Phone Number</th>
                                <th class="px-4 py-3 text-sm font-semibold">Notes</th>
                                <th class="px-4 py-3 text-sm font-semibold">Amount</th>
                                <th class="px-4 py-3 text-sm font-semibold">Payment Status</th>
                                <th class="px-4 py-3 text-sm font-semibold">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-sm divide-y divide-gray-100">
                            @forelse ($orders as $order)
                                <tr>
                                    <td class="px-4 py-2">{{ $order->order_number }}</td>
                                    <td class="px-4 py-2">{{ $order->first_name }} {{$order->last_name}}</td>
                                    <td class="px-4 py-2">{{ $order->email }}</td>
                                    <td class="px-4 py-2">{{ $order->phone }}</td>
                                    <td class="px-4 py-2">{{ $order->notes ? $order->notes : 'Not Provided' }}</td>
                                    <td class="px-4 py-2">{{ $order->amount }}</td>
                                    <td class="px-4 py-2">{{ $order->payment_status }}</td>
                                    <td class="px-4 py-2 text-xl text-red-600">
                                        <form action="{{ route('admin.orders.destroy', $order) }}" method="POST">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')">
                                                <i class="ri-delete-bin-5-line"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-gray-500">No Orders found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $orders->links() }}
                </div>
            </div>
        </main>
    </div>
</body>
</html>
