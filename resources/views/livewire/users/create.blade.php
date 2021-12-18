<div class='p-4'>
    @php
    $disabled = $errors->any() || empty($this->name) || empty($this->email) || empty($this->password) ||
    empty($this->user_role)? true : false;
    @endphp

    <div class="flex gap-4">
        <div w='1/6'>
            <x-jet-button class='bg-red-600 hover:bg-red-500' wire:click='openModalToCreateUser'
                wire:loading.attr='disabled'>
                {{ __('Create User') }}
            </x-jet-button>
        </div>

        <div class="w-5/6 mb-0">
            {{-- Alert message --}}
            <x-alerts.message />
        </div>
    </div>

    <x-jet-dialog-modal wire:model='openModal'>
        {{-- Title --}}
        <x-slot name='title'>
            {{ __('Create User') }}
        </x-slot>

        {{-- Content --}}
        <x-slot name='content'>
            <section class="w-full p-4 mx-auto space-y-4 ">
                {{-- Form --}}
                <form wire:submit.prevent='store' class='space-y-4' id='SubmitForm'>
                    {{-- Name --}}
                    <div class="space-y-4">
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input wire:model.debounce.500ms="name" id="name" class="block w-full" type="text"
                            name="name" :value="old('name')" required autofocus />
                        <x-jet-input-error for="name" />
                    </div>

                    {{-- Email --}}
                    <div class="space-y-4">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input wire:model.debounce.500ms="email" id="email" class="block w-full" type="email"
                            name="email" :value="old('email')" required autofocus />
                        <x-jet-input-error for="email" />
                    </div>

                    {{-- Password --}}
                    <div class="space-y-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" wire:model.debounce.500ms='password' :value="old('password')" />
                        <x-jet-input-error for="password" />
                    </div>

                    {{-- Confirm Password --}}
                    <div class="space-y-4">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" wire:model.debounce.500ms='password_confirmation'
                            :value="old('password_confirmation')" />
                        <x-jet-input-error for="password_confirmation" />
                    </div>

                    {{-- Assign Role --}}
                    <div class="space-y-4 bg-white">
                        <x-jet-label for="roles" value="{{ __('Role') }}" />
                        <select name="user_role" id="roles" wire:model.debounce.500ms="user_role" multiple
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            @foreach($roles as $id => $role)
                            <option value="{{ $id }}" {{ in_array($id, old('user_role', [])) ? ' selected' : '' }}>{{
                                $role
                                }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="user_role" />
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
            <x-buttons.primary wire:target='store' wire:loading.attr='disabled' type='submit' :disabled='$disabled'
                form='SubmitForm'>
                {{ __('Create') }}
            </x-buttons.primary>
        </x-slot>
    </x-jet-dialog-modal>

</div>
@push('scripts')
<script>
    // Emit Event
        Livewire.on('created', (e) => {
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
