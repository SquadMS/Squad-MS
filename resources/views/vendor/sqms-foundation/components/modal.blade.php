@props(['id', 'maxWidth', 'fullscreen' => '', 'modal' => false])

@php
$id = $id ?? md5($attributes->get('model', 'showModal'));
switch ($maxWidth ?? '') {
    case 'sm':
        $maxWidth = ' modal-sm';
        break;
    case 'md':
        $maxWidth = '';
        break;
    case 'lg':
        $maxWidth = ' modal-lg';
        break;
    case 'xl':
        $maxWidth = ' modal-xl';
        break;
    default:
        $maxWidth = '';
        break;
}
switch ($fullscreen ?? '') {
    case 'sm':
        $fullscreen = ' modal-fullscreen-sm-down';
        break;
    case 'md':
        $fullscreen = ' modal-fullscreen-md-down';
        break;
    case 'lg':
        $fullscreen = ' modal-fullscreen-lg-down';
        break;
    case 'xl':
        $fullscreen = ' modal-fullscreen-xl-down';
        break;
    case 'xxl':
        $fullscreen = ' modal-fullscreen-xxl-down';
        break;
    case 'all':
        $fullscreen = ' modal-fullscreen';
        break;
    default:
        $fullscreen = '';
        break;
}
@endphp

<!-- Modal -->
<div 
    x-data="{
        show: @entangle($attributes->get('model', 'showModal')).defer,
    }"
    x-init="() => {
        const element = $refs.modal
        const modal = new bootstrap.Modal(element)
        $watch('show', value => {
            if (value) {
                modal.show()
            } else {
                modal.hide()
            }
        })
        element.addEventListener('hide.bs.modal', function () {
            show = false
        })
    }"
    wire:ignore.self 
    tabindex="-1" 
    id="{{ $id }}" 
    aria-labelledby="{{ $id }}" 
    aria-hidden="true"
    x-ref="modal"
    {!! $attributes->except(['id', 'maxWidth'])->merge(['class' => 'modal fade']) !!}
>
    <div class="modal-dialog{{ $maxWidth . $fullscreen }}">
        {{ $slot }}
    </div>
</div>