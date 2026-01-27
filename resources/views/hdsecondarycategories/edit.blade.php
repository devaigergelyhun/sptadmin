<x-app-layout>
    <x-slot name="header">
        <h2 class="text-l">
            {{ __('bd.basic_datas') }}
            / 
            <a href="{{ route('hdsecondarycategories.index') }}" class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                {{ __('bd.hdsecondarycategories') }}
            </a>
            / 
            {{ __('messages.edit') }}
        </h2>
    </x-slot>
    <div class="py-6 max-w-xl mx-auto">
        <form method="POST" action="{{ isset($hdsecondarycategory) ? route('hdsecondarycategories.update', $hdsecondarycategory) : route('hdsecondarycategories.store') }}" class="bg-white p-6 rounded shadow">
            @csrf
            @if(isset($hdsecondarycategory))
                @method('PUT')
            @endif
            <div class="mb-4">
                <x-input-label for="secondarycatname[hu]" value="Magyar" />
                <x-text-input name="secondarycatname[hu]" :value="$hdsecondarycategory->secondarycatname['hu'] ?? ''" />
            </div>
            
            <div class="mb-4">
                <x-input-label for="secondarycatname[en]" value="English" />
                <x-text-input name="secondarycatname[en]" :value="$hdsecondarycategory->secondarycatname['en'] ?? ''" />
            </div>

            <div class="mb-4">
                <x-input-label for="secondarycatname[de]" value="Deutsch" />
                <x-text-input name="secondarycatname[de]" :value="$hdsecondarycategory->secondarycatname['de'] ?? ''" />
            </div>
            
            <x-primary-button>
                {{ __('messages.save') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
