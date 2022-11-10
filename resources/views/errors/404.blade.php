<x-guest-layout>
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-sm text-center">
            <img class="mx-auto mb-4" src="{{asset('images/404.svg')}}" alt="404 Not Found">
            <h1 class="mb-4 text-2xl font-extrabold text-gray-600 dark:text-primary-500">404 Not Found</h1>
            <p class="mb-10 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Whoops! That page doesn’t exist.</p>
            <a href="{{ route('login') }}" class="inline-flex text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900 my-4">Go to Login page</a>
        </div>   
    </div>
</section>
</x-guest-layout>