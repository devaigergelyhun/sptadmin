<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            {{ __('bd.basic_datas') }} / 
            <a href="{{ route('therapies.index') }}" class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                {{ __('bd.therapies') }}
            </a>
             /             
            {{ __('messages.new') }}        
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto" class_old="py-6 max-w-4xl mx-auto">

        <form method="POST" action="{{ route('therapies.store') }}" class="bg-white p-6 rounded shadow space-y-4">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                
                {{-- PT ID --}}
                <div>
                    <x-input-label value="PT ID" />
                    <x-text-input name="ptid" class="w-full" value="{{ old('ptid') }}" />
                    @error('ptid') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Therapy category --}}
                <div>
                    <x-input-label value="{{__('bd.therapycategory')}}" />
                    <select name="therapycategoryid"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">...{{__('messages.choose_one')}}</option>
                        @foreach($therapycategories as $id => $therapycatname)
                            <option value="{{ $id }}" @selected(old('therapycategoryid') == $id)>
                                {{ $therapycatname }}
                            </option>
                        @endforeach
                    </select>
                    @error('therapycategoryid') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>   
            </div>

            {{-- Therapy name --}}
            <div>
                <x-input-label value="{{__('bd.name_of_theraphy')}}" />
                <div class="border rounded-md p-3 space-y-2">

                    <div>
                        <label class="text-sm">HU</label>
                        <input type="text" name="therapyname[hu]"
                               class="w-full border rounded px-2 py-1"
                               value="{{ old('therapyname.hu') }}">
                    </div>

                    <div>
                        <label class="text-sm">EN</label>
                        <input type="text" name="therapyname[en]"
                               class="w-full border rounded px-2 py-1"
                               value="{{ old('therapyname.en') }}">
                    </div>

                    <div>
                        <label class="text-sm">DE</label>
                        <input type="text" name="therapyname[de]"
                               class="w-full border rounded px-2 py-1"
                               value="{{ old('therapyname.de') }}">
                    </div>

                </div>
                @error('therapyname') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            {{-- Primary category --}}
            <div>
                <x-input-label value="{{__('bd.Hdprimarycategory')}}" />
                <select name="hdprimarycategoryid"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">...{{__('messages.choose_one')}}</option>
                    @foreach($primaryCategories as $id => $pricatname)
                        <option value="{{ $id }}" @selected(old('hdprimarycategoryid') == $id)>
                            {{ $pricatname }}
                        </option>
                    @endforeach
                </select>
                @error('hdprimarycategoryid') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            {{-- Secondary category --}}
            <div>
                <x-input-label value="{{__('bd.hdsecondarycategory')}}" />
                <select name="hdsecondarycategoryid"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">...{{__('messages.choose_one')}}</option>
                    @foreach($secondarycategories as $id => $seccatname)
                        <option value="{{ $id }}" @selected(old('hdsecondarycategoryid') == $id)>
                            {{ $seccatname }}
                        </option>
                    @endforeach
                </select>
                @error('hdsecondarycategoryid') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

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

            {{-- Buttons --}}
            <div class="flex gap-3">
                <x-primary-button>{{__('messages.save')}}</x-primary-button>
            </div>

        </form>
    </div>
</x-app-layout>