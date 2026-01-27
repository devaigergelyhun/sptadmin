<x-app-layout>
    <x-slot name="header">
        <h2 class="text-l">
            {{ __('bd.basic_datas') }} / {{ __('bd.therapies') }}
            | 
            <a href="{{ route('therapies.create') }}"
               class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                + {{ __('bd.new_therapy') }}
            </a>
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">

        {{-- Keresés --}}
        <form method="GET" class="mb-4 flex gap-2">
            <input type="text" name="therapyname" value="{{ request('therapyname') }}"
                   placeholder="{{ __('bd.name_of_theraphy') }}"
                   class="border px-2 py-1 rounded w-64">
            <button class="px-3 py-1 bg-gray-800 text-white rounded">{{ __('messages.search') }}</button>
        </form>

        <table class="w-full border bg-white rounded shadow">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2">{{ __('bd.therapy') }}</th>
                    <th class="p-2">ID</th>
                    <th class="p-2">{{ __('bd.pressure') }}</th>
                    <th class="p-2">{{ __('bd.temp') }}</th>
                    <th class="p-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($therapies as $t)
                    <tr class="border-t">
                        <td class="p-2">{{ $t->name }}</td>
                        <td class="p-2">{{ $t->ptid }}</td>
                        <td class="p-2">{{ $t->pressure }}</td>
                        <td class="p-2">{{ $t->temperature }}</td>
                        <td class="p-2">
                            <a href="{{ route('therapies.edit', $t) }}"
                               class="px-2 py-1 rounded text-l font-medium bg-gray-200 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                                {{ __('messages.edit') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $therapies->links() }}
        </div>
    </div>
</x-app-layout>