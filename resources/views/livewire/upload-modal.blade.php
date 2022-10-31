<div>
    <button onclick="$openModal('uploadModal')" type="button" class="text-blue-600 font-semibold bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rounded-md text-sm px-5 py-1 mb-2 shadow-md dark:bg-gray-800 dark:text-blue-600 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Upload</button>
    <x-modal wire:model.defer="uploadModal" x-on:close-modal.window="on = false">
            <x-card title="Upload Avatar">
            
                <input wire:model='photo' class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" accept="image/*">

                <x-slot name="footer">
                    <div class="flex justify-end gap-x-4">
                        <x-button flat label="Cancel" x-on:click="close" />
                        <x-button wire:click="save" primary label="Store Avatar" />
                    </div>
                </x-slot>
            </x-card>
    </x-modal>
</div>
