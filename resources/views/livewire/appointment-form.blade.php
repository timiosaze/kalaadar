<div>
    <span class="float-right mb-1" x-text="$wire.progressBar"></span>
    <div class="clear-right"></div>
    <div class="mb-4 w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700" x-data="{val: @entangle('progressBar'), start: 1}" x-init="setTimeout(()=> start = val, 100)">
        <div class="bg-primary-600 h-2.5 rounded-full transition-all" :style="`width: ${start}%; transition: 3s;`"></div>
    </div>
    @if ($currentStep == 1)
        <h2 class="mb-4 text-2xl font-medium">What appointment is it?</h2>
    @endif
    @if ($currentStep == 2)
        <h2 class="mb-4 text-2xl font-medium">When can people book this appointment?</h2>
    @endif
    @if ($currentStep == 3)
        <h2 class="mb-4 text-2xl font-medium">Define the questions that a visitor must answer when making an appointment.</h2>
    @endif
    <div @class(['mb-4', 'hidden' => $currentStep != 1])>
        <form wire:submit.prevent="first()" method="POST">
            @csrf
            <div class="mb-6">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Appointment Name</label>
                <input type="text" wire:model="app_name"  id="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Name of appointment" required="">
            </div> 
            <div class="mb-6 relative">
                <label for="appointment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Appointment Location</label>
                
                <button id="dropdownUsersButton" data-dropdown-toggle="dropdownUsers" data-dropdown-placement="bottom" :class="$wire.link != 'Add a location'  ? 'text-gray-900' : 'text-gray-500'" class="w-full bg-gray-50  border-gray-300 border focus:ring-4 focus:outline-none focus:ring-primary-500  rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center dark:bg-gray-700 dark:border-gray-600  dark:focus:ring-primary-500"  type="button" x-text="$wire.link"><svg class="ml-auto w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                <!-- Dropdown menu -->
                <div id="dropdownUsers" class="hidden z-10 w-60 relative left-10 bg-white rounded shadow dark:bg-gray-700" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="left:39%; position: relative; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 584px, 0px);">
                <ul class="py-1 h-54 text-gray-700 dark:text-gray-200 " aria-labelledby="dropdownUsersButton" style="">
                    <li>
                    <button type="button" data-modal-toggle="popup-modal" href="#" class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        <div class="p-2 rounded-full bg-primary-300 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                        </div>
                        Location
                    </button>
                    </li>

                    <li>
                        <a href="#" class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" @click="$wire.link = 'Google meet'">
                            <div class="p-2 rounded-full bg-primary-300 mr-3">
                                <img class="w-5 h-5" src="{{asset('images/meet.png')}}" alt="Jese image">
                            </div>
                            Google meet
                        </a>
                    </li>
                    <li>
                    <a href="#" class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" @click="$wire.link = 'Zoom'">
                        <div class="p-2 rounded-full bg-primary-300 mr-3">
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
                        Zoom
                    </a>
                    </li>
                    <li>
                    <a href="#" class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" @click="$wire.link = 'Microsoft teams'">
                        <div class="p-2 rounded-full bg-primary-300 mr-3">
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
                        Microsoft teams
                    </a>
                    </li>
                    <li>
                        <a href="#" class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" @click="$wire.link = 'Google Calendar'">
                            <div class="p-2 rounded-full bg-primary-300 mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" class="w-5 h-5" fill-rule="evenodd" clip-rule="evenodd"><path fill="#c7c7c7" fill-rule="evenodd" d="M38,5c-6.302,0-21.698,0-28,0C8.895,5,8,5.895,8,7 c0,3.047,0,3,0,3h32c0,0,0,0.047,0-3C40,5.895,39.105,5,38,5z M14,8c-0.552,0-1-0.448-1-1c0-0.552,0.448-1,1-1s1,0.448,1,1 C15,7.552,14.552,8,14,8z M34,8c-0.552,0-1-0.448-1-1c0-0.552,0.448-1,1-1s1,0.448,1,1C35,7.552,34.552,8,34,8z" clip-rule="evenodd"/><path fill="#1976d2" fill-rule="evenodd" d="M44,11c0.103-0.582-1.409-2-2-2C34.889,9,13.111,9,6,9 c-1,0-2.103,1.418-2,2c0.823,4.664,3,15,3,15h34C41,26,43.177,15.664,44,11z" clip-rule="evenodd"/><path fill="#1e88e5" fill-rule="evenodd" d="M41,26H7c0,0-2.177,10.336-3,15c0,1.146,0.792,2,2,2 c7.111,0,28.889,0,36,0c0.591,0,2-0.5,2-2C43.177,36.336,41,26,41,26z" clip-rule="evenodd"/><path fill="#fafafa" fill-rule="evenodd" d="M20.534 26c.984.325 1.687.85 2.105 1.557.433.732.65 1.55.65 2.457 0 1.582-.519 2.826-1.556 3.733-1.037.906-2.363 1.36-3.977 1.36-1.582 0-2.892-.427-3.93-1.282-1.038-.855-1.536-2.014-1.497-3.476l.036-.072h2.242c0 .914.28 1.642.841 2.182.56.541 1.33.811 2.308.811.994 0 1.773-.27 2.337-.811.564-.541.847-1.34.847-2.397 0-1.073-.25-1.864-.751-2.373-.501-.509-1.292-.763-2.373-.763h-2.051V26H20.534zM31.637 26H33.986000000000004V34.856H31.637z" clip-rule="evenodd"/><path fill="#e0e0e0" fill-rule="evenodd" d="M14.727 22.036h-2.254l-.024-.072c-.04-1.312.435-2.427 1.425-3.345.99-.918 2.284-1.377 3.882-1.377 1.606 0 2.886.427 3.84 1.282.954.855 1.431 2.073 1.431 3.655 0 .716-.217 1.429-.65 2.141-.433.712-1.083 1.254-1.95 1.628L20.534 26h-4.77v-.911h2.051c1.042 0 1.779-.26 2.212-.781.433-.521.65-1.246.65-2.176 0-.994-.246-1.749-.739-2.266-.493-.517-1.22-.775-2.182-.775-.914 0-1.648.268-2.2.805C15.022 20.414 14.746 21.098 14.727 22.036zM33.986 26L31.637 26 31.637 19.782 28.083 19.83 28.083 18.136 33.986 17.492z" clip-rule="evenodd"/><path fill="#1976d2" fill-rule="evenodd" d="M6 9c-1.438 0-2.103 1.418-2 2 .823 4.664 3 15 3 15M41 26c0 0 2.177-10.336 3-15 0-1.625-1.409-2-2-2" clip-rule="evenodd"/></svg>
                            </div> 
                            Google Calendar
                        </a>
                    </li>
                    
                </ul>
                </div>
            </div> 
            <div x-data="{address : ''}" id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6">
                            <div class="flex px-4 py-3 mb-4 text-sm text-primary-700 bg-primary-100 rounded-lg dark:bg-primary-200 dark:text-primary-800" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium pl-4">Location</span>
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Physical address</label>
                                <input x-model="address" type="text" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            
                            <div class="float-right">

                                <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-200 rounded-lg border border-primary-400 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-primary-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-primary-600">Cancel</button>
                                <button @click="$wire.link = address" data-modal-toggle="popup-modal" type="button" class="ml-6 text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:focus:ring-primary-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    Save
                                </button>

                            </div>
                            <div class="clear-right"></div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Description</label>
                <textarea id="description" wire:model="description" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write a summary of the appointment and any additional information your invitee should be aware of."></textarea>
            </div> 
            <div class="float-right">
                <button type="submit" class="flex items-center text-white bg-primary-600 dark:bg-primary-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Next 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                        
                </button>
            </div>
            <div class="clear-right"></div>
        </form>
    </div>
    <div @class(['mb-4', 'hidden' => $currentStep != 2])>
        <form wire:submit.prevent="second()" method="POST">
            @csrf
            <div class="mb-6" x-data="timezones">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Timezone</label>
                <select id="timezone" wire:model.defer="timezone"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option selected>Choose Timezone</option>
                    <template x-for="(timezone, index) in timezones" :key="index">
                        <option :value="timezone.tzCode" x-text="timezone.tzCode"></option>
                    </template>
                </select>
            </div> 
            <div class="mb-6" x-data="{open: false}">
                <label for="appointment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Duration</label>
                <select id="select" wire:model.defer="duration"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option selected value="15 min">15 min</option>
                    <option value="30 min">30 min</option>
                    <option value="45 min">45 min</option>
                    <option value="60 min">60 min</option>
                    <option value="Set custom time">Set custom time</option>
                </select>
                <div class="hidden" id="custom_time">
                    <div class="flex flex-row gap-6 mt-6">
                        <div class="flex-1">
                            <input type="number" id="time" wire:model.defer="custom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>
                        <div class="flex-1">
                            <select id="countries" wire:model.defer="timevar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="{{ $timetype[0] }}">{{ $timetype[0] }}</option>
                                <option value="{{ $timetype[1] }}">{{ $timetype[1] }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div> 
            <div>
                <div class="mb-6">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select available days</label>
                    <ul class="grid gap-6 w-full grid-cols-3 md:grid-cols-5">
                        @foreach ($days as $day)
                            
                            <li>
                                <button type="button" wire:click='toggle("{{ $loop->index }}")' @class(['text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-primary-700 font-medium rounded-lg text-base px-3 py-2 mr-2 mb-2', 'font-bold ring-primary-700 ring-4' => $day['available'] == true])>{{$day['day']}}</button>
                            </li>
                            
                        @endforeach

                    </ul>
                </div>
                <div class="mb-6">
                    <label for="appointment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Select available hours</label>
                    @foreach ($days as $day)
                        <div class="flex items-center mb-4">
                            <h2 class="sm:text-sm text-xs font-medium text-gray-900 dark:text-gray-300 ">Select</h2>
                            <span class="sm:ml-auto ml-2  sm:text-sm text-xs font-medium text-gray-400 dark:text-gray-300">{{$day['activity']}}</span>
                            <label for="small-toggle" class="ml-2 inline-flex relative items-center cursor-pointer">
                                <input type="checkbox" value="" id="small-toggle" class="sr-only peer" @if ($day['available'] == true) checked @endif>
                                <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 dark:peer-focus:ring-primary-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-primary-600"></div>
                            </label>
                            <select wire:model="start_time.{{ $loop->index }}" id="countries" class="bg-gray-50 border sm:ml-auto ml-2 border-gray-300 text-gray-900 text-xs sm:text-sm rounded-md focus:ring-primary-500 focus:border-primary-500 block w-16 sm:w-20 p-1 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" @if ($day['available'] == false) disabled @endif>
                                {{-- <option value="null" selected>Start</option> --}}
                                @foreach ($times as $time)
                                    <option value="{{$time['time']}}">{{$time['time']}}</option>
                                @endforeach
                            </select>
                            <hr class="sm:mx-2 mx-0 w-4 h-1 bg-gray-400 rounded border-0  dark:bg-gray-700">
                            <select wire:model="end_time.{{ $loop->index }}" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-md focus:ring-primary-500 focus:border-primary-500 block w-16 sm:w-20 p-1 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" @if ($day['available'] == false) disabled @endif>
                                {{-- <option value="null" selected>End</option> --}}
                                @foreach ($times as $time)
                                    <option value="{{$time['time']}}">{{$time['time']}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-6">
                <label for="appointment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Want to allow people to book multiple times?</label>
                <div class="flex items-center">
                    <input id="link-checkbox" type="checkbox" wire:model="book_multiple_times" class="w-4 h-4 text-primary-600 bg-gray-100 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Yes, allow people</label>
                </div>
            </div>  
            <div class="flex justify-end items-center pb-8">
                <button type="button" class="mr-6 text-primary-700 hover:text-white border border-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:border-primary-500 dark:text-primary-500 dark:hover:text-white dark:hover:bg-primary-600 dark:focus:ring-primary-800">Back</button>

                <button wire:click="second()" class="flex items-center text-white bg-primary-500 dark:bg-primary-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Next 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                      </svg>
                      
                </button>
            </div>
        </form>
    </div>
    <div @class(['mb-4', 'hidden' => $currentStep != 3])>
        <form x-data="booking" wire:submit.prevent="submit()" method="POST">
            @csrf
            @foreach (array_keys($questions) as $qus)
                
            <div class="mb-6">
                <div class="relative mb-6">
                    <div class="flex absolute inset-y-0 right-0 items-center pr-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                          </svg>
                    </div>
                    <input type="text" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary-500 focus:border-primary-500 block w-full pl-3 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ $qus }}">
                </div>
            </div> 

            @endforeach

            <livewire:question-modal />
            
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
                        <input type="radio" id="stripe" wire:model="payment_mode" name="payment_mode" value="stripe" class="hidden peer" required>
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
                        <input type="radio" id="paypal" wire:model="payment_mode" name="payment_mode" value="paypal" class="hidden peer" required>
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
                            <button data-modal-toggle="popup-modal" type="submit" class="ml-6 text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:focus:ring-primary-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
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
