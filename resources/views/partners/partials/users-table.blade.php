<div class="py-6 max-w-xl mx-auto">
    <h3 class="text-l">
        <a href="{{ route('partners.users.create', $partner) }}"
           class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
            {{ __('messages.new_user') }}
        </a>
    </h3>

    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 ">{{ __('messages.name') }}</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 ">{{ __('messages.email') }}</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 "></th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($partner->partnerusers as $user)
                <tr>
                    <td class="px-6 py-4">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4 text-right">
                         <a href="{{ route('partnerusers.edit', $user) }}"class_x="text-indigo-600"
                            class="px-2 py-1 rounded text-l font-medium bg-gray-100 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                            {{ __('messages.view') }}
                         </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>