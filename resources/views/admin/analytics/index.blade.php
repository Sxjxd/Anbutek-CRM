<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold leading-tight">
            Analytics
        </h1>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('admin.analytics')

        </div>
    </div>
</x-app-layout>
