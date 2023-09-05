<button {{ $attributes->merge(['type'=> 'submit', 'class' => 'flex justify-center w-full py-2 px-6 bg-teal-600 text-gray-100 shadow-md font-semibold border border-teal-800 rounded hover:bg-teal-400 hover:text-gray-600 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105 duration-300']) }}>
    {{ $slot }}
</button>
