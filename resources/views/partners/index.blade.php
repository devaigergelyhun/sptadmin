<x-app-layout>
    <x-slot name="header">
        <h2 class="text-l">
            {{ __('messages.crm') }} / {{ __('messages.partners') }} 
            |
            <a href="{{ route('partners.create') }}" class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                + {{ __('messages.new') }}
            </a>
        </h2>
    </x-slot>    

    <div class="p-6">
        <table class="min-w-full border bg-white p-6 rounded shadow">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2">#</th>
                    <th class="p-2">{{ __('messages.partnername') }}</th>
                    <th class="p-2">{{ __('messages.country') }}</th>
                    <th class="p-2">{{ __('messages.deflang') }}</th>
                    <th class="p-2">{{ __('messages.active') }}</th>
                    <th class="p-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($partners as $r)
                    <tr class="border-t">
                        <td class="p-2">{{ $r->id }}</td>
                        <td class="p-2">{{ $r->partnername }}</td>
                        <td class="p-2">{{ $r->country }}</td>
                        <td class="p-2">{{ $r->deflang }}</td>
                        <td class="p-2">{{ ($r->active == 1 ? '' : __('messages.inactive'))}}</td>
                        <td class="p-2">
                            <a href="{{ route('partners.edit', $r) }}"class_x="text-indigo-600"
                               class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                                {{ __('messages.view') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>    
        </table>
    </div>        
</x-app-layout>
