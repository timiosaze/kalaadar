<div>
    <button onclick="$openModal('cardModal')" type="button" class="flex mb-4 items-center text-white bg-primary-400 dark:bg-primary-500  font-medium rounded-lg text-sm px-3 py-1.5 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
          </svg>
        Add a question 
    </button>
    <x-modal.card title="Edit Customer" blur wire:model.defer="cardModal">
        <div class="grid grid-cols-1 gap-4 mb-4">
            <x-input wire:model="question" label="Question" placeholder="Enter Question" />
        </div>
     
        <x-slot name="footer">
            
            <div class="flex place-items-start gap-6">
                <x-button flat label="Cancel" class="bg-red-500 text-white hover:bg-red-700" x-on:click="close" />
                <x-button primary label="Save" wire:click="save" />
            </div>
        </x-slot>
    </x-modal.card>
</div>
