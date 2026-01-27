<x-app-layout>
    <x-slot name="header">
        <h2 class="text-l">
            {{ __('bd.basic_datas') }} / {{ __('bd.therapycategories') }} 
            <a href="{{ route('therapycategories.create') }}" class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                + {{ __('messages.new') }}
            </a>
        </h2>
    </x-slot>    

    <div class="p-6">
        <table class="min-w-full border bg-white p-6 rounded shadow">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2">#</th>
                    <th class="p-2">{{ __('bd.therapycategory') }}</th>
                    <th class="p-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($therapycategories as $cat)
                    <tr class="border-t">
                        <td class="p-2">{{ $cat->id }}</td>
                        <td class="p-2">{{ $cat->therapycatname }}</td>
                        <td class="p-2">
                            <a href="{{ route('therapycategories.edit', $cat) }}"class_x="text-indigo-600"
                               class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                                {{ __('messages.view') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>    
        </table>
    </div>        
</x-app-layout>
