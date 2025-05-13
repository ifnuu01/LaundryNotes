@php
    $baseClass = "$color text-white p-2 rounded-md flex items-center justify-center font-semibold " . ($width ?? '');
    $secondaryClass = "bg-skyBlue p-2 text-skyBlueDark rounded-md flex items-center gap-2 font-semibold";
@endphp

@if($asLink)
    <a href="{{ $href }}" class="{{ $baseStyle ? $baseClass : $secondaryClass }}">
        @if($icon)
            <iconify-icon icon="{{ $icon }}" width="20" height="20"></iconify-icon>
        @endif
        <span>{{ $text }}</span>
    </a>
@elseif($type)
    <button type="{{ $type }}" class="{{ $baseClass }}" data-id="{{ $dataId}}">
        @if($icon)
            <iconify-icon icon="{{ $icon }}" width="20" height="20"></iconify-icon>
        @endif
        <span>{{ $text }}</span>
    </button>
@else
    <div class="{{ $baseClass }}">
        @if($icon)
            <iconify-icon icon="{{ $icon }}" width="20" height="20"></iconify-icon>
        @endif
        <span>{{ $text }}</span>
    </div>
@endif