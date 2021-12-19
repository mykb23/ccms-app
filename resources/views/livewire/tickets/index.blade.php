<div class="overflow-hidden sm:rounded-lg">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                {{-- Livewire Store Component --}}
                <livewire:tickets.store />
                <div class='mb-2 px-4 flex gap-4'>
                    <div>
                        <x-jet-label for="search" value="{{ __('Search') }}" />
                        <x-jet-input wire:model="search" id="search" class="block w-full" type="text" name="search" />
                    </div>
                    <div>
                        <x-jet-label for="orderBy" value="{{ __('Sort By') }}" />
                        <select id="orderBy" wire:model.debounce.500ms="orderBy" name="orderBy"
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block w-full">
                            <option value="id">Id</option>
                            <option value="customer_name">Customer Name</option>
                            <option value="subject">Subject</option>
                            <option value="priority">Priority</option>
                            <option value="status">Status</option>
                            <option value="agent_name">Agent Name</option>
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
                    <table class="table-auto w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 w-20">No.</th>
                                <th class="px-4 py-2">Customer Name</th>
                                <th class="px-4 py-2">Subject</th>
                                <th class="px-4 py-2">Priority</th>
                                <th class="px-4 py-2">Details</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Agent Name</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody class='bg-white divide-y divide-gray-200'>
                            @foreach ($tickets as $ticket)
                            <tr class='capitalize'>
                                <td class="px-4 py-2 text-sm text-gray-900">{{ $ticket->id }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900">{{ $ticket->customer_name
                                    }}</td>
                                <td class="px-4 py-2 text-gray-900 text-sm">{{
                                    $ticket->subject }}</td>
                                <td class="px-4 py-2 text-sm">{{ $ticket->priority }}</td>
                                <td class="px-4 py-2 text-sm">{{ $ticket->details }}</td>
                                <td class="px-4 py-2">
                                    <span class=" inline-flex text-sm leading-5 font-semibold rounded-full @if($ticket->status === 'closed') {{ 'bg-green-100 text-green-800'}}
                                        @else {{ 'bg-red-100 text-red-800' }}  @endif">
                                        {{$ticket->status }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-900">{{ $ticket->agent_name }}
                                </td>
                                <td class="flex px-4 py-2">
                                    {{-- Edit Button --}}
                                    @if ($ticket->status !== 'closed' ||
                                    auth()->user()->hasAnyRole('Admin') ||
                                    auth()->user()->hasAnyRole('Supervisor'))
                                    <livewire:tickets.edit class="edit" :ticket=$ticket
                                        :wire:key="'edit-ticket'. now() .$ticket->id" />
                                    @endif

                                    {{-- Delete Button --}}
                                    @if (auth()->user()->hasAnyRoles(['Admin','Supervisor']))
                                    <livewire:tickets.delete class="delete" :ticket=$ticket
                                        :wire:key="'delete-ticket'.$ticket->id" />
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $tickets->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
