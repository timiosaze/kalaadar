<x-guest-layout>
    <div class="flex relative" x-data="{open: false}">
        <aside class="w-64 h-full absolute hidden sm:relative sm:block" id="aside"  aria-label="Sidebar">
            <div class="overflow-y-auto py-4 px-3 h-screen bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center pl-2 mb-5">
                    <img src="{{asset('images/kalaadar-logo.png')}}" class="mr-3 h-6 sm:h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Kalaadar</span>
                    <button class="ml-auto hover:text-blue-600" id="close-aside">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                    </button>
                </div>
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                            <span class="ml-3">Overview</span>
                        </a>
                    </li>
                    <li>
                        <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages">
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">Pages</span>
                            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <ul id="dropdown-pages" class="hidden py-2 space-y-2">
                            <li>
                                <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Settings</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Kanban</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Calendar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">Sales</span>
                            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <ul id="dropdown-sales" class="hidden py-2 space-y-2">
                                <li>
                                    <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Products</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Billing</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Invoice</a>
                                </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Messages</span>
                            <span class="inline-flex justify-center items-center w-5 h-5 text-xs font-semibold text-primary-800 bg-primary-100 rounded-full dark:bg-primary-200 dark:text-primary-800">
                                6   
                            </span>
                        </a>
                    </li>
                    <li>
                        <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-authentication" data-collapse-toggle="dropdown-authentication">
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">Authentication</span>
                            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <ul id="dropdown-authentication" class="hidden py-2 space-y-2">
                                <li>
                                    <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Sign In</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Sign Up</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Forgot Password</a>
                                </li>
                        </ul>
                    </li>
                </ul>
                <ul class="pt-5 my-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
                    <li>
                        <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                            <span class="ml-3">Docs</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>
                            <span class="ml-3">Components</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-3">Help</span>
                        </a>
                    </li>
                </ul>
                <div id="alert-update" class="p-4 mb-3 rounded-lg bg-primary-50 dark:bg-primary-900" role="alert">
                    <div class="flex justify-between items-center mb-3">
                        <span class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">Beta</span>
                        <button type="button" class="inline-flex p-1 w-6 h-6 rounded-lg text-primary-700 bg-primary-50 focus:ring-2 focus:ring-primary-400 hover:bg-primary-100 dark:bg-primary-900 dark:text-primary-300 dark:hover:bg-primary-800 dark:hover:text-primary-200" data-dismiss-target="#alert-update" aria-label="Close">
                            <span class="sr-only">Dismiss</span>
                            <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <div class="mb-3 text-sm font-light text-primary-700 dark:text-primary-300">
                        Preview the new Flowbite v2.0! You can turn the new features off for a limited time in your settings page.
                    </div>
                    <a href="#" class="text-sm font-medium underline text-primary-700 dark:text-primary-300 hover:no-underline">
                        Turn new features off
                    </a>
                </div>
            </div>
        </aside>
        <div class="flex flex-col grow flex-1">
            <div class="flex items-center border-b border-gray-200 px-4 py-3">
                
                <h1 class="ml-3 font-semibold">Appointments</h1>

                <img class="p-1 ml-auto w-10 h-10 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" src="{{asset('test.jpeg')}}" alt="Bordered avatar">
                <p class="ml-3 text-sm font-bold hidden sm:block">Segun Arinze</p>
                <button class="rounded-full ml-3 hover:bg-primary-300 p-1.5 transition duration-300 linear" id="bars-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="w-full h-full flex items-start justify-center px-4 sm:px-0">
                <div class="p-6 w-full sm:max-w-md h-screen mt-16 bg-white ">
                    <div>
                        <span class="float-right mb-1">25%</span>
                        <div class="clear-right"></div>
                        <div class="mb-4 w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: 25%"></div>
                        </div>
                        <h2 class="mb-4 text-2xl font-medium">When can people book this appointment</h2>

                        <form>
                            <div class="mb-6">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Timezone</label>
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
                                </div>
                                <div id="dropdown" class="mt-2 z-10 w-full h-36 overflow-y-auto bg-white rounded-lg divide-y divide-gray-100 shadow dark:bg-gray-700">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                      <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                      </li>
                                      <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                      </li>
                                      <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                      </li>
                                      <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                                      </li>
                                      <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                      </li>
                                      <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                      </li>
                                      <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                      </li>
                                      <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                                      </li>
                                    </ul>
                                </div>
                            </div> 
                            <div class="mb-6">
                                <label for="appointment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Duration</label>
                                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected value="">15 min</option>
                                    <option value="US">30 min</option>
                                    <option value="CA">45 min</option>
                                    <option value="FR">60 min</option>
                                    <option value="DE">Set custom time</option>
                                </select>
                                <div class="flex flex-row gap-6 mt-6">
                                    <div class="flex-1">
                                        <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                                    </div>
                                    <div class="flex-1">
                                        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected value="">Minutes</option>
                                            <option value="US">Hours</option>
                                        </select>
                                    </div>
                                </div>
                            </div> 
                            <div class="mb-6">
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select available days</label>
                                <ul class="grid gap-6 w-full md:grid-cols-5">
                                    <li>
                                        <input type="checkbox" id="sun" value="" class="hidden peer" required="">
                                        <label for="sun" class="inline-flex justify-between items-center p-2 w-full text-gray-500 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-blue-300 peer-checked:text-blue-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                                            <div class="block">
                                                <p>Sun</p>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="mon" value="" class="hidden peer">
                                        <label for="mon" class="inline-flex justify-between items-center p-2 w-full text-gray-500 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-blue-300 peer-checked:text-blue-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <p>Mon</p>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="tue" value="" class="hidden peer">
                                        <label for="tue" class="inline-flex justify-between items-center p-2  w-full text-gray-500 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-blue-300 peer-checked:text-blue-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <p>Tue</p>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="wed" value="" class="hidden peer" required="">
                                        <label for="wed" class="inline-flex justify-between items-center p-2 w-full text-gray-500 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-blue-300 peer-checked:text-blue-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                                            <div class="block">
                                                <p>Wed</p>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="thur" value="" class="hidden peer">
                                        <label for="thur" class="inline-flex justify-between items-center p-2 w-full text-gray-500 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-blue-300 peer-checked:text-blue-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <p>Thur</p>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="fri" value="" class="hidden peer">
                                        <label for="fri" class="inline-flex justify-between items-center p-2  w-full text-gray-500 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-blue-300 peer-checked:text-blue-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <p>Fri</p>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="sat" value="" class="hidden peer">
                                        <label for="sat" class="inline-flex justify-between items-center p-2  w-full text-gray-500 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-blue-300 peer-checked:text-blue-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <p>Sat</p>
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="mb-6">
                                <label for="appointment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Select available hours</label>
                                <div class="flex items-center mb-4">
                                    <h2 class="sm:text-sm text-xs font-medium text-gray-900 dark:text-gray-300 ">Select</h2>
                                    <span class="sm:ml-auto ml-2  sm:text-sm text-xs font-medium text-gray-400 dark:text-gray-300">Inactive</span>
                                    <label for="small-toggle" class="ml-2 inline-flex relative items-center cursor-pointer">
                                        <input type="checkbox" value="" id="small-toggle" class="sr-only peer">
                                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    </label>
                                    <select id="countries" class="bg-gray-50 border sm:ml-auto ml-2 border-gray-300 text-gray-900 text-xs sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-16 sm:w-20 p-1 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Start</option>
                                        <option value="US">00:00</option>
                                        <option value="CA">00:15</option>
                                        <option value="FR">00:30</option>
                                        <option value="DE">00:45</option>
                                        <option value="FR">01:00</option>
                                        <option value="DE">01:15</option>
                                    </select>
                                    <hr class="sm:mx-2 mx-0 w-4 h-1 bg-gray-400 rounded border-0  dark:bg-gray-700">
                                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-16 sm:w-20 p-1 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>End</option>
                                        <option value="US">00:00</option>
                                        <option value="CA">00:15</option>
                                        <option value="FR">00:30</option>
                                        <option value="DE">00:45</option>
                                        <option value="FR">01:00</option>
                                        <option value="DE">01:15</option>
                                    </select>
                                </div>
                                <div class="flex items-center mb-4">
                                    <h2 class="sm:text-sm text-xs font-medium text-gray-900 dark:text-gray-300 ">Select</h2>
                                    <span class="sm:ml-auto ml-2 sm:text-sm  text-xs font-medium text-gray-400 dark:text-gray-300">Inactive</span>
                                    <label for="small-toggle" class="ml-2 inline-flex relative items-center cursor-pointer">
                                        <input type="checkbox" value="" id="small-toggle" class="sr-only peer">
                                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    </label>
                                    <select id="countries" class="bg-gray-50 border sm:ml-auto ml-2 border-gray-300 text-gray-900 text-xs sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-16 sm:w-20 p-1 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Start</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="FR">France</option>
                                        <option value="DE">Germany</option>
                                    </select>
                                    <hr class="sm:mx-2 mx-0 w-4 h-1 bg-gray-400 rounded border-0  dark:bg-gray-700">
                                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-16 sm:w-20 p-1 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>End</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="FR">France</option>
                                        <option value="DE">Germany</option>
                                    </select>
                                </div>
                                <div class="flex items-center mb-4">
                                    <h2 class="sm:text-sm text-xs font-medium text-gray-900 dark:text-gray-300 ">Select</h2>
                                    <span class="sm:ml-auto ml-2  sm:text-sm text-xs font-medium text-gray-400 dark:text-gray-300">Inactive</span>
                                    <label for="small-toggle" class="ml-2 inline-flex relative items-center cursor-pointer">
                                        <input type="checkbox" value="" id="small-toggle" class="sr-only peer">
                                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    </label>
                                    <select id="countries" class="bg-gray-50 border sm:ml-auto ml-2 border-gray-300 text-gray-900 text-xs sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-16 sm:w-20 p-1 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Start</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="FR">France</option>
                                        <option value="DE">Germany</option>
                                    </select>
                                    <hr class="sm:mx-2 mx-0 w-4 h-1 bg-gray-400 rounded border-0  dark:bg-gray-700">
                                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-16 sm:w-20 p-1 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>End</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="FR">France</option>
                                        <option value="DE">Germany</option>
                                    </select>
                                </div>
                                <div class="flex items-center mb-4">
                                    <h2 class="sm:text-sm text-xs font-medium text-gray-900 dark:text-gray-300 ">Select</h2>
                                    <span class="sm:ml-auto ml-2 sm:text-sm  text-xs font-medium text-gray-400 dark:text-gray-300">Inactive</span>
                                    <label for="small-toggle" class="ml-2 inline-flex relative items-center cursor-pointer">
                                        <input type="checkbox" value="" id="small-toggle" class="sr-only peer">
                                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    </label>
                                    <select id="countries" class="bg-gray-50 border sm:ml-auto ml-2 border-gray-300 text-gray-900 text-xs sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-16 sm:w-20 p-1 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Start</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="FR">France</option>
                                        <option value="DE">Germany</option>
                                    </select>
                                    <hr class="sm:mx-2 mx-0 w-4 h-1 bg-gray-400 rounded border-0  dark:bg-gray-700">
                                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-16 sm:w-20 p-1 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>End</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="FR">France</option>
                                        <option value="DE">Germany</option>
                                    </select>
                                </div>
                                <div class="flex items-center mb-4">
                                    <h2 class="sm:text-sm text-xs font-medium text-gray-900 dark:text-gray-300 ">Select</h2>
                                    <span class="sm:ml-auto ml-2  sm:text-sm text-xs font-medium text-gray-400 dark:text-gray-300">Inactive</span>
                                    <label for="small-toggle" class="ml-2 inline-flex relative items-center cursor-pointer">
                                        <input type="checkbox" value="" id="small-toggle" class="sr-only peer">
                                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    </label>
                                    <select id="countries" class="bg-gray-50 border sm:ml-auto ml-2 border-gray-300 text-gray-900 text-xs sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-16 sm:w-20 p-1 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Start</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="FR">France</option>
                                        <option value="DE">Germany</option>
                                    </select>
                                    <hr class="sm:mx-2 mx-0 w-4 h-1 bg-gray-400 rounded border-0  dark:bg-gray-700">
                                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-16 sm:w-20 p-1 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>End</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="FR">France</option>
                                        <option value="DE">Germany</option>
                                    </select>
                                </div>
                                <div class="flex items-center mb-4">
                                    <h2 class="sm:text-sm text-xs font-medium text-gray-900 dark:text-gray-300 ">Select</h2>
                                    <span class="sm:ml-auto ml-2 sm:text-sm  text-xs font-medium text-gray-400 dark:text-gray-300">Inactive</span>
                                    <label for="small-toggle" class="ml-2 inline-flex relative items-center cursor-pointer">
                                        <input type="checkbox" value="" id="small-toggle" class="sr-only peer">
                                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    </label>
                                    <select id="countries" class="bg-gray-50 border sm:ml-auto ml-2 border-gray-300 text-gray-900 text-xs sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-16 sm:w-20 p-1 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Start</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="FR">France</option>
                                        <option value="DE">Germany</option>
                                    </select>
                                    <hr class="sm:mx-2 mx-0 w-4 h-1 bg-gray-400 rounded border-0  dark:bg-gray-700">
                                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-16 sm:w-20 p-1 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>End</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="FR">France</option>
                                        <option value="DE">Germany</option>
                                    </select>
                                </div>
                                <div class="flex items-center mb-4">
                                    <h2 class="sm:text-sm text-xs font-medium text-gray-900 dark:text-gray-300 ">Select</h2>
                                    <span class="sm:ml-auto ml-2  sm:text-sm text-xs font-medium text-gray-400 dark:text-gray-300">Inactive</span>
                                    <label for="small-toggle" class="ml-2 inline-flex relative items-center cursor-pointer">
                                        <input type="checkbox" value="" id="small-toggle" class="sr-only peer">
                                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    </label>
                                    <select id="countries" class="bg-gray-50 border sm:ml-auto ml-2 border-gray-300 text-gray-900 text-xs sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-16 sm:w-20 p-1 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Start</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="FR">France</option>
                                        <option value="DE">Germany</option>
                                    </select>
                                    <hr class="sm:mx-2 mx-0 w-4 h-1 bg-gray-400 rounded border-0  dark:bg-gray-700">
                                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-16 sm:w-20 p-1 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>End</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="FR">France</option>
                                        <option value="DE">Germany</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="appointment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Want to allow people to book multiple times?</label>
                                <div class="flex items-center">
                                    <input id="link-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Yes, allow people</label>
                                </div>
                            </div>  
                            <div class="flex justify-end items-center pb-8">
                                <button type="button" class="mr-6 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">Back</button>

                                <button type="button" class="flex items-center text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled="">Next 
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                      </svg>
                                      
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>