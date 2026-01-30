<x-app-layout>
    <x-slot name="header">
        <h2 class="text-l">
            {{ __('messages.crm') }} / {{ __('messages.partnerusers') }} 
        </h2>
    </x-slot>    

    <div class="p-6">
        <table class="min-w-full border bg-white p-6 rounded shadow">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2">#</th>
                    <th class="p-2">{{ __('messages.partnername') }}</th>
                    <th class="p-2">{{ __('messages.name') }}</th>
                    <th class="p-2">{{ __('messages.admin') }}</th>
                    <th class="p-2">{{ __('messages.systemadmin') }}</th>
                    <th class="p-2">{{ __('messages.loginname') }}</th>
                    <th class="p-2">{{ __('messages.email') }}</th>
                    <th class="p-2">{{ __('messages.active') }}</th>
                    <th class="p-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($partnerusers as $r)
                    <tr class="border-t">
                        <td class="p-2">{{ $r->id }}</td>
                        <td class="p-2">{{ $r->partner->partnername }}</td>
                        <td class="p-2">{{ $r->name }}</td>
                        <td class="p-2">{{ ($r->isadmin == 1 ? strtolower(__('messages.admin')) : '')}}</td>
                        <td class="p-2">{{ ($r->issystemadmin == 1 ? strtolower(__('messages.systemadmin')) : '')}}</td>
                        <td class="p-2">{{ $r->loginname }}</td>
                        <td class="p-2">{{ $r->email }}</td>
                        <td class="p-2">{{ ($r->isactive == 1 ? strtolower(__('messages.active')) : strtolower(__('messages.inactive')))}}</td>
                        <td class="p-2">
                            <a href="{{ route('partnerusers.edit', $r) }}"class_x="text-indigo-600"
                               class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                                {{ __('messages.view') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>    
        </table>
    </div>        
</x-app-layout>
