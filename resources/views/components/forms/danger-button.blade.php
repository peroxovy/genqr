<button {{ $attributes->merge(['type'=> 'button', 'class' => 'w-full py-2 px-6 bg-red-400 text-red-900 shadow-md font-semibold border border-red-600 rounded hover:bg-red-200 hover:text-red-600 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105 duration-300']) }}>
    {{ $slot }}
</button>
