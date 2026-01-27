<x-app-layout>
    <x-slot name="header">
        <h2 class="text-l" orig_class="font-semibold text-l text-gray-800 leading-tight" >
            {{ __('messages.system_settings') }}
            / 
            <a href="{{ route('users.index') }}" class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                {{ __('messages.users') }}
            </a>
            /             
            {{ __('messages.create_user') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto">
        <form method="POST" action="{{ route('users.store') }}" class="bg-white p-6 rounded shadow">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium">{{ __('messages.name') }}</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">{{ __('messages.email') }}</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">{{ __('messages.password') }}</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">{{ __('messages.confirm_password') }}</label>
                <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2" required>
            </div>

            <x-primary-button>
                {{ __('messages.create_user') }}
            </x-primary-button>            
        </form>
    </div>
</x-app-layout>