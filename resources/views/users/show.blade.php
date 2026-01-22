<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl">
            {{ __('messages.user_profile') }}
        </h2>
    </x-slot>

    <div class="p-6 space-y-4">
        <div><strong>{{ __('messages.name') }}:</strong> {{ $user->name }}</div>
        <div><strong>{{ __('messages.email') }}:</strong> {{ $user->email }}</div>

        <a href="{{ route('users.edit', $user) }}"
           class="text-indigo-600">
            {{ __('messages.edit') }}
        </a>
    </div>
</x-app-layout>
