<button {{ $attributes->merge(['type'=> 'button', 'class' => 'w-full py-2 px-6 bg-yellow-400 text-gray-800 shadow-md font-semibold border border-yellow-600 rounded hover:bg-yellow-200 hover:text-gray-600 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105 duration-300']) }}>
    {{ $slot }}
</button>
