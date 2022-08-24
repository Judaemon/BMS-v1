<x-form wire:submit.prevent="submit" class="flex justify-center w-full flex-wrap p-3">
    <div class="p-4 my-4 flex justify-center align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-14 fill-orange-500" viewBox="0 0 512 512">
            <path d="M506.3 417l-213.3-364c-16.33-28-57.54-28-73.98 0l-213.2 364C-10.59 444.9 9.849 480 42.74 480h426.6C502.1 480 522.6 445 506.3 417zM232 168c0-13.25 10.75-24 24-24S280 154.8 280 168v128c0 13.25-10.75 24-23.1 24S232 309.3 232 296V168zM256 416c-17.36 0-31.44-14.08-31.44-31.44c0-17.36 14.07-31.44 31.44-31.44s31.44 14.08 31.44 31.44C287.4 401.9 273.4 416 256 416z"/>
        </svg>
        
        <div class="w-full">
            <p class="ml-3 text-lg font-bold ">You are deleting this user!!</p>
            <p class="ml-3">Do you want to proceed?</p>
        </div>
    </div>
    
    <div class="flex justify-center w-full space-x-3">
        <x-form-submit class="!bg-white !text-black border-2 border-gray-800"> 
            Delete
        </x-form-submit>

        <x-form-submit onclick="Livewire.emit('closeModal')" type='button'> Cancel </x-form-submit>
    </div>
</x-form>