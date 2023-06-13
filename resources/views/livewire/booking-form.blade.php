<div class="mb-6 w-full px-1 sm:px-6">
    <div @class(['flex flex-col h-screen sm:flex-row', 'hidden' => $currentStep != 1]) style="height:50vh;">
        {{-- {{dd($user_times)}} --}}
        <div @class(['sm:w-96 w-72 flex flex-col'])>
            <header class="flex items-center">
                <p class="current-date text-center mx-auto">November 2022</p>
                <div class="icons mx-auto">
                    <span id="prev" class="material-symbols-outlined">
                        chevron_left
                    </span>
                    <span id="next" class="material-symbols-outlined">
                        chevron_right
                    </span>
                </div>
            </header>
            <div class="calendar p-0 sm:p-5">
                <ul class="weeks">
                    <li>Sun</li>
                    <li>Mon</li>
                    <li>Tue</li>
                    <li>Wed</li>
                    <li>Thu</li>
                    <li>Fri</li>
                    <li>Sat</li>
                </ul>
                <ul class="days" x-data="{ open: false }"></ul>
            </div>
        </div>
        <script>
            const currentDate = document.querySelector(".current-date"),
            daysTag = document.querySelector(".days"),
            prevNextIcon = document.querySelectorAll(".icons span");
            let date = new Date();
            currYear = date.getFullYear();
            currMonth = date.getMonth();

            // console.log(date, currYear, currMonth);
            const months = [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December"
            ]
            window.addEventListener('render-calendar', event => {
                renderCalendar();
            });
            const renderCalendar = () => {
                let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(),
                lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(),
                lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(),
                lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate();

                let available_days ='<?php echo json_encode($selected_days);?>';
                // console.log(available_days);
                let liTag = '';
                for (let i = firstDayofMonth;  i>0; i--) {
                    liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
                }
                for (let i = 1; i <= lastDateofMonth; i++) {
                    const y = new Date(currYear, currMonth, i).getDay();
                    const a = new Date(currYear, currMonth, i).getDate(); 
                    const b = new Date(currYear, currMonth, i).getMonth() + 1; 
                    const c = new Date(currYear, currMonth, i).getFullYear(); 
                    const fulldate = c + '-' + b + '-' + a;
                    console.log(y);
                    let x = y % 6;
                    let isToday = i === date.getDate() && currMonth === new Date().getMonth(); 
                    if(available_days.indexOf(y) >= 0){
                        liTag += `<li class="not-choosed hover:text-white px-1"> 
                        <a href="#" class="" @click="$wire.emitSelf('getWeekDay', ${y},'${fulldate}')">${i}</a>
                        </li>`;
                    } else {
                        liTag += `<li class="inactive choosed px-1"> 
                        <a href="#" class="">${i}</a>
                        </li>`;
                    }
                
                }

                for (let i = lastDayofMonth;  i<6; i++) {
                    liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`;
                }


                currentDate.innerText = `${months[currMonth]} ${currYear}`;
                daysTag.innerHTML = liTag;

            }

            prevNextIcon.forEach(icon => {
                icon.addEventListener("click", () => {
                    currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;
                    console.log(currMonth);
                    if(currMonth < 0 || currMonth > 11) {
                        date= new Date(currYear, currMonth);
                        currYear = date.getFullYear();
                        currMonth = date.getMonth();
                    } else {
                        date = new Date();
                    }
                    renderCalendar();
                })
            })

            renderCalendar();
        </script>
        <div @class(['text-center w-64 text-center overflow-auto', 'hidden' => $switch == false])>
            <p class="text-sm mb-2 font-medium text-primary-600">Pick a time</p>
            {{-- {{ var_export($user_times[$key]) }} --}}
           
                @foreach ($user_times[$selected_day][0] as $time)
                    
                    <button wire:click="confirmTime('{{$time}}')" type="button" class="rounded-sm w-40 justify-center inline-flex items-center m-2 hover:text-white transition duration-300 ease-in border-2 border-primary-600 text-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-300 font-medium text-sm px-5 py-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        {{$time}}
                    </button>

                @endforeach
                

        </div>
        <x-modal wire:model.defer="timeModal">
            <x-card title="Confirm Time">
                <p class="text-lg text-gray-600">
                   {{$selected_time}}
                </p>
         
                <x-slot name="footer">
                    <div class="flex justify-end gap-x-4">
                        <x-button flat label="Cancel" x-on:click="close" />
                        <x-button primary label="Confirm" wire:click="saveBooking()"/>
                    </div>
                </x-slot>
            </x-card>
        </x-modal>
        {{-- <x-modal wire:model.defer="datemodal">
            <x-card title="Select available time">
                {{dd($times)}}
                <div class="flex flex-col gap-4">
                    @foreach (array_keys($formattedDates) as $date)
                        
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium">
                            {{$date}}
                        </p>
                        <div x-data="times">
                            <select id="small" wire:model="formattedDates.{{ $date }}" class="px-5 py-2 w-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" style="width:100px;">
                            <option selected>Time</option>
                            @foreach ($times as $time)
                                <option value="{{$time['time']}}">{{$time['time']}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>

                    @endforeach

                </div>
        
                <x-slot name="footer">
                    <div class="flex justify-end gap-x-4">
                        <x-button flat label="Cancel" x-on:click="close" />
                        <x-button primary type="submit" label="Submit" />
                    </div>
                </x-slot>
                </x-card>
        </x-modal> --}}
    </div>
    <div @class(['flex flex-col items-center max-w-md', 'hidden' => $currentStep != 2])>
        <form wire:submit.prevent="bookingDetail()" action="" >
            @foreach (array_keys($questions) as $qus)
                
            <div class="mb-4 w-full">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$qus}}</label>
                <input type="text" wire:model="questions.{{$qus}}" id="{{$qus}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
            </div> 

            @endforeach

            @foreach ($event_links as $key => $link)
                
            <div class="flex items-center mb-4">
                <input id="default-radio-{{$key}}" type="radio" value="{{$link}}" wire:model="link" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-{{$key}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$link}}</label>
            </div>

            @endforeach

            <button type="submit" class="inline-flex items-center w-full mt-auto text-white bg-primary-700  hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-sm text-sm px-5 py-2.5   dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
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
                Pay $10 to schedule event</button>
        </form>
    </div>
    <div @class(['flex flex-col items-center justify-center', 'hidden' => $currentStep != 3])>
        <div class="text-center md:w-3/4 w-full">
            <h1 class="font-bold text-base mb-2">Confirmed</h1>
            <h3 class="font-light text-sm mb-2">You are scheduled with Kolade Omowon</h3>
            <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
            <div class="flex items-center mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 9.563C9 9.252 9.252 9 9.563 9h4.874c.311 0 .563.252.563.563v4.874c0 .311-.252.563-.563.563H9.564A.562.562 0 019 14.437V9.564z" />
                </svg>
                <span class="font-bold text-lg">Short Conversation on Love</span>  
            </div>
            <div class="flex items-center mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-500 w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                </svg>
                <span class="text-sm text-gray-500 font-semibold">15:00 - 15:30, Friday, March 31, 2023</span>  
            </div>
            <div class="flex items-center mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-500 w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                </svg>
                <span class="text-sm text-gray-500 font-semibold">West African Time</span>
            </div>
            <div class="flex items-center mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-500 w-5 h-5 mr-2">
                    <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                </svg>
                <span class="text-sm text-gray-500 font-semibold">Web Conferencing Details to follow</span>
            </div>
            <p class="font-bold mb-4 text-sm text-center mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
        </div>
    </div>
</div>
