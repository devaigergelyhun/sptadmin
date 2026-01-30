<x-app-layout>
    <x-slot name="header">
        <h2 class="text-l">
            {{ __('messages.crm') }} 
            / {{ __('messages.partner') }}: 
            <a href="{{ route('partners.edit', $partner) }}" class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">                
                {{ $partner->partnername }}
            </a>    
             / {{ __('messages.new') }} {{ strtolower(__('messages.create_user')) }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto" class_old="py-6 max-w-4xl mx-auto">

        <form method="POST" action="{{ route('partners.users.store', $partner) }}" class="bg-white p-6 rounded shadow space-y-4">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- partnerid --}}
                <div>
                    <x-input-label value="{{__('messages.partnername')}}" />
                    <select name="partnerid"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">...{{__('messages.choose_one')}}</option>
                        @foreach($partners as $id => $partnername)
                            <option value="{{ $id }}" @selected( ($partner->id == $id) )>
                                {{ $partnername }}
                            </option>
                        @endforeach
                    </select>
                    @error('partnername') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
                
                {{-- name --}}
                <div>
                    <x-input-label value="{{__('messages.name') }}" />
                    <x-text-input name="name" class="w-full" value="{{ old('name') }}" />
                    @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="flex items-center gap-4">
                        <input type="checkbox" name="isadmin" value="0" {{ old('isadmin') ? 'checked' : '' }}>
                        {{__('messages.admin')}}?
                    </label>
                </div>
            </div>
            
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="flex items-center gap-4">
                        <input type="checkbox" name="issystemadmin" value="0" {{ old('issystemadmin') ? 'checked' : '' }}>
                        {{__('messages.systemadmin')}}?
                    </label>
                </div>
            </div>
            
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-input-label value="{{__('messages.loginname') }}" />
                    <x-text-input name="loginname" class="w-full" value="{{ old('loginname') }}" />
                    @error('loginname') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
            </div>
            
            <div class="mt-4">
                <x-input-label for="password" :value="__('messages.password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('messages.confirm_password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>            
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-input-label value="{{__('messages.email') }}" />
                    <x-text-input name="email" class="w-full" value="{{ old('email') }}" />
                    @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
            </div>            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="flex items-center gap-4">
                        <input type="checkbox" name="isactive" value="1" {{ old('isactive') ? 'checked' : '' }}>
                        {{__('messages.active')}}
                    </label>
                </div>
            </div>


            

<!--
            

            {{-- Pressure --}}
            <div>
                <x-input-label value="{{__('bd.pressure')}}" />
                <div class="flex gap-6 mt-1">
                    <label class="flex items-center gap-4">
                        <input type="checkbox" name="lowpressure" value="1" {{ old('lowpressure') ? 'checked' : '' }}>
                        {{__('bd.low')}}
                    </label>

                    <label class="flex items-center gap-4">
                        <input type="checkbox" name="midpressure" value="1" {{ old('midpressure') ? 'checked' : '' }}>
                        {{__('bd.middle')}}
                    </label>

                    <label class="flex items-center gap-4">
                        <input type="checkbox" name="highpressure" value="1" {{ old('highpressure') ? 'checked' : '' }}>
                        {{__('bd.high')}}
                    </label>                
                </div>
            </div>

            {{-- Temperature --}}
            <div>
                <x-input-label value="...{{__('bd.temprature')}} (°C)" />
                <x-text-input type="number" name="temperature" class="w-full" value="{{ old('temperature') }}" />
            </div>

            {{-- Time ranges --}}
            <div>
                <x-input-label value="{{__('bd.time_ranges')}}" />
                <div class="flex gap-6 mt-1">

                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="timerangeshort" value="1" {{ old('timerangeshort') ? 'checked' : '' }}>
                        {{__('bd.short')}}
                    </label>

                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="timerangemiddle" value="1" {{ old('timerangemiddle') ? 'checked' : '' }}>
                        {{__('bd.middle')}}
                    </label>

                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="timerangelong" value="1" {{ old('timerangelong') ? 'checked' : '' }}>
                        {{__('bd.long')}}
                    </label>

                </div>
            </div>

            {{-- Therapy info --}}
            <div>
                <x-input-label value="Therapy info" />
                <div class="border rounded-md p-3 space-y-2">

                    <div>
                        <label class="text-sm">HU</label>
                        <textarea name="therapyinfo[hu]" rows="3"
                            class="w-full border rounded px-2 py-1">{{ old('therapyinfo.hu') }}</textarea>
                    </div>

                    <div>
                        <label class="text-sm">EN</label>
                        <textarea name="therapyinfo[en]" rows="3"
                            class="w-full border rounded px-2 py-1">{{ old('therapyinfo.en') }}</textarea>
                    </div>

                    <div>
                        <label class="text-sm">DE</label>
                        <textarea name="therapyinfo[de]" rows="3"
                            class="w-full border rounded px-2 py-1">{{ old('therapyinfo.de') }}</textarea>
                    </div>

                </div>                
            </div>
-->
            {{-- Buttons --}}
            <div class="flex gap-3">
                <x-primary-button>{{__('messages.save')}}</x-primary-button>
            </div>

        </form>
    </div>
</x-app-layout>
