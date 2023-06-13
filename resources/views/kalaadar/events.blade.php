<x-guest-layout>
    <div class="max-w-4xl mx-auto mt-10">
        <div class="float-right mb-6">
            <a href="{{route('new.event')}}" class="text-primary-500 bg-white hover:bg-primary-800 hover:text-white transition duration-300 ease-in border-2 border-primary-500 focus:ring-4 focus:ring-primary-300 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create Event</a>
        </div>
        <div class="clear-right"></div>

        <div class="mb-4 border-b mx-2 border-primary-300 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-base font-light text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2  rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Event Types</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Scheduled Events</button>
                </li>
            </ul>
        </div>
        <div id="myTabContent">
            <div class="hidden" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                @if ($events->count())
                <div class="grid grid-cols-3 gap-6 my-6">
                    {{-- <div class="relative p-6 max-w-sm h-72 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-row items-start justify-between">
                            <a href="#" class="hover:text-primary-600 hover:underline">
                                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                            </a>
                            <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button"> 
                                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownDots" class="hidden z-10 w-24 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 9035px, 0px);">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                                    <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                    </li>
                                    <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                                    </li>
                                </ul>
                            </div> 
                        </div> 
                        <p class="mb-5 font-normal text-gray-700 dark:text-gray-400">1hr, One on one</p>
                        <a href="#" class="font-light text-primary-600 dark:text-blue-500 hover:underline">View booking page</a>
                        <div class="absolute inset-x-0 bottom-0 bg-primary-200 p-6 flex flex-row items-center justify-between">
                            <div x-data="{ text: 'https://kalaadar-event.test/' }">
                                <button  type="button" x-clipboard="text" data-tooltip-target="tooltip-click" data-tooltip-trigger="click" class="text-primary-500 hover:text-white border-2 transition duration-300 ease-in border-primary-600 bg-white hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-full text-sm px-3 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Copy</button>
                                <!-- Show tooltip on click -->
                                <div id="tooltip-click" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Copied
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            <div>
                                <a href="#" class="text-primary-500 hover:text-white border-2 transition duration-300 ease-in border-primary-600 bg-white hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-full text-sm px-3 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Share</a>
                            </div>
                        </div>
                    </div> --}}
                    
                        
                        @foreach ($events as $event)
                        {{-- {{dd(route('create.event', $event->id))}}   --}}
                        <div class="relative p-6 max-w-sm h-72 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex flex-row items-start justify-between">
                                <a class="hover:text-primary-600 hover:underline" href="{{route('create.event', $event->id)}}" >
                                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">{{ $event->eventname }}</h5>
                                </a>
                                <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button"> 
                                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownDots" class="hidden z-10 w-24 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 9035px, 0px);">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                                        <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                        </li>
                                        <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                                        </li>
                                    </ul>
                                </div> 
                            </div> 
                            @if ($event->bookingevent)
                                <p class="mb-5 font-normal text-gray-700 dark:text-gray-400">{{ $event->bookingevent->duration . ' min' }}</p>
                            @endif
                            <a href="#" class="font-light text-primary-600 dark:text-blue-500 hover:underline">View booking page</a>
                            <div class="absolute inset-x-0 bottom-0 bg-primary-200 p-6 flex flex-row items-center justify-between">
                                <div x-data="{ text: '{{ $event->eventurl }}' }">
                                    <button  type="button" x-clipboard="text" data-tooltip-target="tooltip-click" data-tooltip-trigger="click" class="text-primary-500 hover:text-white border-2 transition duration-300 ease-in border-primary-600 bg-white hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-full text-sm px-3 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Copy</button>
                                    <!-- Show tooltip on click -->
                                    <div id="tooltip-click" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Copied
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="text-primary-500 hover:text-white border-2 transition duration-300 ease-in border-primary-600 bg-white hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-full text-sm px-3 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Share</a>
                                </div>
                            </div>
                        </div>
        
                        @endforeach
                </div>
                @else
                    <p class="text-center text-lg rounded-lg bg-gray-50 dark:bg-gray-800  py-8">No event created yet.</p>
                @endif
            </div>
            <div class="hidden py-4 mx-2 rounded-lg" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                <p class="text-right my-6 text-sm text-gray-600 md:text-base font-semibold">Displaying 0 – 0 of 0 Events</p>
                <div class="border py-2 rounded-t-md border-primary-400">
                    <div class="border-b ">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="eventsTab" data-tabs-toggle="#eventsTabContent" role="tablist">
                            <li class="mr-2" role="presentation">
                                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="upcoming-tab" data-tabs-target="#upcoming" type="button" role="tab" aria-controls="profile" aria-selected="false">Upcoming</button>
                            </li>
                            <li class="mr-2" role="presentation">
                                <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="past-tab" data-tabs-target="#past" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Past</button>
                            </li>
                        </ul>
                    </div>
                    <div id="eventsTabContent">
                        <div class="hidden p-4" id="upcoming" role="tabpanel" aria-labelledby="upcoming-tab">
                            <p class="text-base font-bold">No Upcoming Events</p>
                        </div>
                        <div class="hidden" id="past" role="tabpanel" aria-labelledby="past-tab">
                            <div class="p-3 bg-primary-200">
                                <p class="text-xs md:text-base">Monday, 20 October, 2022</p>
                            </div>
                            <div id="accordion-collapse" data-accordion="collapse">
                                <button type="button" class="items-center justify-between w-full py-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-1" aria-expanded="false" aria-controls="accordion-collapse-body-1">
                                    <ul id="accordion-collapse-heading-1" class="flex m-0 px-3 list-none">
                                        <li class="text-xs md:text-base">16:00 - 17:00</li>
                                        <li class="mx-auto text-xs md:text-base">
                                            <p class="font-medium">Adegbulugbe Timilehin</p>
                                            <p><span class="font-light">Event Type: </span><span>Name of Event</span></p>
                                        </li>   
                                        <li class="text-xs md:text-base inline-flex">
                                            <p class="hidden sm:block">Details</p>
                                            <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </li>
                                    </ul>
                                </button>
                                <div id="accordion-collapse-body-1" class="hidden sm:text-base text-sm" aria-labelledby="accordion-collapse-heading-1">
                                    <div class="flex">
                                        <div class="mx-auto">
                                            <div class="my-3">
                                                <h5 class="font-bold mb-1">EMAIL</h5>
                                                <p class="font-light">timiade1993@gmail.com</p>
                                            </div>
                                            <div class="mb-3">
                                                <h5 class="font-bold mb-1">LOCATION</h5>
                                                <p class="font-light">Google Meet <a href="#" target="_blank" class="text-blue-500">Join Now</a></p>
                                            </div>
                                            <div class="mb-3">
                                                <h5 class="font-bold mb-1">INVITEE TIME ZONE</h5>
                                                <p class="font-light">West Africa Time</p>
                                            </div>
                                            <div class="mb-3">
                                                <h5 class="font-bold mb-1">QUESTIONS</h5>
                                                <div class="mb-2">
                                                    <p class="font-light text-gray-500">Age</p>
                                                    <p class="font-light">29</p>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <p class="font-light text-gray-500">Created 31 October 2022</p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                {{-- <h2 id="accordion-collapse-heading-2">
                                <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                                    <span>Is there a Figma file available?</span>
                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                                </h2>
                                <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
                                    <p class="text-gray-500 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
                                </div>
                                </div>
                                <h2 id="accordion-collapse-heading-3">
                                <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                                    <span>What are the differences between Flowbite and Tailwind UI?</span>
                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                                </h2>
                                <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                                <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">The main difference is that the core components from Flowbite are open source under the MIT license, whereas Tailwind UI is a paid product. Another difference is that Flowbite relies on smaller and standalone components, whereas Tailwind UI offers sections of pages.</p>
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually recommend using both Flowbite, Flowbite Pro, and even Tailwind UI as there is no technical reason stopping you from using the best of two worlds.</p>
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:</p>
                                    <ul class="pl-5 text-gray-500 list-disc dark:text-gray-400">
                                    <li><a href="https://flowbite.com/pro/" class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite Pro</a></li>
                                    <li><a href="https://tailwindui.com/" rel="nofollow" class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind UI</a></li>
                                    </ul>
                                </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
            </div>
        </div>

        <div class="clear-right"></div>
        
    </div>
</x-guest-layout>