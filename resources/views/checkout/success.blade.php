<x-app-layout>
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6 md:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <div class="bg-white rounded-xl shadow-md p-8 md:p-12">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>

                    <h1 class="text-3xl font-bold text-gray-900 mb-4">Payment Successful!</h1>
                    <p class="text-lg text-gray-600 mb-8">Thank you {{$order->first_name}} for your purchase We've sent the download link to {{$order->email}}.</p>

                    <div class="bg-gray-50 rounded-lg p-6 mb-8">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Order Details</h2>
                        <div class="space-y-3 text-left">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Order ID</span>
                                <span class="font-medium">{{$order->order_number}}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Product</span>
                                <span class="font-medium">{{$product->name}}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Amount Paid</span>
                                <span class="font-medium">{{$order->amount}}</span>
                            </div>
                            
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status</span>
                                <span class="font-medium capitalize">{{$order->payment_status}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <a href="{{ route('products.show', $product->slug) }}" class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-3 px-8 rounded-lg transition-colors">
                            Continue Shopping
                        </a>
                        <p class="text-sm text-gray-500">
                            If you have any questions about your order, please contact our support team.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
