@props(['id' => null, 'maxWidth' => null])

<x-sqms-foundation::modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="modal-content">
        <div class="modal-body">
            <div class="flex justify-start">
                <div class="mr-3">
                    <div class="bg-yellow-500 p-2 rounded-full">
                        <svg stroke="currentColor" fill="none" viewBox="0 0 24 24" width="24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                </div>
                <div>
                    <h5 class="font-bold">{{ $title }}</h5>
                    {{ $content }}
                </div>
            </div>
        </div>
        <div class="modal-footer bg-gray-100">
            {{ $footer }}
        </div>
    </div>
</x-sqms-foundation::modal>