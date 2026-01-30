
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-l">
            {{ __('messages.crm') }} / 
            <a href="{{ route('partnerusers.index') }}" class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                {{ __('messages.partnerusers') }} 
            </a>
            / {{ __('messages.edit') }}: {{ $partneruser->name }} / {{ __('messages.partner') }}: 
            <a href="{{ route('partners.edit', $partneruser->partner) }}" class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                {{ $partneruser->partner->partnername }}
            </a>
            
        </h2>
    </x-slot>
    
    <div class="py-6 max-w-xl mx-auto">
        <form method="POST" action="{{ isset($partneruser) ? route('partnerusers.update', $partneruser) : route('partnerusers.store') }}" class="bg-white p-6 rounded shadow">
            @csrf
            @if(isset($partneruser))
                @method('PUT')
            @endif
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
                {{-- partnerid --}}
                <div>
                    <x-input-label value="{{__('messages.partnername')}}" />
                    <select name="partnerid"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">...{{__('messages.choose_one')}}</option>
                        @foreach($partners as $id => $partnername)
                            <option value="{{ $id }}" @selected($partneruser->partnerid == $id)>
                                {{ $partnername }}
                            </option>
                        @endforeach
                    </select>
                    @error('partnername') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
                
                {{-- name --}}
                <div>
                    <x-input-label value="{{__('messages.name') }}" />
                    <x-text-input name="name" class="w-full" :value="$partneruser->name" />
                    @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="flex items-center gap-4">
                        <input type="checkbox" name="isadmin" :value="1" {{ ($partneruser->isadmin) ? 'checked' : '' }}>
                        {{__('messages.admin')}}?
                    </label>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="flex items-center gap-4">
                        <input type="checkbox" name="issystemadmin" :value="1" {{ ($partneruser->issystemadmin) ? 'checked' : '' }}>
                        {{__('messages.systemadmin')}}?
                    </label>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-input-label value="{{__('messages.loginname') }}" />
                    <x-text-input name="loginname" class="w-full" :value="$partneruser->loginname" />
                    @error('loginname') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-input-label value="{{__('messages.email') }}" />
                    <x-text-input name="email" class="w-full" :value="$partneruser->email" />
                    @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
            </div>            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="flex items-center gap-4">
                        <input type="checkbox" name="isactive" value="1" {{ $partneruser->isactive ? 'checked' : '' }}>
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
