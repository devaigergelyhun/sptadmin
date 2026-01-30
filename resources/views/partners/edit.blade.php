<x-app-layout>
    <x-slot name="header">
        <h2 class="text-l">
            {{ __('messages.crm') }} / 
            <a href="{{ route('partners.index') }}" class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                {{ __('messages.partners') }} 
            </a>
            / {{ __('messages.edit') }}: {{$partner->partnername ?? '' }}
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
                <x-input-error :messages="$errors->get('partnername')" class="mt-2" />
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
    
    <div class="py-6 max-w-xl mx-auto">
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <button
                    type="button"
                    class="tab-btn border-indigo-500 text-indigo-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                    data-tab="therapies"
                >
                    {{ __('bd.therapies') }}
                </button>                
                <button
                    type="button"
                    data-tab="users"
                    class="tab-btn border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                >
                    {{ __('messages.partnerusers') }}
                </button>
            </nav>
        </div>

        <div class="mt-6">
            
            <!-- THERAPIES TAB -->
            <div id="tab-therapies" class="tab-content">
                @include('partners.partials.therapies-table')
            </div>

            <!-- USERS TAB -->
            <div id="tab-users" class="tab-content hidden">
                @include('partners.partials.users-table')
            </div>
            
            
        </div>
    </div>
    
    
</x-app-layout>

<script>
document.querySelectorAll('.tab-btn').forEach(button => {
    button.addEventListener('click', () => {
        const tab = button.dataset.tab;

        // tab content hide/show
        document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden'));
        document.getElementById('tab-' + tab).classList.remove('hidden');

        // tab style
        document.querySelectorAll('.tab-btn').forEach(b => {
            b.classList.remove('border-indigo-500', 'text-indigo-600');
            b.classList.add('border-transparent', 'text-gray-500');
        });

        button.classList.add('border-indigo-500', 'text-indigo-600');
        button.classList.remove('border-transparent', 'text-gray-500');
    });
});
</script>