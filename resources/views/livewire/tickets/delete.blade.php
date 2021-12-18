<div class='p-4'>
    <div class="flex gap-4">
        <x-jet-button class='bg-red-500  hover:bg-red-400' wire:click='openModalToDeleteTicket'>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                    clip-rule="evenodd" />
            </svg>
        </x-jet-button>
    </div>

    <x-jet-dialog-modal wire:model='openModal'>
        {{-- Title --}}
        <x-slot name='title'>
            {{ __('Delete Ticket') }}
        </x-slot>

        {{-- Content --}}
        <x-slot name='content'>
            {{ __('Are you sure you want to delete this ticket') }}
        </x-slot>

        {{-- Footer --}}
        <x-slot name='footer'>
            {{-- Cancel --}}
            <x-jet-secondary-button wire:click="$toggle('openModal')">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            {{-- Delete Button --}}
            <x-jet-danger-button wire:click='delete' wire:loading.attr='disabled'>
                {{ __('Delete Ticket') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

@push('scripts')
<script>
    Livewire.on('ticketDeleted', (e) => {
            Swal.fire({
                title: e.title,
                icon: e.icon,
                iconColor: e.iconColor,
                timer: 3000,
                toast: true,
                position: 'top-right',
                timerProgressBar: true,
                showConfirmButton: false,
            })
        })
</script>
@endpush
