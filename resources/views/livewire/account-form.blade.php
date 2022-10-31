<form wire:submit.prevent="save">
    <div class="flex items-center flex-col sm:flex-row  gap-8 mb-6">
        @if (empty(Auth::user()->getMedia('my-collection')[0]))
            <img class="w-16 h-16 rounded-full" src="{{asset('avatar.png')}}" alt="logo">
        @else
            <img class="w-16 h-16 rounded-full" src="{{Auth::user()->getMedia('my-collection')[0]->getUrl('avatar')}}" alt="Bordered avatar">
        @endif
      
        <div class="flex items-center gap-6">
            <livewire:upload-modal />

            <button wire:click="remove" type="button" @class([
                "text-red-600 font-semibold bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rounded-md text-sm px-5 py-1 mb-2 shadow-md dark:bg-gray-800 dark:text-red-600 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700",
                'cursor-not-allowed' => empty(Auth::user()->getMedia('my-collection')[0])
            ]) 
            {{ (empty(Auth::user()->getMedia('my-collection')[0])) ? 'disabled' : '' }}
            >Remove</button>
        </div>
    </div>
    <div class="mb-6">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Full name</label>
        <input type="name" wire:model="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Adegbulugbe Fadejimi" required="">
    </div> 
    <div class="mb-6" x-data="countries">
        <label for="appointment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Country</label>
        <select id="countries" wire:model="country"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Choose Country</option>
            <template x-for="country in data">
                <option :value="country['name']" x-text="country['name']" :selected="country['name'] === $wire.country"></option>
            </template>
            
        </select>
    </div> 
    <div class="mb-6" x-data="timezones">
        <label for="timezone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Timezone</label>
        <select id="timezone" wire:model="timezone"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Choose Timezone</option>
            <template x-for="(timezone, index) in timezones" :key="index">
                <option :value="timezone.label" x-text="timezone.label" :selected="timezone.label === $wire.timezone"></option>
            </template>
        </select>
    </div>
    <div class="mb-6">
        <label for="biodata" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Bio</label>
        <textarea id="userbio" wire:model="biodata" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write a short intro about you"></textarea>
    </div> 
    <div class="float-right">
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5  mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save Changes</button>
    </div>
    <div class="clear-right"></div>
</form>
