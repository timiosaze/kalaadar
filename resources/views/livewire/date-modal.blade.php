<div class="mb-6 w-full px-2">
    <form wire:submit.prevent="save" action="" @class(['flex flex-col items-center', 'hidden' => $currentStep != 1]) style="height:50vh;">
        <div class="w-full mt-auto">
            <label for="text" class="block mb-2 text-center text-sm font-medium text-gray-900 dark:text-gray-300">Choose multiple dates</label>
            <input wire:model="dates" type="text" id="selector" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Select dates" required>
        </div>
    <button type="button" wire:click="datesArray()" class="mt-auto w-full text-white bg-primary-700  hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5   dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Confirm</button>
    <x-modal wire:model.defer="datemodal">
        <x-card title="Select available time">
            
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
        </x-modal>
    </form>
    <form action="" @class(['flex flex-col items-center', 'hidden' => $currentStep != 2]) style="height:50vh;">
        <h5 class="text-lg mb-4 font-semibold w-full">Provide these details</h5>
        <div class="mb-4 w-full">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Fullname</label>
            <input type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
        </div> 
        <div class="mb-4 w-full">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone number</label>
            <input type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
        </div> 
        <div class="mb-4 w-full">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
            <input type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
        </div> 
        <button type="submit" class="inline-flex items-center w-full mt-auto text-white bg-primary-700  hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5   dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
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
