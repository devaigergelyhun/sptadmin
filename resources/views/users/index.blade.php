<x-app-layout>
    <x-slot name="header">
        <h2 class="text-l">
            {{ __('messages.system_settings') }} / {{ __('messages.users') }} 
            |
            <a href="{{ route('users.create') }}" 
               class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                + {{ __('messages.new_user') }}
            </a>
        </h2>
    </x-slot>

    <div class="p-6">
        <table class="min-w-full border bg-white p-6 rounded shadow">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2">#</th>
                    <th class="p-2">{{ __('messages.name') }}</th>
                    <th class="p-2">{{ __('messages.email') }}</th>
                    <th class="p-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-t">
                        <td class="p-2">{{ $user->id }}</td>
                        <td class="p-2">{{ $user->name }}</td>
                        <td class="p-2">{{ $user->email }}</td>
                        <td class="p-2 text-right">
                            <a href="{{ route('users.show', $user) }}"
                               class_x="text-indigo-600"
                               class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50"
                               >
                                {{ __('messages.view') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>