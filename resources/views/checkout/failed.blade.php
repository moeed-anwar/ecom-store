<x-app-layout>
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6 md:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <div class="bg-white rounded-xl shadow-md p-8 md:p-12">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>

                    <h1 class="text-3xl font-bold text-gray-900 mb-4">Payment Failed</h1>
                    <p class="text-lg text-gray-600 mb-8"></p>

                    <div class="bg-gray-50 rounded-lg p-6 mb-8">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">What Happened?</h2>
                        <p class="text-gray-600">
                            Your payment could not be processed. This could be due to:
                        </p>
                        <ul class="list-disc list-inside text-gray-600 mt-2 space-y-1">
                            <li>Insufficient funds in your account</li>
                            <li>Card details entered incorrectly</li>
                            <li>Your card issuer declined the transaction</li>
                            <li>A technical error occurred during processing</li>
                        </ul>
                    </div>

                    <div class="space-y-4">
                        <a href="{{ url()->previous() }}" class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-3 px-8 rounded-lg transition-colors">
                            Try Again
                        </a>
                        <p class="text-sm text-gray-500">
                            If you continue to experience issues, please contact our support team for assistance.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>