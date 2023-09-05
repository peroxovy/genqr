<button {{ $attributes->merge(['type'=> 'submit', 'class' => 'w-full py-2 px-6 bg-green-600 text-gray-100 shadow-md font-semibold border border-green-800 rounded hover:bg-green-800 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105 duration-300']) }}>
    {{ $slot }}
</button>
