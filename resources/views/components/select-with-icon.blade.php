<div class="flex flex-col mt-4 w-full">
    <label for="{{ $name }}" class="text-sm text-fg">{{ $label }}</label>
    <div class="flex items-center border rounded-md px-2 mt-1 focus-within:ring-2 focus-within:ring-skyBlueDark relative">
        <iconify-icon icon="{{ $icon }}" class="text-fg" width="24" height="24"></iconify-icon>
        <select name="{{ $name }}" id="{{ $name }}"
                class="appearance-none bg-transparent p-2 pl-2 outline-none w-full text-sm text-fg placeholder:text-fg/50">
            <option disabled selected>{{ $placeholder }}</option>
            {{ $slot }}
        </select>
    </div>
</div>
