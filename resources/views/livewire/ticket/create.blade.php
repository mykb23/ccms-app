<div class='p-4'>
    @php
    $disabled = $errors->any() || empty($this->customer_name) ? true : false;
    @endphp

    {{-- <div class="flex gap-4"> --}}
        {{-- <div w='1/6'>
            <x-jet-button class='bg-red-600 hover:bg-red-500' wire:click='openModalToSubmitTicket'
                wire:loading.attr='disabled'>
                {{ __('Submit Ticket') }}
            </x-jet-button>
        </div> --}}

        {{-- <div class="w-5/6 mb-0">
            {{-- Alert message --}}
            {{--
            <x-alerts.message /> --}}
            {{--
        </div> --}}
        {{--
    </div> --}}

    {{-- <x-jet-dialog-modal wire:model='openModal'> --}}
        {{-- Title --}}
        {{-- <x-slot name='title'>
            {{ __('Create Ticket') }}
        </x-slot> --}}

        {{-- Content --}}
        {{-- <x-slot name='content'> --}}
            <section class="w-full p-4 mx-auto space-y-4 ">
                {{-- Form --}}
                <form wire:submit.prevent='store' class='space-y-4' id='SubmitForm'>
                    {{-- Customer Name --}}
                    <div class="space-y-4">
                        <x-jet-label for="customerName" value="{{ __('Customer Name') }}" />
                        <x-jet-input wire:model.debounce.500ms="customer_name" id="customerName" class="block w-full"
                            type="text" name="customer_name" :value="old('customer_name')" required autofocus />
                        <x-jet-input-error for="customer_name" />
                    </div>

                    {{-- Subject --}}
                    <div class="space-y-4">
                        <x-jet-label for="subject" value="{{ __('Subject') }}" />
                        <x-jet-input wire:model.debounce.500ms="subject" id="subject" class="block w-full" type="text"
                            name="subject" :value="old('subject')" required autofocus />
                        <x-jet-input-error for="subject" />
                    </div>

                    {{-- Priority --}}
                    <div class="space-y-4">
                        <x-jet-label for="priority" value="{{ __('Priority') }}" />
                        <select id="priority" wire:model.debounce.500ms="priority" name="priority" class="block w-full">
                            <option value="">Choose Priority</option>
                            <option value="important">Important</option>
                            <option value="normal">Normal</option>
                            <option value="urgent">Urgent</option>
                        </select>
                        <x-jet-input-error for="priority" />
                    </div>

                    {{-- Details --}}
                    <div class="space-y-4">
                        <x-jet-label for="details" value="{{ __('Details') }}" />
                        <textarea class="block w-full" id="details" name="details"
                            wire:model.debounce.500ms="details"></textarea>
                        <x-jet-input-error for="details" />
                    </div>

                </form>
            </section>
            {{--
        </x-slot>
        <x-slot name='footer'> --}}
            {{-- Cancel Button --}}
            {{-- <x-jet-secondary-button wire:click="$toggle('openModal')">
                {{ __('Cancel') }}
            </x-jet-secondary-button> --}}

            {{-- Submit Button --}}
            {{-- <x-buttons.primary wire:target='store' wire:loading.attr='disabled' type='submit' :disabled='$disabled'
                form='SubmitForm'>
                {{ __('Create') }}
            </x-buttons.primary>
        </x-slot>
    </x-jet-dialog-modal> --}}

</div>

@push('scripts')
<script>
    // Emit Event
        Livewire.on('submitted', (e) => {
            Swal.fire({
                title: e.title,
                icon: e.icon,
                iconColor: e.iconColor,
                timer: 3000,
                toast: true,
                position: 'top-right',
                timerProgressBar: true,
                showConfirmButton: false,
            });
        });
</script>
@endpush
