@if (session('success') || session('error') || session('warning'))
    <div 
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        x-transition
        class="fixed top-5 right-5 z-50 space-y-2"
    >
        @if (session('success'))
            <div class="flex items-center bg-green-600 text-white px-4 py-3 rounded-lg shadow-lg">
                <span class="mr-2"> </span>
                <span class="flex-1">{{ session('success') }}</span>
                <button @click="show = false" class="ml-3 text-white/80 hover:text-white">✕</button>
            </div>
        @endif

        @if (session('error'))
            <div class="flex items-center bg-red-600 text-white px-4 py-3 rounded-lg shadow-lg">
                <span class="mr-2"></span>
                <span class="flex-1">{{ session('error') }}</span>
                <button @click="show = false" class="ml-3 text-white/80 hover:text-white">✕</button>
            </div>
        @endif

        @if (session('warning'))
            <div class="flex items-center bg-yellow-500 text-white px-4 py-3 rounded-lg shadow-lg">
                <span class="mr-2">️</span>
                <span class="flex-1">{{ session('warning') }}</span>
                <button @click="show = false" class="ml-3 text-white/80 hover:text-white"></button>
            </div>
        @endif
    </div>
@endif