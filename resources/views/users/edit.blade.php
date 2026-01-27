<x-app-layout>
    <x-slot name="header">
        <h2 class="text-l">
            {{ __('messages.system_settings') }}
            / 
            <a href="{{ route('users.index') }}" class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                {{ __('messages.users') }}
            </a>
            / 
            {{ __('messages.edit_user') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto">
    
        <form method="POST" action="{{ route('users.update', $user) }}" class="bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <x-input-label for="name" :value="__('messages.name')" />
                <x-text-input name="name" value="{{ old('name', $user->name) }}" />
            </div>

            <div class="mb-4">
                <x-input-label for="email" :value="__('messages.email')" />
                <x-text-input name="email" value="{{ old('email', $user->email) }}" />
            </div>

            <x-primary-button>
                {{ __('messages.save') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
