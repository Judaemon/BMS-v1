<button {{ $attributes->merge(['class' => 'flex flex-row space-x-2 justify-center px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring']) }}>
    <span> {{ $slot }} </span>    
    {{ $icon ?? ''}}
</button>
