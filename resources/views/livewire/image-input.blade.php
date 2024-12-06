<div>
    @if ($image && !$errors->any())
        <img 
            class="w-64 h-64 border border-gray-400 object-cover rounded-md" 
            src="{{ $image->temporaryUrl() }}" 
            alt="image preview">
        <button 
            type="button" 
            wire:click="resetImage()" 
            class="btn btn-neutral btn-error btn-sm">
            Reset Image
        </button>
    @else
        <label 
            for="image" 
            class="flex items-center justify-center w-64 h-64 bg-base-200 border border-gray-400 text-gray-400 text-lg cursor-pointer rounded-md transition ease-in-out hover:bg-base-300">
            Click to upload image
        </label>
    @endif

    <input 
        type="file" 
        wire:model="image" 
        name="image" 
        id="image" 
        class="hidden" 
        required>
</div>
