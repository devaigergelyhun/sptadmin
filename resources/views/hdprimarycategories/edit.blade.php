<x-app-layout>
    <x-slot name="header">
        <h2 class="text-l">
            {{ __('bd.basic_datas') }}
            / 
            <a href="{{ route('hdprimarycategories.index') }}" class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                {{ __('bd.Hdprimarycategories') }}
            </a>
            / 
            {{ __('messages.edit') }}
        </h2>
    </x-slot>
    <div class="py-6 max-w-xl mx-auto">
        <form method="POST" action="{{ isset($hdprimarycategory) ? route('hdprimarycategories.update', $hdprimarycategory) : route('hdprimarycategories.store') }}" class="bg-white p-6 rounded shadow">
            @csrf
            @if(isset($hdprimarycategory))
                @method('PUT')
            @endif
            <div class="mb-4">
                <x-input-label for="primarycatname[hu]" value="Magyar" />
                <x-text-input name="primarycatname[hu]" :value="$hdprimarycategory->primarycatname['hu'] ?? ''" />
            </div>
            
            <div class="mb-4">
                <x-input-label for="primarycatname[en]" value="English" />
                <x-text-input name="primarycatname[en]" :value="$hdprimarycategory->primarycatname['en'] ?? ''" />
            </div>

            <div class="mb-4">
                <x-input-label for="primarycatname[de]" value="Deutsch" />
                <x-text-input name="primarycatname[de]" :value="$hdprimarycategory->primarycatname['de'] ?? ''" />
            </div>
            
            <x-primary-button>
                {{ __('messages.save') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
