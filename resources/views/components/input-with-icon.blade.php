<div class="flex flex-col mt-4 w-full">
    <label for="{{ $name }}" class="text-sm text-fg">{{ $label }}</label>
    <div class="flex items-center border rounded-md px-2 mt-1 focus-within:ring-2 focus-within:ring-skyBlueDark">
        <iconify-icon icon="{{ $icon }}" class="text-fg" width="24" height="24"></iconify-icon>
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" 
               class="rounded-md p-2 outline-none w-full text-sm text-fg placeholder:text-fg/50"
               placeholder="{{ $placeholder }}">
    </div>
</div>
