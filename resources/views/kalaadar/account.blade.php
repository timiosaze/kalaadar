<x-guest-layout>
    <div class="w-full h-full flex items-start justify-center px-4 sm:px-0">
        <div class="p-6 w-full sm:max-w-md h-screen mt-16 bg-white ">
            <div>
                <div class="flex items-center gap-8 mb-6">
                    <img class="w-16 h-16 rounded-full" src="{{asset('test.jpeg')}}" alt="logo">
                    <button type="button" class="text-blue-600 font-semibold bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rounded-md text-sm px-5 py-1 mb-2 shadow-md dark:bg-gray-800 dark:text-blue-600 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Upload</button>
                    <button type="button" class="text-red-600 font-semibold bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rounded-md text-sm px-5 py-1 mb-2 shadow-md dark:bg-gray-800 dark:text-red-600 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Remove</button>
                </div>
                <form>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Full name</label>
                        <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Adegbulugbe Fadejimi" required="">
                    </div> 
                    <div class="mb-6">
                        <label for="appointment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Country</label>
                        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Nigeria</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div> 
                    <div class="mb-6">
                        <label for="appointment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Timezone</label>
                        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>West Africa Time</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Bio</label>
                        <textarea id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write a short intro about you"></textarea>
                    </div> 
                    <div class="float-right">
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5  mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save Changes</button>
                    </div>
                    <div class="clear-right"></div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>