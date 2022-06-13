@props(['id', 'name', 'disabled' => false, 'type' => 'text', 'placeholder' => '', 'label' => false, 'help' => false])

@php
    $id = $id ?? ($attributes->whereStartsWith('wire:model')->first() ? md5($attributes->whereStartsWith('wire:model')->first()) : null) ?? \Illuminate\Support\Str::random();
@endphp

<div {{ $attributes->whereDoesntStartWith('wire:') }}>
    @if ($label)
        <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    @endif
    <input {{ $attributes->whereStartsWith('wire:') }} id="{{ $id }}" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded {{ $name && $errors->has($name) ? 'bg-red-700' : '' }}" name="{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}" aria-label="{{ $label ?? $placeholder }}" {{ $disabled ? 'disabled' : ''}}>

    @if ($help)
        <div id="{{ $id }}Help" class="block mt-1">{{ $help }}</div>
    @endif

    @if ($name)
        @error($name) 
            <div id="validation{{ $id }}" class="hidden mt-1 text-sm text-red">
                {{ $message }}
            </div>
        @enderror
    @endif
</div>