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
                <div class="p-6 w-full sm:max-w-md h-44 mt-16 bg-white  ">
                    <div>
                        <span class="float-right mb-1">25%</span>
                        <div class="clear-right"></div>
                        <div class="mb-4 w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: 25%"></div>
                        </div>
                        <h2 class="mb-4 text-2xl font-medium">What appointment is it?</h2>

                        <form>
                            <div class="mb-6">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Appointment Time</label>
                                <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required="">
                            </div> 
                            <div class="mb-6 relative">
                                <label for="appointment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Appointment Location</label>
                                
                                <button id="dropdownUsersButton" data-dropdown-toggle="dropdownUsers" data-dropdown-placement="bottom" class="w-full bg-gray-50  border-gray-300 border text-gray-500 focus:ring-4 focus:outline-none focus:ring-blue-500 font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center dark:bg-gray-700 dark:border-gray-600  dark:focus:ring-blue-500" type="button">Project users <svg class="ml-auto w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                                <!-- Dropdown menu -->
                                <div id="dropdownUsers" class="hidden z-10 w-60 relative left-10 bg-white rounded shadow dark:bg-gray-700" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="left:39%; position: relative; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 584px, 0px);">
                                <ul class="py-1 h-54 text-gray-700 dark:text-gray-200 " aria-labelledby="dropdownUsersButton" style="">
                                    <li>
                                    <a data-modal-toggle="popup-modal" href="#" class="flex items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <div class="p-2 rounded-full bg-blue-300 mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                          </svg>
                                        </div>
                                        Jese Leos
                                    </a>
                                    </li>

                                    <li>
                                    <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <div class="p-2 rounded-full bg-blue-300 mr-3">
                                            <img class="w-5 h-5" src="{{asset('images/meet.png')}}" alt="Jese image">
                                        </div>
                                        Robert Gough
                                    </a>
                                    </li>
                                    <li>
                                    <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <div class="p-2 rounded-full bg-blue-300 mr-3">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_67_5420)">
                                            <path d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z" fill="#4A8CFF"/>
                                            <path d="M4.30054 8.2432V13.8825C4.30349 14.4941 4.54917 15.0796 4.98358 15.5102C5.41798 15.9408 6.00557 16.1813 6.61722 16.1788H14.8374C14.9485 16.1794 15.0553 16.1358 15.1343 16.0577C15.2134 15.9796 15.2582 15.8734 15.259 15.7622V10.123C15.2561 9.51131 15.0104 8.92587 14.576 8.49527C14.1416 8.06468 13.554 7.82417 12.9424 7.8266H4.72475C4.66952 7.826 4.61471 7.83631 4.56346 7.85693C4.51222 7.87756 4.46555 7.9081 4.42614 7.94681C4.38673 7.98551 4.35534 8.03162 4.33379 8.08248C4.31223 8.13334 4.30094 8.18796 4.30054 8.2432V8.2432ZM15.7823 10.443L19.1761 7.96377C19.4707 7.7194 19.6994 7.78088 19.6994 8.22287V15.7826C19.6994 16.2855 19.4199 16.2246 19.1761 16.0412L15.7823 13.5675V10.443Z" fill="white"/>
                                            </g>
                                            <defs>
                                            <clipPath id="clip0_67_5420">
                                            <rect width="24" height="24" fill="white"/>
                                            </clipPath>
                                            </defs>
                                            </svg>
                                        </div>
                                        Bonnie Green
                                    </a>
                                    </li>
                                    <li>
                                    <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <div class="p-2 rounded-full bg-blue-300 mr-3">
                                        <svg class="w-5 h-5" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_67_5324)">
                                            <path d="M12.8938 8.0005C14.8269 8.0005 16.3941 6.43338 16.3941 4.50025C16.3941 2.56712 14.8269 1 12.8938 1C10.9607 1 9.39355 2.56712 9.39355 4.50025C9.39355 6.43338 10.9607 8.0005 12.8938 8.0005Z" fill="#7B83EB"/>
                                            <path opacity="0.1" d="M12.6439 5.25H9.47363L9.48938 5.31975L9.49088 5.32575L9.50738 5.39025C9.73774 6.26378 10.2966 7.01456 11.0674 7.48581C11.8381 7.95706 12.7611 8.11235 13.6436 7.91925V6.24975C13.6428 5.98484 13.5373 5.73101 13.3499 5.54369C13.1626 5.35638 12.9088 5.25079 12.6439 5.25Z" fill="black"/>
                                            <path opacity="0.2" d="M11.8935 6H9.73047C10.0143 6.59852 10.4622 7.1042 11.0221 7.45827C11.582 7.81235 12.2308 8.00029 12.8932 8.00025V6.99975C12.8924 6.73484 12.7868 6.48101 12.5995 6.29369C12.4122 6.10638 12.1584 6.00079 11.8935 6Z" fill="black"/>
                                            <path d="M20.7686 8.25C22.2183 8.25 23.3936 7.07475 23.3936 5.625C23.3936 4.17525 22.2183 3 20.7686 3C19.3188 3 18.1436 4.17525 18.1436 5.625C18.1436 7.07475 19.3188 8.25 20.7686 8.25Z" fill="#5059C9"/>
                                            <path d="M23.019 9H17.1232C16.9959 9 16.8738 9.05057 16.7838 9.14059C16.6938 9.23061 16.6432 9.3527 16.6432 9.48V15.5625C16.627 16.4428 16.9137 17.302 17.4553 17.9961C17.997 18.6903 18.7606 19.1772 19.6185 19.3755C20.1648 19.4901 20.7299 19.4815 21.2725 19.3502C21.8151 19.2189 22.3216 18.9683 22.7551 18.6165C23.1886 18.2648 23.5382 17.8208 23.7785 17.3168C24.0188 16.8129 24.1436 16.2618 24.144 15.7035V10.125C24.144 9.82663 24.0255 9.54048 23.8145 9.3295C23.6035 9.11853 23.3174 9 23.019 9Z" fill="#5059C9"/>
                                            <path d="M18.8936 10.125V17.25C18.8943 18.5704 18.4592 19.8541 17.6557 20.902C16.8523 21.9498 15.7254 22.7031 14.45 23.0451C13.1747 23.387 11.8221 23.2984 10.6022 22.793C9.38238 22.2876 8.36344 21.3937 7.70356 20.25C7.55923 20.0101 7.43385 19.7594 7.32856 19.5C7.23039 19.2554 7.14773 19.0049 7.08106 18.75C6.95741 18.2596 6.89444 17.7558 6.89356 17.25V10.125C6.89336 9.97721 6.92232 9.83083 6.97879 9.69425C7.03526 9.55767 7.11812 9.43357 7.22262 9.32907C7.32713 9.22456 7.45122 9.1417 7.5878 9.08523C7.72438 9.02877 7.87076 8.9998 8.01856 9H17.7686C17.9163 8.9998 18.0627 9.02877 18.1993 9.08523C18.3359 9.1417 18.46 9.22456 18.5645 9.32907C18.669 9.43357 18.7519 9.55767 18.8083 9.69425C18.8648 9.83083 18.8938 9.97721 18.8936 10.125Z" fill="#7B83EB"/>
                                            <path opacity="0.2" d="M11.8935 6H9.73047C10.0143 6.59852 10.4622 7.1042 11.0221 7.45827C11.582 7.81235 12.2308 8.00029 12.8932 8.00025V6.99975C12.8924 6.73484 12.7868 6.48101 12.5995 6.29369C12.4122 6.10638 12.1584 6.00079 11.8935 6Z" fill="black"/>
                                            <path opacity="0.1" d="M13.6436 9V18.5025C13.6436 18.7286 13.5662 18.9479 13.4243 19.1239C13.2824 19.2999 13.0845 19.422 12.8636 19.47C12.793 19.491 12.7197 19.5011 12.6461 19.5H7.32856C7.23039 19.2554 7.14773 19.0049 7.08106 18.75C6.95741 18.2596 6.89444 17.7558 6.89356 17.25V10.125C6.89336 9.97721 6.92232 9.83083 6.97879 9.69425C7.03526 9.55767 7.11812 9.43357 7.22262 9.32907C7.32713 9.22456 7.45122 9.1417 7.5878 9.08523C7.72438 9.02877 7.87076 8.9998 8.01856 9H13.6436Z" fill="black"/>
                                            <path opacity="0.2" d="M12.8936 9V19.2525C12.8947 19.3261 12.8845 19.3994 12.8636 19.47C12.8156 19.6909 12.6935 19.8888 12.5174 20.0307C12.3414 20.1726 12.1221 20.25 11.8961 20.25H7.70356C7.55923 20.0101 7.43385 19.7594 7.32856 19.5C7.23039 19.2554 7.14773 19.0049 7.08106 18.75C6.95741 18.2596 6.89444 17.7558 6.89356 17.25V10.125C6.89336 9.97721 6.92232 9.83083 6.97879 9.69425C7.03526 9.55767 7.11812 9.43357 7.22262 9.32907C7.32713 9.22456 7.45122 9.1417 7.5878 9.08523C7.72438 9.02877 7.87076 8.9998 8.01856 9H12.8936Z" fill="black"/>
                                            <path opacity="0.2" d="M12.8936 9V17.7525C12.8924 18.0167 12.7869 18.2697 12.6001 18.4565C12.4133 18.6433 12.1602 18.7488 11.8961 18.75H7.08106C6.95741 18.2596 6.89444 17.7558 6.89356 17.25V10.125C6.89336 9.97721 6.92232 9.83083 6.97879 9.69425C7.03526 9.55767 7.11812 9.43357 7.22262 9.32907C7.32713 9.22456 7.45122 9.1417 7.5878 9.08523C7.72438 9.02877 7.87076 8.9998 8.01856 9H12.8936Z" fill="black"/>
                                            <path opacity="0.2" d="M8.01856 9C7.87076 8.9998 7.72438 9.02877 7.5878 9.08523C7.45122 9.1417 7.32713 9.22456 7.22262 9.32907C7.11812 9.43357 7.03526 9.55767 6.97879 9.69425C6.92232 9.83083 6.89336 9.97721 6.89356 10.125V17.25C6.89444 17.7558 6.95741 18.2596 7.08106 18.75H11.1461C11.4102 18.7488 11.6633 18.6433 11.8501 18.4565C12.0369 18.2697 12.1424 18.0167 12.1436 17.7525V9H8.01856Z" fill="black"/>
                                            <path d="M1.1433 6H11.1438C11.409 6 11.6632 6.10533 11.8507 6.29282C12.0382 6.48031 12.1436 6.7346 12.1436 6.99975V17.0002C12.1436 17.2654 12.0382 17.5197 11.8507 17.7072C11.6632 17.8947 11.409 18 11.1438 18H1.1433C0.878154 18 0.623864 17.8947 0.436375 17.7072C0.248885 17.5197 0.143555 17.2654 0.143555 17.0002L0.143555 6.99975C0.143555 6.7346 0.248885 6.48031 0.436375 6.29282C0.623864 6.10533 0.878154 6 1.1433 6Z" fill="#4B53BC"/>
                                            <path d="M9.1282 9.73141H6.8857V15.7464H5.4142V9.73141H3.1582V8.25391H9.1282V9.73141Z" fill="white"/>
                                            </g>
                                            <defs>
                                            <clipPath id="clip0_67_5324">
                                            <rect width="24.4101" height="24" fill="white"/>
                                            </clipPath>
                                            </defs>
                                            </svg>
                                        </div> 
                                        Leslie Livingston
                                    </a>
                                    </li>
                                    
                                </ul>
                                </div>
                            </div> 
                            <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
                                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6">
                                            <div class="flex px-4 py-3 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                                  </svg>
                                                <span class="sr-only">Info</span>
                                                <div>
                                                  <span class="font-medium">Location</span>
                                                </div>
                                            </div>
                                            <div class="mb-6">
                                                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Physical address</label>
                                                <input type="text" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                           
                                            <div class="float-right">

                                                <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-200 rounded-lg border border-blue-400 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-blue-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-600">Cancel</button>
                                                <button data-modal-toggle="popup-modal" type="button" class="ml-6 text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                    Save
                                                </button>

                                            </div>
                                            <div class="clear-right"></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Description</label>
                                <textarea id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write a summary of the appointment and any additional information your invitee should be aware of."></textarea>
                            </div> 
                            <div class="float-right">
                                <button type="button" class="flex items-center text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled="">Next 
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                      </svg>
                                      
                                </button>
                            </div>
                            <div class="clear-right"></div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>