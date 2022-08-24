<div class="">
    <label class="block">
        <x-form-label :label="$label" />

        <select
            @if($isWired())
                wire:model{!! $wireModifier() !!}="{{ $name }}"
            @endif

            name="{{ $name }}"

            @if($multiple)
                multiple
            @endif

            @if($placeholder)
                placeholder="{{ $placeholder }}"
            @endif

            {!! $attributes->merge([
                'class' => ($label ? '' : '') . '
                -mt-1 border-gray-300 rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 focus-within:text-primary-600 block w-full
                focus:ring-red-500 
                focus:border-2
                focus:border-gray-900
                dark:bg-gray-700 
                dark:border-gray-600 
                dark:placeholder-gray-400 
                dark:text-white 
                dark:focus:ring-blue-500 
                dark:focus:border-blue-500 
                '
            ]) !!}>

            @if($placeholder)
                <option value="" disabled @if($nothingSelected()) selected="selected" @endif>
                    {{ $placeholder }}
                </option>
            @endif

            @forelse($options as $key => $option)
                <option value="{{ $key }}" @if($isSelected($key)) selected="selected" @endif>
                    {{ $option }}
                </option>
            @empty
                {!! $slot !!}
            @endforelse
        </select>
    </label>

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>