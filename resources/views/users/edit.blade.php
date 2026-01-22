<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl">
            {{ __('messages.edit_user') }}
        </h2>
    </x-slot>

    <form method="POST"
          action="{{ route('users.update', $user) }}"
          class="p-6 space-y-4">
        @csrf
        @method('PUT')

        <div>
            <x-input-label for="name" :value="__('messages.name')" />
            <x-text-input name="name" value="{{ old('name', $user->name) }}" />
        </div>

        <div>
            <x-input-label for="email" :value="__('messages.email')" />
            <x-text-input name="email" value="{{ old('email', $user->email) }}" />
        </div>

        <x-primary-button>
            {{ __('messages.save') }}
        </x-primary-button>
    </form>
</x-app-layout>
