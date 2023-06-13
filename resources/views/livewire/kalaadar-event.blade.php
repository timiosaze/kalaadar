<div id="accordion-collapse" data-accordion="collapse">
    {{-- {{dd($end_time)}} --}}
    <h2 id="accordion-collapse-heading-1">
      <div class="flex sm:flex-row flex-col sm:items-center items-start justify-between w-full p-5 font-medium text-left border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
        <div class="flex flex-col items-start gap-1">
            <span class="text-lg">What event is this?</span>
            <p class="font-light text-sm">{{$eventname}} <span class="font-semibold">{{ implode(",", $event_links) }}</span></p>
        </div>
        <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      </div>
    </h2>
    <div id="accordion-collapse-body-1" class="" aria-labelledby="accordion-collapse-heading-1">
        <div class="p-5 font-light border border-b mb-6 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
            <form wire:submit.prevent="startevent" action="">
                <div class="mb-6 sm:w-1/2 w-full">
                    <label for="eventname" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300">Event name *</label>
                    <input type="text" id="eventname" wire:model.defer="eventname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div> 
                <label id="assigned-to-label" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300">Location </label>
                <div class="mb-6 sm:w-1/2 w-full" x-data="{ open: @entangle('show') }">
                    <button type="button" wire:click="setLocation('Google Meet')" @class(['bg-white border-2 border-primary-600 hover:bg-primary-300 focus:ring-4 focus:outline-none focus:ring-blue-600 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 mr-2 mb-2', 'bg-primary-500 text-white' => in_array('Google Meet', $event_links)])>
                        <svg class="mr-2 -ml-1 w-6 h-5" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.575 10L15.914 12.6719L19.0593 14.6828L19.6078 10.0187L19.0593 5.45312L15.8531 7.22031L13.575 10Z" fill="#00832D"/>
                            <path d="M0 14.2518V18.2268C0 19.1361 0.735937 19.8721 1.64531 19.8721H5.62031L6.44531 16.8674L5.62031 14.2518L2.89219 13.4268L0 14.2518Z" fill="#0066DA"/>
                            <path d="M5.62031 0.12793L0 5.74824L2.89219 6.57324L5.62031 5.74824L6.43125 3.17012L5.62031 0.12793Z" fill="#E94235"/>
                            <path d="M5.62031 5.74805H0V14.2512H5.62031V5.74805Z" fill="#2684FC"/>
                            <path d="M22.6547 2.5091L19.0594 5.45285V14.6825L22.6688 17.6403C23.2079 18.0622 24 17.6778 24 16.9888V3.14191C24 2.44816 23.1938 2.06847 22.6547 2.5091ZM13.575 9.99973V14.2513H5.62036V19.8716H17.4141C18.3235 19.8716 19.0594 19.1357 19.0594 18.2263V14.6825L13.575 9.99973Z" fill="#00AC47"/>
                            <path d="M17.4141 0.12793H5.62036V5.74824H13.575V9.99981L19.0594 5.45762V1.77324C19.0594 0.863867 18.3235 0.12793 17.4141 0.12793Z" fill="#FFBA00"/>
                            </svg>
                        Google Meet
                    </button>
                    <button type="button" wire:click="setLocation('Zoom')" @class(['bg-white border-2 border-primary-600 hover:bg-primary-300 focus:ring-4 focus:outline-none focus:ring-blue-600 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 mr-2 mb-2', 'bg-primary-500 text-white' => in_array('Zoom', $event_links)])>
                        <svg  class="mr-2 -ml-1 w-6 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                       Zoom
                    </button>
                    <button type="button" @click="open = ! open; $wire.emitSelf('foo', 'Location')" @class(['bg-white border-2 border-primary-600 hover:bg-primary-300 focus:ring-4 focus:outline-none focus:ring-blue-600 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 mr-2 mb-2', 'bg-primary-500 text-white' => in_array('Location', $event_links)])>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 -ml-1 w-6 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                       Location
                    </button>
                    <button type="button" wire:click="setLocation('Google Calendar')" @class(['bg-white border-2 border-primary-600 hover:bg-primary-300 focus:ring-4 focus:outline-none focus:ring-blue-600 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 mr-2 mb-2', 'bg-primary-500 text-white' => in_array('Google Calendar', $event_links)])>
                       <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" class="mr-2 -ml-1 w-6 h-5" fill-rule="evenodd" clip-rule="evenodd"><path fill="#c7c7c7" fill-rule="evenodd" d="M38,5c-6.302,0-21.698,0-28,0C8.895,5,8,5.895,8,7 c0,3.047,0,3,0,3h32c0,0,0,0.047,0-3C40,5.895,39.105,5,38,5z M14,8c-0.552,0-1-0.448-1-1c0-0.552,0.448-1,1-1s1,0.448,1,1 C15,7.552,14.552,8,14,8z M34,8c-0.552,0-1-0.448-1-1c0-0.552,0.448-1,1-1s1,0.448,1,1C35,7.552,34.552,8,34,8z" clip-rule="evenodd"/><path fill="#1976d2" fill-rule="evenodd" d="M44,11c0.103-0.582-1.409-2-2-2C34.889,9,13.111,9,6,9 c-1,0-2.103,1.418-2,2c0.823,4.664,3,15,3,15h34C41,26,43.177,15.664,44,11z" clip-rule="evenodd"/><path fill="#1e88e5" fill-rule="evenodd" d="M41,26H7c0,0-2.177,10.336-3,15c0,1.146,0.792,2,2,2 c7.111,0,28.889,0,36,0c0.591,0,2-0.5,2-2C43.177,36.336,41,26,41,26z" clip-rule="evenodd"/><path fill="#fafafa" fill-rule="evenodd" d="M20.534 26c.984.325 1.687.85 2.105 1.557.433.732.65 1.55.65 2.457 0 1.582-.519 2.826-1.556 3.733-1.037.906-2.363 1.36-3.977 1.36-1.582 0-2.892-.427-3.93-1.282-1.038-.855-1.536-2.014-1.497-3.476l.036-.072h2.242c0 .914.28 1.642.841 2.182.56.541 1.33.811 2.308.811.994 0 1.773-.27 2.337-.811.564-.541.847-1.34.847-2.397 0-1.073-.25-1.864-.751-2.373-.501-.509-1.292-.763-2.373-.763h-2.051V26H20.534zM31.637 26H33.986000000000004V34.856H31.637z" clip-rule="evenodd"/><path fill="#e0e0e0" fill-rule="evenodd" d="M14.727 22.036h-2.254l-.024-.072c-.04-1.312.435-2.427 1.425-3.345.99-.918 2.284-1.377 3.882-1.377 1.606 0 2.886.427 3.84 1.282.954.855 1.431 2.073 1.431 3.655 0 .716-.217 1.429-.65 2.141-.433.712-1.083 1.254-1.95 1.628L20.534 26h-4.77v-.911h2.051c1.042 0 1.779-.26 2.212-.781.433-.521.65-1.246.65-2.176 0-.994-.246-1.749-.739-2.266-.493-.517-1.22-.775-2.182-.775-.914 0-1.648.268-2.2.805C15.022 20.414 14.746 21.098 14.727 22.036zM33.986 26L31.637 26 31.637 19.782 28.083 19.83 28.083 18.136 33.986 17.492z" clip-rule="evenodd"/><path fill="#1976d2" fill-rule="evenodd" d="M6 9c-1.438 0-2.103 1.418-2 2 .823 4.664 3 15 3 15M41 26c0 0 2.177-10.336 3-15 0-1.625-1.409-2-2-2" clip-rule="evenodd"/></svg>
                        Google Calendar
                    </button>
                    <button type="button" wire:click="setLocation('Microsoft Teams')" @class(['bg-white border-2 border-primary-600 hover:bg-primary-300 focus:ring-4 focus:outline-none focus:ring-blue-600 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 mr-2 mb-2', 'bg-primary-500 text-white' => in_array('Microsoft Teams', $event_links)])>
                        <svg class="mr-2 -ml-1 w-6 h-5" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                        Microsoft Teams
                    </button>
                    <div class="mt-4" x-show="open" x-transition.300ms>
                        <input type="text" id="location" wire:model.defer="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="enter address" required>
                    </div>
                </div>
                <div class="mb-6 sm:w-1/2 w-full">
                    <label for="description" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-400">Description</label>
                    <textarea id="description" wire:model.defer="description" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-sm border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>
                </div>
                <div class="mb-6 sm:w-1/2 w-full">
                    <label for="eventlink" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-400">Event Link *</label>
                    <input type="test" wire:model.defer="app_name_slug" id="eventlink" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                    <!-- Trigger -->
                    <div class="mt-3" x-data="{ text: @entangle('app_name_slug') }">
                        <button  type="button" x-clipboard="text" data-tooltip-target="tooltip-click" data-tooltip-trigger="click" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-sm text-sm px-3 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Copy Link</button>
                        <!-- Show tooltip on click -->
                        <div id="tooltip-click" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Copied
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row items-start mt-6 sm:mt-0 sm:items-center gap-1 sm:ml-auto">
                        <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-4 py-2 ml-auto mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Cancel</button>

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-4 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save & Close</button>
                </div>
            </form>
        </div>
    </div>
    <h2 id="accordion-collapse-heading-2">
        <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
            <div class="flex flex-col items-start gap-1">
            <span class="text-lg">When can people book this event</span>
            <p class="font-light text-sm">30 mins, 1st Nov - 31st Dec, 2022</p>
            </div>
            <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </h2>
    <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2" wire:ignore.self>
        <div class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700">
            <form wire:submit.prevent="second_event" action="">  
                <div class="mb-6 sm:w-1/2 w-full">
                    <label for="date_range" class="block mb-2 text-base font-extrabold text-gray-900 dark:text-gray-300">Date Range</label>
                </div>
                {{-- <div class="flex items-center whitespace-nowrap mb-4 sm:w-1/2 w-full">
                    <input id="default-radio-1" wire:model.defer="date_range" type="radio" value="thirty_days" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">30 calendar days range</label>
                </div>
                <div class="flex items-center whitespace-nowrap mb-4 sm:w-1/2 w-full">
                    <input id="default-radio-2" wire:model.defer="date_range" type="radio" value="within_date" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-2"  class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Within a date range</label>
                    <input type="text" id="selector" wire:model.defer="within_range" class="ml-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ $this->within_range }}">
                </div> --}}
                <div class="flex mb-6 items-center">
                    <input id="default-radio-3" wire:model.defer="date_range" type="checkbox" value="future_date" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                    <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Indefinitely into the future</label>
                </div>
                <div class="mb-6 sm:w-1/2 w-full">
                    <label for="duration" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300">Duration</label>
                    <select id="select" wire:model.defer="duration" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="15" @if ($duration == '15')
                            selected
                        @endif selected>15 min</option>
                        <option value="30" @if ($duration == '30')
                            selected
                        @endif>30 min</option>
                        <option value="45" @if ($duration == '45')
                            selected
                        @endif>45 min</option>
                        <option value="60" @if ($duration == '60')
                            selected
                        @endif>60 min</option>
                    </select>
                </div>
                <div class="mb-6 sm:w-1/2 w-full" x-data="timezones">
                    <label for="email" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300">Timezone</label>
                    <select id="timezone" wire:model.defer="timezone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <template x-for="(timezone, index) in data" :key="index">
                            <option :value="timezone['timezone']" x-text="`${timezone['timezone']} ${timezone['time']}`" :selected="timezone['timezone'] == $wire.timezone"></option>
                        </template>
                    </select>
                </div>
                {{-- {{dd($alldays)}} --}}
                {{ var_export($alldays) }}
                {{ var_export($start_time) }}
                {{ var_export($end_time) }}
                {{ var_export($error_time) }}
                <div class="mb-6 sm:w-1/2 w-full">
                    <label for="duration" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300">Select Days</label>
                    @foreach ($days as $index => $day)
                    <div class="flex items-center mb-4 gap-2" x-data="times">
                        <input type="checkbox" wire:model="alldays" value="{{$day['day']}}" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox-{{$day['day']}}" class="uppercase ml-1 mr-auto text-sm font-medium text-gray-900 dark:text-gray-300">{{$day['day']}}</label>
                        @if (in_array($day['day'], $alldays))
                        
                        <div class="flex items-center gap-2">
                            <select wire:model="start_time.{{$day['day']}}" @class(['appearance-none ml-auto bg-gray-50 border text-xs sm:text-sm text-gray-900 rounded-sm focus:ring-blue-500 focus:border-blue-500 w-20 sm:p-2.5 p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500','border-gray-300' => $error_time[$day['day']] == '',  'border-red-600' => $error_time[$day['day']] != ''])>
                                @foreach ($times as $time)
                                    <option value="{{$time['time']}}" @if ($time['id'] == 10)
                                        selected
                                    @endif>{{$time['time']}}</option>
                                @endforeach
                            </select>
                            <hr class="sm:w-4 h-1 w-0 bg-gray-700 rounded border-0 dark:bg-gray-700">
                            <select wire:model="end_time.{{$day['day']}}" @class(['appearance-none ml-auto bg-gray-50 border text-xs sm:text-sm text-gray-900 rounded-sm focus:ring-blue-500 focus:border-blue-500 w-20 sm:p-2.5 p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500','border-gray-300' => $error_time[$day['day']] == '',  'border-red-600' => $error_time[$day['day']] != ''])>
                                @foreach ($times as $time)
                                    <option value="{{$time['time']}}" @if ($time['id'] == 15)
                                        selected
                                    @endif>{{$time['time']}}</option>
                                @endforeach
                            </select>
                            {{-- <button class="p-2 hover:bg-blue-300 rounded-full transition duration-300 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-red-600 w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button> --}}
                        </div>
                        {{-- <button type="button"  wire:click="addTimes({{$loop->index}})" class="p-2 hover:bg-blue-300 rounded-full transition duration-300 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-blue-600 w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button> --}}
                        @else

                        <p class="text-base font-light text-gray-600">Click checkbox to set</p> 

                        @endif
                        
                    </div>
                    @if($error_time[$day['day']] != '')
                        <p class="text-right pr-7 text-red-600 text-sm font-semibold lowercase mt-minus-15">{{$error_time[$day['day']]}}</p>
                    @endif

                    @for ($i = 0; $i < $day['count']; $i++)
        
                    @php
                        $value = $day['day'].$i ;
                    @endphp
                    <div class="flex items-center justify-center  ml-1 mb-4 gap-2">
                        <select wire:model.defer="start_time.{{$day['day'].$i}}" @class(['appearance-none ml-36 bg-gray-50 border text-xs sm:text-sm text-gray-900 rounded-sm focus:ring-blue-500 focus:border-blue-500 w-20 sm:p-2.5 p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500','border-gray-300' => $error_time[$day['day'].$i] == '',  'border-red-600' => $error_time[$day['day'].$i] != ''])>
                            @foreach ($times as $time)
                                <option value="{{$time['time']}}" @if ($time['id'] == 10)
                                    selected
                                @endif>{{$time['time']}}</option>
                            @endforeach
                        </select>
                        <hr class="sm:w-4 h-1 w-0 bg-gray-700 rounded border-0 dark:bg-gray-700">
                        <select wire:model.defer="end_time.{{$day['day'].$i}}" @class(['appearance-none bg-gray-50 border text-xs sm:text-sm text-gray-900 rounded-sm focus:ring-blue-500 focus:border-blue-500 w-20 sm:p-2.5 p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500','border-gray-300' => $error_time[$day['day'].$i] == '',  'border-red-600' => $error_time[$day['day'].$i] != ''])>
                            @foreach ($times as $time)
                                <option value="{{$time['time']}}" @if ($time['id'] == 15)
                                    selected
                                @endif>{{$time['time']}}</option>
                            @endforeach
                        </select>
                        <button type="button" wire:click="removeOthers({{$i}}, {{$loop->index}})" class="mr-auto p-2 hover:bg-blue-300 rounded-full transition duration-300 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-red-600 w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                    </div>
                    @if($error_time[$day['day'].$i] != '')
                        <p class="text-center text-red-600 text-sm font-semibold lowercase mt-minus-10">{{$error_time[$day['day'].$i]}}</p>
                    @endif
                    
                    @endfor 

                    <hr class="my-3 last:hidden">

                    @endforeach
                </div>
                <div class="mb-6 sm:w-1/2 w-full">
                    <label for="bookings" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300">How many bookings per session? <span class="text-sm text-blue-500">max of 10</span></label>
                    <input type="number" wire:model.defer="bookings" id="bookings" value="1" min="1" max="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div class="flex flex-row items-start mt-6 sm:mt-0 sm:items-center gap-1 sm:ml-auto">
                    <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-4 py-2 ml-auto mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Cancel</button>

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-4 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save & Close</button>
                </div>   
            </form>
        </div>
    </div>
    <h2 id="accordion-collapse-heading-3">
        <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
            <div class="flex flex-col items-start gap-1">
                <span class="text-lg">Question for Invitees?</span>
                <p class="font-light text-sm">Name, Email, Anything...</p>
            </div>
          <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </h2>
      <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
          <div class="p-5 font-light border border-t-0 border-gray-200 dark:border-gray-700">
            <div class="mb-6 sm:w-1/2 w-full">
                <label for="name" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300">Name *</label>
                <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
            </div> 
            <div class="mb-6 sm:w-1/2 w-full">
                <label for="email" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300">Email</label>
                <input type="text" id="email"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
            </div> 
            <div class="mb-6 sm:w-1/2 w-full">
                <label for="anything" class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-400">Anything that could help our meeting</label>
                <textarea disabled id="anything" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-sm border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" ></textarea>
            </div> 
          </div>
      </div>  
    <h2 id="accordion-collapse-heading-4">
      <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-4" aria-expanded="false" aria-controls="accordion-collapse-body-4">
        <span>Choose Payment Method?</span>
        <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      </button>
    </h2>
    <div id="accordion-collapse-body-4" class="hidden" aria-labelledby="accordion-collapse-heading-4">
        <div class="p-5 font-light border border-t-0 border-gray-200 dark:border-gray-700">
            <form wire:submit.prevent="choose_payment" action="" method="POST">
                @csrf
                <div class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <p class="font-normal text-gray-700 dark:text-gray-400">Choose your payment method in the <a href="#">Integrations link</a></p>
                </div>
                <div class="flex items-center my-4">
                    <input checked id="default-radio-1" type="radio" value="none" wire:model.defer="payment" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Do not collect payment</label>
                </div>
                <div class="flex items-center mb-4">
                    <input id="default-radio-2" type="radio" value="stripe" wire:model.defer="payment" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Stripe payment</label>
                </div>
                <div class="flex flex-row items-start mt-6 sm:mt-0 sm:items-center gap-1 sm:ml-auto">
                    <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-4 py-2 ml-auto mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Cancel</button>
        
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-4 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save & Close</button>
                </div>
                
            </form>   
        </div>
    </div>

</div>

