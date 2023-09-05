<div class="delay-1000 ">
    @if (session()->has('success'))
        <div class="p-2 bg-green-400 border-2 border-green-700 text-green-700 font-semibold">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="p-2 bg-red-400 border-2 border-red-700 text-red-700 font-semibold">
            {{ session('error') }}
        </div>
    @endif
</div>
