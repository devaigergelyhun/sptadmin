<div class="py-6 max-w-xl mx-auto">
    <h3 class="text-l">
        <a href="{{ route('partnerusers.create') }}" class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
            {{ __('messages.therapy_add') }}
        </a>
    </h3>

    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Terápia</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ár</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($partner->partnertherapies as $therapy)
                <tr>
                    <td class="px-6 py-4">{{ $therapy->partner_id }}</td>
                    <td class="px-6 py-4">{{ $therapy->therapy_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>