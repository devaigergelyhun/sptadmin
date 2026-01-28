<x-app-layout>
    <x-slot name="header">
        <h2 class="text-l">
            {{ __('messages.crm') }} / 
            <a href="{{ route('partners.index') }}" class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                {{ __('messages.partners') }} 
            </a>
            / {{ __('messages.edit') }}
        </h2>
    </x-slot>
    
    <div class="py-6 max-w-xl mx-auto">
        <form method="POST" action="{{ isset($partner) ? route('partners.update', $partner) : route('partners.store') }}" class="bg-white p-6 rounded shadow">
            @csrf
            @if(isset($partner))
                @method('PUT')
            @endif
            
            <div class="mb-4">
                <x-input-label for="partnername" value="{{ __('messages.partnernev') }}" />
                <x-text-input name="partnername" :value="$partner->partnername ?? ''" />
            </div>
            
            <div class="mb-4">
                <x-input-label for="country" value="{{ __('messages.country') }}" />
                <x-text-input name="country" :value="$partner->country ?? ''" />
            </div>
            
            <div class="mb-4">
                <x-input-label for="deflang" value="{{ __('messages.deflang') }}" />
                <x-text-input name="deflang" :value="$partner->deflang ?? ''" />
            </div>
            
            <div class="mb-4">
                <!-- <x-input-label value="{{__('messages.active')}}" /> -->
                <div class="flex gap-6 mt-1">
                    <label class="flex items-center gap-4">
                        <input type="checkbox" name="active" value="1" {{ $partner->active == 1 ? 'checked' : '' }}>
                        {{__('messages.active')}}
                    </label>
                </div>
            </div>
            
            <x-primary-button>
                {{ __('messages.save') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
