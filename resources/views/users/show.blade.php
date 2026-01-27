<x-app-layout>
    <x-slot name="header">
        <h2 class="text-l">
            {{ __('messages.system_settings') }} 
            / 
            <a href="{{ route('users.index') }}" class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                {{ __('messages.users') }}
            </a>
            / 
            {{ __('messages.user_profile') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto" class_x="p-6 space-y-4">
        
        <div><strong>{{ __('messages.name') }}:</strong> {{ $user->name }}</div>
        <div><strong>{{ __('messages.email') }}:</strong> {{ $user->email }}</div>

        <a href="{{ route('users.edit', $user) }}"
           class_x="text-indigo-600"
           class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50"
           >
            {{ __('messages.edit') }}
        </a>
    </div>
</x-app-layout>
