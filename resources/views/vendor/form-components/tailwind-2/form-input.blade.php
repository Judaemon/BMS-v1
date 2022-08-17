<div class="@if($type === 'hidden') hidden @else @endif">
    <label class="block flex flex-col">
        <x-form-label :label="$label" />

        <input {!! $attributes->merge([
            'class' => '-mt-1 border-gray-300 rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 focus-within:text-primary-600 ' . ($label ? 'mt-1' : '')
        ]) !!}
            @if($isWired())
                wire:model.defer{!! $wireModifier() !!}="{{ $name }}"
            @else
                value="{{ $value }}"
            @endif

            name="{{ $name }}"
            type="{{ $type }}" />
    </label>

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>