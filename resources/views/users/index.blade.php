<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            {{ __('messages.users') }}
        </h2>
    </x-slot>

    <div class="p-6">
        <table class="min-w-full border">
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
                               class="text-indigo-600">
                                {{ __('messages.view') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>