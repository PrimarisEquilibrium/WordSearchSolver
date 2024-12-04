<div>
    <style>
        .preview-img {
            width: 250px;
            height: 250px;
            border: 1px solid black
        }

        .preview-placeholder {
            display: flex;
            width: 250px; 
            height: 250px;
            background-color:rgb(229, 229, 229);
            border: 1px solid black;
            text-align: center;
            vertical-align: middle;
            line-height: 250px;
            user-select: none;
            cursor: pointer;
        }

        .preview-placeholder-label {
            flex: 1;
            cursor: pointer;
            color: gray;
            font-size: 1.25rem;
        }

        input[type="file"] {
            display: none;
        }
    </style>

    @if ($image)
        <img class="preview-img" src="{{ $image->temporaryUrl() }}" alt="image preview">
    @else
        <div class="preview-placeholder">
            <label class="preview-placeholder-label" for="image">
                Click to upload image
            </label>
        </div>
        <input type="file" wire:model="image" name="image" id="image" required>
    @endif
</div>