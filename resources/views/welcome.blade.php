<x-guest-layout>
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class=" fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            {{-- @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif --}}
            @endauth
        </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div class="ml-4 text-lg leading-7 font-semibold">
                            <h1 class="text-2xl text-gray-900 dark:text-white font-black">Customer Care Management
                                System</h1>
                        </div>
                    </div>

                    <div class="ml-12 ">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm px-12">
                            CCMS is a customer care management system for managing customers issues reporting and
                            measures customer
                            care agents performances. A customer do not need an account to submit a ticket.<br />
                            Below are Admin user, Supervisor user and just a user(agent) login details to test the
                            application.

                            <div class='flex justify-between mt-1 py-2 px-6'>
                                <h3 class='flex flex-col'>
                                    <span class="text-lg underline font-bold">
                                        Admin User
                                    </span>
                                    <spam>
                                        Email: admin@admin.com
                                    </spam>
                                    Password: password
                                </h3>
                                <h3 class='flex flex-col'>
                                    <span class="text-lg underline font-bold">
                                        Supervisor User
                                    </span>
                                    <spam>
                                        Email: supervisor@supervisor.com
                                    </spam>
                                    Password: password
                                </h3>
                                <h3 class='flex flex-col'>
                                    <span class="text-lg underline font-bold">
                                        User
                                    </span>
                                    <spam>
                                        Email: user@user.com
                                    </spam>
                                    Password: password
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-white">
                <div class="ml-4 text-lg leading-7 font-thin">
                    <h1 class="text-2xl text-gray-900 dark:text-white font-black">Submit Ticket</h1>
                </div>
                <section class="p-6 mx-auto space-y-4 sm:rounded-lg">
                    @if (session('success'))
                    <x-alerts.message />
                    @endif
                    {{-- Form --}}
                    <form class='space-y-4' id='SubmitForm' action="{{ route('ticket') }}" method='post'>
                        @csrf
                        {{-- Customer Name --}}
                        <div class="space-y-4">
                            <x-jet-label for="customerName" value="{{ __('Full Name') }}" />
                            <x-jet-input id="customerName" class="block w-full" type="text" name="full_name"
                                :value="old('full_name')" required autofocus />
                            <x-jet-input-error for="full_name" />
                        </div>

                        {{-- Subject --}}
                        <div class="space-y-4">
                            <x-jet-label for="subject" value="{{ __('Subject') }}" />
                            <x-jet-input id="subject" class="block w-full" type="text" name="subject"
                                :value="old('subject')" required autofocus />
                            <x-jet-input-error for="subject" />
                        </div>

                        {{-- Priority --}}
                        <div class="space-y-4">
                            <x-jet-label for="priority" value="{{ __('Priority') }}" />
                            <select id="priority" name="priority" class="block w-full">
                                <option value="">Choose Priority</option>
                                @php
                                $values=['Important','Urgent','Normal'];
                                @endphp
                                @foreach ($values as $k =>$v)
                                @if (old('priority') == $v)
                                <option value="{{ $v }}" selected>{{ $v }}</option>
                                @else
                                <option value="{{ $v }}">{{ $v }}</option>
                                @endif
                                @endforeach
                            </select>
                            <x-jet-input-error for="priority" />
                        </div>

                        {{-- Details --}}
                        <div class="space-y-4">
                            <x-jet-label for="details" value="{{ __('Details') }}" />
                            <textarea class="block w-full" id="details" name="details"
                                :value="old('details')">{{ old('details') }}</textarea>
                            <x-jet-input-error for="details" />
                        </div>

                        {{-- Submit Button --}}
                        <x-jet-button>
                            {{ __('Submit') }}
                        </x-jet-button>
                    </form>
                </section>
            </div>
        </div>
    </div>
</x-guest-layout>
