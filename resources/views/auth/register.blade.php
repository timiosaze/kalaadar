<x-guest-layout>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-20 lg:py-16 lg:grid-cols-12">
            <div class="w-full p-6 mx-auto bg-white rounded-lg shadow dark:bg-gray-800 sm:max-w-xl lg:col-span-6 sm:p-8">
                <a href="#" class="inline-flex items-center mb-4 text-xl font-semibold text-gray-900 dark:text-white">
                    <img class="w-8 h-8 mr-2" src="{{asset('images/kalaadar-logo.png')}}" alt="logo">
                    Kalaadar  
                </a>
                <h1 class="mb-2 text-2xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                    Create your Account
                </h1>
                <p class="text-sm font-light text-gray-800 dark:text-gray-300">
                    Let your people reach out to you <strong>efficiently</strong> 
                </p>
                <form class="mt-4 space-y-6 sm:mt-6"  method="POST" action="{{ route('register') }}" x-data="countries">
                    @csrf
                    <div class="grid gap-6 sm:grid-cols-2">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                            <x-jet-input id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>
                        <div>
                            <label for="full-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Email</label>
                            <x-jet-input id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="email" name="email" :value="old('email')" required />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <x-jet-input id="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  type="password" name="password" required autocomplete="new-password" />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                            <x-jet-input id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>
                        <div>
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Country</label>
                            <select id="countries" name="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">Choose a country</option>
                                <template x-for="country in data">
                                    <option :value="country['name']" x-text="country['name']"></option>
                                </template>
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-full h-0.5 bg-gray-200 dark:bg-gray-700"></div>
                        <div class="px-5 text-center text-gray-500 dark:text-gray-400">or</div>
                        <div class="w-full h-0.5 bg-gray-200 dark:bg-gray-700"></div>
                    </div>
                    <div class="space-y-3">
                        <a href="#" class="w-full inline-flex items-center justify-center py-2.5 px-5 mr-2 mb-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-md border border-gray-200 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            <svg class="w-5 h-5 mr-2" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_13183_10121)"><path d="M20.3081 10.2303C20.3081 9.55056 20.253 8.86711 20.1354 8.19836H10.7031V12.0492H16.1046C15.8804 13.2911 15.1602 14.3898 14.1057 15.0879V17.5866H17.3282C19.2205 15.8449 20.3081 13.2728 20.3081 10.2303Z" fill="#3F83F8"/><path d="M10.7019 20.0006C13.3989 20.0006 15.6734 19.1151 17.3306 17.5865L14.1081 15.0879C13.2115 15.6979 12.0541 16.0433 10.7056 16.0433C8.09669 16.0433 5.88468 14.2832 5.091 11.9169H1.76562V14.4927C3.46322 17.8695 6.92087 20.0006 10.7019 20.0006V20.0006Z" fill="#34A853"/><path d="M5.08857 11.9169C4.66969 10.6749 4.66969 9.33008 5.08857 8.08811V5.51233H1.76688C0.348541 8.33798 0.348541 11.667 1.76688 14.4927L5.08857 11.9169V11.9169Z" fill="#FBBC04"/><path d="M10.7019 3.95805C12.1276 3.936 13.5055 4.47247 14.538 5.45722L17.393 2.60218C15.5852 0.904587 13.1858 -0.0287217 10.7019 0.000673888C6.92087 0.000673888 3.46322 2.13185 1.76562 5.51234L5.08732 8.08813C5.87733 5.71811 8.09302 3.95805 10.7019 3.95805V3.95805Z" fill="#EA4335"/></g><defs><clipPath id="clip0_13183_10121"><rect width="20" height="20" fill="white" transform="translate(0.5)"/></clipPath></defs>
                            </svg>                            
                            Sign up with Google
                        </a>
                        <button type="submit" class="w-full inline-flex items-center justify-center py-2.5 px-5 mr-2 text-sm text-white font-semibold focus:outline-none bg-primary-600 rounded-md border border-gray-200 hover:bg-primary-800 hover:text-white focus:z-10 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-700 dark:bg-primary-600 dark:text-white dark:border-primary-600 dark:hover:text-white dark:hover:bg-primary-800">
                            Create an account
                        </button>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="w-full text-primary-700 hover:underline font-bold text-sm px-5 py-1 mt-0 text-center ">Already have an account?</a>
                    </div>
                </form>
            </div>
            <div class="mr-auto place-self-center lg:col-span-6">
                <img class="hidden mx-auto lg:flex" src="{{asset('images/register-kalaadar.png')}}" alt="illustration">
            </div>             
        </div>
      </section>
</x-guest-layout>