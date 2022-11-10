{{-- <x-guest-layout> --}}
    <div class="flex relative" x-data="{open: false}">
        <aside class="w-64 h-full absolute hidden sm:fixed sm:block" id="aside"  aria-label="Sidebar">
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
                <div class="p-6 w-full sm:max-w-md h-44 mt-16 bg-white  ">
                    <div>
                        <span class="float-right mb-1">75%</span>
                        <div class="clear-right"></div>
                        <div class="mb-4 w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                            <div class="bg-primary-600 h-2.5 rounded-full" style="width: 75%"></div>
                        </div>
                        <h2 class="mb-2 text-2xl font-medium">Booking form</h2>
                        <p class="mb-4 text-gray-400 text-sm">Define the questions that a visitor must answer when making an appointment.</p>

                        <form x-data="booking">
                            <div class="mb-6">
                                <div class="relative mb-6">
                                    <div class="flex absolute inset-y-0 right-0 items-center pr-3 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                          </svg>
                                    </div>
                                    <input type="text" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary-500 focus:border-primary-500 block w-full pl-3 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Full Name">
                                </div>
                            </div> 
                            <div class="mb-6">
                                <div class="relative mb-6">
                                    <div class="flex absolute inset-y-0 right-0 items-center pr-3 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                          </svg>
                                    </div>
                                    <input type="text" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary-500 focus:border-primary-500 block w-full pl-3 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Phone number">
                                </div>
                            </div> 
                            <div class="mb-6">
                                <div class="relative mb-6">
                                    <div class="flex absolute inset-y-0 right-0 items-center pr-3 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                          </svg>
                                    </div>
                                    <input type="text" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary-500 focus:border-primary-500 block w-full pl-3 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Email">
                                </div>
                            </div> 
                            <button data-modal-toggle="popup-modal" type="button" class="flex mb-4 items-center text-white bg-primary-400 dark:bg-primary-500  font-medium rounded-lg text-sm px-3 py-1.5 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                  </svg>
                                Add a question 
                            </button>
                            <div>
                                <h2 class="mb-2 text-base font-medium">Required contact details</h2>
                                <p class="mb-4 text-gray-400 text-sm">Contact details needs to provide when booking an appointment</p>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="default-radio-1" type="radio" value="" name="default-radio" class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email is required</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input checked id="default-radio-2" type="radio" value="" name="default-radio" class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone number is required</label>
                            </div>   
                            <div class="flex items-center mb-4">
                                <input checked id="default-radio-2" type="radio" value="" name="default-radio" class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Both phone number and email are required</label>
                            </div>
                            <div class="mb-6">
                                <label for="amount" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300">Payment Amount</label>
                                <p class="mb-4 text-gray-400 text-sm">Charge the amount you want your contacts to pay for your appointment</p>
                                <div class="relative mb-6">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                          </svg>
                                    </div>
                                    <input type="number" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="10">
                                </div>
                            </div>  
                            <div class="mb-6">
                                <label for="amount" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300">Payment Mode</label>
                                <p class="mb-4 text-gray-400 text-sm">Select a payment platform you want your contacts to pay you</p>
                                <ul class="grid gap-6 w-full md:grid-cols-2">
                                    <li>
                                        <input type="radio" id="stripe" name="payment_mode" value="stripe" class="hidden peer" required>
                                        <label for="stripe" class="inline-flex gap-2 items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-primary-500 peer-checked:border-primary-600 peer-checked:text-primary-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                                            <svg class="mr-3 w-6 h-6"  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_158_7306)">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M51.873 6.35258L51.6465 5.27708H48.4995V18.0301H52.1355V9.37508C52.9958 8.25008 54.447 8.46908 54.909 8.61233V5.27858C54.4245 5.10458 52.7243 4.78508 51.873 6.35108V6.35258ZM44.5755 2.11808L41.0235 2.87258L41.0085 14.5441C41.0085 16.6966 42.627 18.2888 44.787 18.2888C45.9757 18.2888 46.854 18.0623 47.3407 17.8066V14.8441C46.8742 15.0301 44.5785 15.6976 44.5785 13.5541V8.37908H47.3407V5.27633H44.5785L44.5755 2.11808ZM34.725 8.97758C34.725 8.40908 35.1975 8.19008 35.961 8.19008C37.2249 8.21745 38.465 8.5384 39.5835 9.12758V5.70008C38.4302 5.24663 37.2001 5.02048 35.961 5.03408C33.018 5.03408 31.0432 6.57608 31.0432 9.15008C31.0432 13.1776 36.5745 12.5236 36.5745 14.2598C36.5745 14.9393 35.9895 15.1493 35.1772 15.1493C33.9727 15.1493 32.4172 14.6513 31.197 13.9868V17.4593C32.4532 18.0057 33.8074 18.2908 35.1772 18.2971C38.202 18.2971 40.287 16.8031 40.287 14.1833C40.287 9.83633 34.7243 10.6133 34.7243 8.97608L34.725 8.97758ZM10.41 7.13633C10.41 6.10883 11.265 5.71133 12.6465 5.71133C14.9329 5.76073 17.1766 6.34128 19.2 7.40708V1.20458C17.1135 0.384619 14.8882 -0.0241345 12.6465 0.000834473C7.3215 0.000834473 3.75 2.79008 3.75 7.44758C3.75 14.7346 13.7565 13.5511 13.7565 16.6921C13.7565 17.9206 12.7065 18.3016 11.229 18.3016C9.05025 18.3016 6.23625 17.4001 4.029 16.2001V22.4836C6.30151 23.4724 8.75147 23.9883 11.2297 24.0001C16.7025 24.0001 20.475 21.2963 20.475 16.5578C20.475 8.69333 10.41 10.0981 10.41 7.13783V7.13633Z" fill="#6772E5"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_158_7306">
                                                <rect width="24" height="24" fill="white"/>
                                                </clipPath>
                                                </defs>
                                                </svg>
                                            <div class="block">
                                                <div class="w-full  text-xl font-semibold">Stripe</div>
                                            </div>    
                                        </label>
                                    </li>
                                    <li>
                                        <input type="radio" id="paypal" name="payment_mode" value="paypal" class="hidden peer" required>
                                        <label for="paypal" class="inline-flex gap-2 items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-primary-500 peer-checked:border-primary-600 peer-checked:text-primary-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                                            <svg class="mr-3 w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_158_7298)">
                                                <path d="M20.1038 6.20062C20.1444 5.87039 20.1656 5.53416 20.1656 5.19295C20.1657 2.325 17.8407 0 14.9727 0H6.29416C5.74826 0 5.28218 0.394219 5.19162 0.932531L1.99381 19.9392C1.87906 20.6212 2.40481 21.2427 3.09635 21.2427H6.27031C6.81621 21.2427 7.29106 20.8488 7.38157 20.3104C7.38157 20.3104 7.38687 20.2789 7.39643 20.2221H7.39648L6.95416 22.8511C6.8531 23.4522 7.31646 24 7.92598 24H10.7027C11.1839 24 11.5947 23.6525 11.6745 23.178L12.4633 18.4896C12.5993 17.6814 13.299 17.0896 14.1185 17.0896H14.848C18.8104 17.0896 22.0224 13.8775 22.0224 9.91519C22.0224 8.38195 21.2645 7.02666 20.1038 6.20062Z" fill="#002987"/>
                                                <path d="M20.1034 6.20068C19.6068 10.2403 16.1638 13.3683 11.99 13.3683H9.5682C9.02159 13.3683 8.54951 13.7324 8.40143 14.2472L6.95384 22.8511C6.85273 23.4522 7.31609 24.0001 7.92561 24.0001H10.7023C11.1835 24.0001 11.5943 23.6526 11.6741 23.1781L12.463 18.4897C12.599 17.6814 13.2987 17.0897 14.1182 17.0897H14.8476C18.81 17.0897 22.022 13.8775 22.022 9.91525C22.022 8.38201 21.2642 7.02671 20.1034 6.20068Z" fill="#0085CC"/>
                                                <path d="M9.56818 13.3682H11.99C16.1639 13.3682 19.6068 10.2402 20.1034 6.20063C19.3586 5.67066 18.4485 5.35791 17.4648 5.35791H11.1437C10.424 5.35791 9.80954 5.87761 9.6901 6.5873L8.40137 14.247C8.54945 13.7323 9.02157 13.3682 9.56818 13.3682Z" fill="#00186A"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_158_7298">
                                                <rect width="24" height="24" fill="white"/>
                                                </clipPath>
                                                </defs>
                                                </svg>
                                            <div class="block">
                                                <div class="w-full text-xl font-semibold">PayPal</div>
                                            </div>    
                                        </label>
                                    </li>
                                </ul>
                            </div>  
                            <div class="flex justify-end items-center pb-8">
                                <button type="button" class="mr-6 text-primary-700 hover:text-white border border-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:border-primary-500 dark:text-primary-500 dark:hover:text-white dark:hover:bg-primary-600 dark:focus:ring-primary-800">Back</button>

                                <button data-modal-toggle="small-modal" type="button" class="flex items-center text-white bg-primary-600 dark:bg-primary-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Done</button>
                            </div>
                            <div x-data="booking" id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
                                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6">
                                            <div class="mb-6">
                                                <span class="font-semibold text-base">Add a question</span>
                                            </div>
                                            <div class="mb-6" id="question_first">
                                                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Question name</label>
                                                <input type="text" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="mb-6"></div>
                                            <button @click="appendQusModal()" class="flex px-2 w-1/2 py-1 mb-6 text-sm text-primary-700 bg-primary-100 rounded-lg dark:bg-primary-200 dark:text-primary-800" role="alert">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                                  </svg>
                                                <span class="sr-only">Info</span>
                                                <div>
                                                    <span class="font-medium">Add a question</span>
                                                </div>
                                            </button>
                                            <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-200 rounded-lg border border-primary-400 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-primary-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-primary-600">Cancel</button>
                                            <button data-modal-toggle="popup-modal" type="button" class="ml-6 text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:focus:ring-primary-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Save
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Small Modal -->
                            <div id="small-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                                Appointment page is ready
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="small-modal">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-6 space-y-6">
                                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                You can share the link with your contacts and they will be a able to vook an appointment with you easily.
                                            </p>
                                            <p class="text-sm flex items-center justify-between leading-relaxed text-primary-600 dark:text-primary-500">
                                                https://kalaadar.com/israel-adegbulugbe 
                                                <button class="p-2 hover:scale-110 rounded-full hover:bg-primary-300 transition ease-in-out duration-500" data-tooltip-target="tooltip-animation">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75" />
                                                      </svg>
                                                </button>
                                                <div id="tooltip-animation" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                                    Copy
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            </p>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                            <button data-modal-toggle="small-modal" type="button" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">I accept</button>
                                            <button data-modal-toggle="small-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- </x-guest-layout> --}}