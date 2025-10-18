<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="overflow-x-auto">
                    <livewire:add-script-tasks/>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script type="module">
            console.log(window.Echo);
            window.Echo.channel('ad-script-tasks')
                .listen('.AdScriptTaskUpdated', (e) => {
                    console.log(e);
                    Livewire.dispatch('refreshTasks');
                });
        </script>
    @endpush
</x-app-layout>
