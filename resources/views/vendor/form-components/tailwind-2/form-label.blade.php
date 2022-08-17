@if($label)
    <span {!! $attributes->merge(['class' => 'block mb-2 text-sm font-medium text-gray-600 dark:text-gray-400']) !!}>{{ $label }}</span>
@endif