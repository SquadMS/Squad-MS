@props(['id' => null, 'maxWidth' => null])

<x-sqms-foundation::modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ $title }}</h5>
        </div>
        <div class="modal-body">
            {{ $content }}
        </div>
        <div class="modal-footer bg-gray-100">
            {{ $footer }}
        </div>
    </div>
</x-sqms-foundation::modal>