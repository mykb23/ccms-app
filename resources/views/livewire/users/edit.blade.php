<div class='p-4'>
    @php
    $disabled = $errors->any() || empty($this->user_role) ? true : false;
    @endphp

    <div class="flex gap-4">
        <div w='1/6'>
            <x-jet-button class='bg-yellow-600 hover:bg-yellow-500 ' wire:click='openModalToUpdateUserRole'
                wire:loading.attr='disabled'>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                </svg>
            </x-jet-button>
        </div>
    </div>

    <x-jet-dialog-modal wire:model='openModal'>
        {{-- Title --}}
        <x-slot name='title'>
            {{ __('Update User') }}
        </x-slot>

        {{-- Content --}}
        <x-slot name='content'>
            <section class="w-full p-4 mx-auto space-y-4 ">
                {{-- Form --}}
                <form wire:submit.prevent='update' class='space-y-4' id='UpdateForm-{{ $this->formId }}'>
                    <div class="space-y-4 bg-white">
                        <x-jet-label for="role" value="{{ __('Role') }}" />
                        <select id="role" wire:model.defer="user_role" name="user_role"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            multiple>
                            @foreach ($roles as $id => $role)
                            <option value="{{ $id }}" wire:key="{{ $user_role }}">
                                {{
                                $role
                                }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </section>
        </x-slot>
        <x-slot name='footer'>
            {{-- Cancel Button --}}
            <x-jet-secondary-button wire:click="$toggle('openModal')">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            {{-- Submit Button --}}
            <x-buttons.primary wire:target='update' wire:loading.attr='disabled' type='submit' :disabled='$disabled'
                form='UpdateForm-{{ $this->formId }}'>
                {{ __('Update') }}
            </x-buttons.primary>
        </x-slot>
    </x-jet-dialog-modal>
</div>
@push('scripts')
<script>
    // Emit Event
        Livewire.on('updated', (e) => {
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
