
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-l">
            {{ __('bd.basic_datas') }}
            / 
            <a href="{{ route('therapycategories.index') }}" class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                {{ __('bd.therapycategories') }}
            </a>
            / 
            {{ __('messages.edit') }}
        </h2>
    </x-slot>
    <div class="py-6 max-w-xl mx-auto">
        <form method="POST" action="{{ isset($therapycategory) ? route('therapycategories.update', $therapycategory) : route('therapycategories.store') }}" class="bg-white p-6 rounded shadow">
            @csrf
            @if(isset($therapycategory))
                @method('PUT')
            @endif
            <div class="mb-4">
                <x-input-label for="therapycatname[hu]" value="Magyar" />
                <x-text-input name="therapycatname[hu]" :value="$therapycategory->therapycat['hu'] ?? ''" />
            </div>
            
            <div class="mb-4">
                <x-input-label for="therapycatname[en]" value="English" />
                <x-text-input name="therapycatname[en]" :value="$therapycategory->therapycat['en'] ?? ''" />
            </div>

            <div class="mb-4">
                <x-input-label for="therapycatname[de]" value="Deutsch" />
                <x-text-input name="therapycatname[de]" :value="$therapycategory->therapycat['de'] ?? ''" />
            </div>
            
            <x-primary-button>
                {{ __('messages.save') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
