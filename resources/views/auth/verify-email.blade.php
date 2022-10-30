<x-guest-layout>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="w-full h-screen flex items-center justify-center px-4 sm:px-0">
            <div class="p-6 sm: max-w-md bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <a href="#" class="flex items-center justify-center mb-4 text-xl font-semibold text-gray-900 dark:text-white">
                    <img class="w-8 h-8 mr-2" src="{{asset('images/kalaadar-logo.png')}}" alt="logo">
                    Kalaadar    
                </a>
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white text-center">Verify your account</h5>
                </a>
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <p class="mb-6 font-normal text-center text-sm text-gray-500 dark:text-gray-400">We sent an email to you. Click on the link in that email to verify your email address. Don’t see any email? Check your spam folder.</p>
                    <p class="mb-3 font-normal  gap-4 text-sm text-center text-gray-500 dark:text-gray-400">Still can’t find the email, 
                        <div class="flex items-center justify-center">
                            <x-jet-button type="submit">
                                {{ __('Resend Verification Email') }}
                            </x-jet-button>
                        </div>
                    </p>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>