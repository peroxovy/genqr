<div x-data="{ filename: '', fileSelected: false }">
    <input type="file" id="fileInput" class="hidden" wire:model="avatar" x-on:change="filename = $event.target.files[0].name; fileSelected = true">
    <label for="fileInput" class="flex justify-center w-full py-2 px-6 bg-green-600 text-gray-100 shadow-md font-semibold border border-green-800 rounded hover:bg-green-800 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105 duration-300 cursor-pointer">
        <span x-text="fileSelected ? filename : '{{$slot}}'"></span>
    </label>
    <button wire:click="uploadAvatar" x-show="fileSelected" class="mt-2 bg-blue-600 text-gray-100 py-2 px-6 shadow-md font-semibold border border-blue-800 rounded hover:bg-blue-800 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105 duration-300">Upload</button>
</div>

<script>
    document.getElementById('fileInput').addEventListener('change', function () {
        document.querySelector('[x-data]').__x.$data.filename = this.files[0].name;
        document.querySelector('[x-data]').__x.$data.fileSelected = true;
    });
</script>
