<x-guest-layout>
    <div class="flex relative" x-data="{open: false}">
        <aside class="w-64 h-full absolute hidden sm:relative sm:block" id="aside"  aria-label="Sidebar">
            <div class="overflow-y-auto py-4 px-3 h-screen bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center pl-2 mb-5">
                    <img src="{{asset('images/kalaadar-logo.png')}}" class="mr-3 h-6 sm:h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Kalaadar</span>
                    <button class="ml-auto hover:text-primary-600" id="close-aside">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                    </button>
                </div>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('new_appointment') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-md dark:text-white hover:bg-primary-300 dark:hover:bg-gray-700 group">
                            <svg class="w-6 h-6 text-gray-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <mask id="mask0_34_6521" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                <rect width="24" height="24" fill="#D9D9D9"/>
                                </mask>
                                <g mask="url(#mask0_34_6521)">
                                <path d="M12 14C11.7167 14 11.4793 13.904 11.288 13.712C11.096 13.5207 11 13.2833 11 13C11 12.7167 11.096 12.479 11.288 12.287C11.4793 12.0957 11.7167 12 12 12C12.2833 12 12.521 12.0957 12.713 12.287C12.9043 12.479 13 12.7167 13 13C13 13.2833 12.9043 13.5207 12.713 13.712C12.521 13.904 12.2833 14 12 14ZM8 14C7.71667 14 7.479 13.904 7.287 13.712C7.09567 13.5207 7 13.2833 7 13C7 12.7167 7.09567 12.479 7.287 12.287C7.479 12.0957 7.71667 12 8 12C8.28333 12 8.521 12.0957 8.713 12.287C8.90433 12.479 9 12.7167 9 13C9 13.2833 8.90433 13.5207 8.713 13.712C8.521 13.904 8.28333 14 8 14ZM16 14C15.7167 14 15.4793 13.904 15.288 13.712C15.096 13.5207 15 13.2833 15 13C15 12.7167 15.096 12.479 15.288 12.287C15.4793 12.0957 15.7167 12 16 12C16.2833 12 16.5207 12.0957 16.712 12.287C16.904 12.479 17 12.7167 17 13C17 13.2833 16.904 13.5207 16.712 13.712C16.5207 13.904 16.2833 14 16 14ZM12 18C11.7167 18 11.4793 17.904 11.288 17.712C11.096 17.5207 11 17.2833 11 17C11 16.7167 11.096 16.4793 11.288 16.288C11.4793 16.096 11.7167 16 12 16C12.2833 16 12.521 16.096 12.713 16.288C12.9043 16.4793 13 16.7167 13 17C13 17.2833 12.9043 17.5207 12.713 17.712C12.521 17.904 12.2833 18 12 18ZM8 18C7.71667 18 7.479 17.904 7.287 17.712C7.09567 17.5207 7 17.2833 7 17C7 16.7167 7.09567 16.4793 7.287 16.288C7.479 16.096 7.71667 16 8 16C8.28333 16 8.521 16.096 8.713 16.288C8.90433 16.4793 9 16.7167 9 17C9 17.2833 8.90433 17.5207 8.713 17.712C8.521 17.904 8.28333 18 8 18ZM16 18C15.7167 18 15.4793 17.904 15.288 17.712C15.096 17.5207 15 17.2833 15 17C15 16.7167 15.096 16.4793 15.288 16.288C15.4793 16.096 15.7167 16 16 16C16.2833 16 16.5207 16.096 16.712 16.288C16.904 16.4793 17 16.7167 17 17C17 17.2833 16.904 17.5207 16.712 17.712C16.5207 17.904 16.2833 18 16 18ZM5 22C4.45 22 3.979 21.8043 3.587 21.413C3.19567 21.021 3 20.55 3 20V6C3 5.45 3.19567 4.97933 3.587 4.588C3.979 4.196 4.45 4 5 4H6V2H8V4H16V2H18V4H19C19.55 4 20.021 4.196 20.413 4.588C20.8043 4.97933 21 5.45 21 6V20C21 20.55 20.8043 21.021 20.413 21.413C20.021 21.8043 19.55 22 19 22H5ZM5 20H19V10H5V20Z" fill="#1C1B1F"/>
                                </g>
                                </svg>
                            <span class="ml-3">Appointments</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('integrations') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-primary-300 dark:hover:bg-gray-700 group">
                            <svg class="w-6 h-6 text-gray-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <mask id="mask0_34_6388" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                <rect width="24" height="24" fill="#D9D9D9"/>
                                </mask>
                                <g mask="url(#mask0_34_6388)">
                                <path d="M3 22V15H6V11H11V9H8V2H16V9H13V11H18V15H21V22H13V15H16V13H8V15H11V22H3Z" fill="#6B7280"/>
                                </g>
                                </svg>
                            <span class="ml-3">Integrations</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('account') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-primary-300  dark:hover:bg-gray-700 group">
                            <svg class="w-6 h-6 text-gray-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <mask id="mask0_34_6407" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                <rect width="24" height="24" fill="#D9D9D9"/>
                                </mask>
                                <g mask="url(#mask0_34_6407)">
                                <path d="M9.25001 22L8.85001 18.8C8.63335 18.7167 8.42935 18.6167 8.23801 18.5C8.04601 18.3833 7.85835 18.2583 7.67501 18.125L4.70001 19.375L1.95001 14.625L4.52501 12.675C4.50835 12.5583 4.50001 12.4457 4.50001 12.337V11.662C4.50001 11.554 4.50835 11.4417 4.52501 11.325L1.95001 9.375L4.70001 4.625L7.67501 5.875C7.85835 5.74167 8.05001 5.61667 8.25001 5.5C8.45001 5.38333 8.65001 5.28333 8.85001 5.2L9.25001 2H14.75L15.15 5.2C15.3667 5.28333 15.571 5.38333 15.763 5.5C15.9543 5.61667 16.1417 5.74167 16.325 5.875L19.3 4.625L22.05 9.375L19.475 11.325C19.4917 11.4417 19.5 11.554 19.5 11.662V12.337C19.5 12.4457 19.4833 12.5583 19.45 12.675L22.025 14.625L19.275 19.375L16.325 18.125C16.1417 18.2583 15.95 18.3833 15.75 18.5C15.55 18.6167 15.35 18.7167 15.15 18.8L14.75 22H9.25001ZM12.05 15.5C13.0167 15.5 13.8417 15.1583 14.525 14.475C15.2083 13.7917 15.55 12.9667 15.55 12C15.55 11.0333 15.2083 10.2083 14.525 9.525C13.8417 8.84167 13.0167 8.5 12.05 8.5C11.0667 8.5 10.2373 8.84167 9.56201 9.525C8.88735 10.2083 8.55001 11.0333 8.55001 12C8.55001 12.9667 8.88735 13.7917 9.56201 14.475C10.2373 15.1583 11.0667 15.5 12.05 15.5Z" fill="#6B7280"/>
                                </g>
                                </svg>
                            <span class="ml-3">Account settings</span>
                        </a>
                    </li>
                </ul>
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
                            <div class="bg-primary-600 h-2.5 rounded-full" style="width: 25%"></div>
                        </div>
                        <h2 class="mb-4 text-2xl font-medium">When can people book this appointment</h2>

                        <form>
                            <div class="mb-6" x-data="timezones">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Timezone</label>
                                <select id="timezone" wire:model="timezone"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected>Choose Timezone</option>
                                    <template x-for="(timezone, index) in timezones" :key="index">
                                        <option :value="timezone.label" x-text="timezone.label"></option>
                                    </template>
                                </select>
                            </div> 
                            <div class="mb-6" x-data="{open: false}">
                                <label for="appointment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Duration</label>
                                <select id="select" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected value="15 min">15 min</option>
                                    <option value="30 min">30 min</option>
                                    <option value="45 min">45 min</option>
                                    <option value="60 min">60 min</option>
                                    <option value="Set custom time">Set custom time</option>
                                </select>
                                <div class="hidden" id="custom_time">
                                    <div class="flex flex-row gap-6 mt-6">
                                        <div class="flex-1">
                                            <input type="number" id="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                        </div>
                                        <div class="flex-1">
                                            <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option selected value="">Minutes</option>
                                                <option value="US">Hours</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div x-data="available">
                                <div class="mb-6">
                                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select available days</label>
                                    <ul class="grid gap-6 w-full grid-cols-3 md:grid-cols-5">
                                        <template x-for="each in days">
                                            <li>
                                                <input x-on:click="toggle(each.day)" type="checkbox" :id="each.day" value="" class="hidden peer" required="">
                                                <label :for="each.day" class="inline-flex justify-between items-center p-2 w-full text-gray-500 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-primary-600 hover:text-gray-600 dark:peer-checked:text-primary-300 peer-checked:text-primary-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                        
                                                    <div class="block">
                                                        <p x-text="each.day"></p>
                                                    </div>
                                                </label>
                                            </li>
                                        </template>
                                    </ul>
                                </div>
                                <div class="mb-6">
                                    <label for="appointment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Select available hours</label>
                                    <template x-for="each in days">
                                        <div class="flex items-center mb-4">
                                            <h2 class="sm:text-sm text-xs font-medium text-gray-900 dark:text-gray-300 ">Select</h2>
                                            <span class="sm:ml-auto ml-2  sm:text-sm text-xs font-medium text-gray-400 dark:text-gray-300" x-text="each.activity"></span>
                                            <label for="small-toggle" class="ml-2 inline-flex relative items-center cursor-pointer">
                                                <input type="checkbox" value="" id="small-toggle" class="sr-only peer" :checked="(each.available == true) ? true : false">
                                                <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 dark:peer-focus:ring-primary-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-primary-600"></div>
                                            </label>
                                            <select id="countries" class="bg-gray-50 border sm:ml-auto ml-2 border-gray-300 text-gray-900 text-xs sm:text-sm rounded-md focus:ring-primary-500 focus:border-primary-500 block w-16 sm:w-20 p-1 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" :disabled="(each.available == true) ? false : true">
                                                <option selected>Start</option>
                                                <template x-for="time in data" x-data="times">
                                                    <option :value="time.time" x-text="time.time"></option>
                                                </template>
                                            </select>
                                            <hr class="sm:mx-2 mx-0 w-4 h-1 bg-gray-400 rounded border-0  dark:bg-gray-700">
                                            <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-md focus:ring-primary-500 focus:border-primary-500 block w-16 sm:w-20 p-1 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" :disabled="(each.available == true) ? false : true">
                                                <option selected>End</option>
                                                <template x-for="time in data"  x-data="times">
                                                    <option :value="time.time" x-text="time.time"></option>
                                                </template>
                                            </select>
                                        </div>
                                    </template>
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="appointment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Want to allow people to book multiple times?</label>
                                <div class="flex items-center">
                                    <input id="link-checkbox" type="checkbox" value="" class="w-4 h-4 text-primary-600 bg-gray-100 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Yes, allow people</label>
                                </div>
                            </div>  
                            <div class="flex justify-end items-center pb-8">
                                <button type="button" class="mr-6 text-primary-700 hover:text-white border border-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:border-primary-500 dark:text-primary-500 dark:hover:text-white dark:hover:bg-primary-600 dark:focus:ring-primary-800">Back</button>

                                <button type="button" class="flex items-center text-white bg-primary-400 dark:bg-primary-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled="">Next 
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