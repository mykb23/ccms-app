<div class="overflow-hidden sm:rounded-lg">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                {{-- Livewire Store Component --}}
                @if (auth()->user()->hasAnyRole('Admin'))
                <livewire:users.create />
                @endif

                {{--
                <livewire:users.users-table /> --}}
                {{-- <div class='md:col-span-1 flex'> --}}
                    <div class='mb-2 px-4 flex gap-4'>
                        <div class="space-x-0 ">
                            <x-jet-label for="search" value="{{ __('Search') }}" />
                            <x-jet-input wire:model="search" id="search" class="block w-full sm:block sm:w-full"
                                type="text" name="search" />
                        </div>
                        {{-- @dump($tickets[0]) --}}
                        <div class="space-x-0 ">
                            <x-jet-label for="orderBy" value="{{ __('Sort By') }}" />
                            <select id="orderBy" wire:model="orderBy" name="orderBy"
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block w-full">
                                <option value="id">Id</option>
                                <option value="name">Name</option>
                                <option value="email">Email</option>
                                <option value="email_verified_at">Email Verified</option>
                            </select>
                        </div>

                        <div class="space-x-0">
                            <x-jet-label for="orderAsc" value="{{ __('Order By') }}" />
                            <select id="orderAsc" wire:model="orderAsc" name="orderAsc"
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block w-full">
                                <option value="true">Ascending</option>
                                <option value="false">Descending</option>
                            </select>
                        </div>
                    </div>
                    <div class="overflow-y-hidden w-full">
                        {{-- <table class="w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Title
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Role
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full"
                                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                                                    alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    Jane Cooper
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    jane.cooper@example.com
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                                        <div class="text-sm text-gray-500">Optimization</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Active
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Admin
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>
                                </tr>

                                <!-- More people... -->
                            </tbody>
                        </table> --}}
                        <table class="table-auto w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 ">No.</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Email Verified</th>
                                    <th class="px-4 py-2">Role</th>
                                    <th class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody class='bg-white divide-y divide-gray-200'>
                                {{-- @dump($users->roles->name) --}}
                                @foreach ($users as $user)
                                @if (auth()->user()->id !== $user->id)
                                <tr class='capitalize'>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{empty($user->email_verified_at) ? 'Not Verified' : 'Verified'}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        @foreach ($user->roles as $role)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ $role->name }}
                                        </span>
                                        @endforeach
                                    </td>
                                    <td class="flex px-4 py-2">
                                        {{-- Edit Button --}}
                                        @if ($user->hasAnyRole('Admin') !== true)
                                        <livewire:users.edit class="edit" :user=$user
                                            :wire:key="'edit-user'. now() .$user->id" />
                                        @endif

                                        {{-- Delete Button --}}
                                        @if (auth()->user()->hasAnyRole('Admin'))
                                        <livewire:users.delete class="delete" :user=$user
                                            :wire:key="'delete-user'.$user->id" />
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
