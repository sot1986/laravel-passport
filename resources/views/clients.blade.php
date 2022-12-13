<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-clients-table :clients="$clients">
            </x-clients-table>

            <div class="mt-3 p-6 bg-white border-b border-gray-200">

                <form action="/oauth/clients" method="POST">
                    <div class="mt-3">
                        <x-input-label for="name">Name</x-input-label>
                        <x-text-input id="name" name="name" type="text"></x-text-input>
                    </div>

                    <div class="mt-3">
                        <x-input-label for="redirect">Redirect Url</x-input-label>
                        <x-text-input id="redirect" name="redirect" type="text"
                            placeholder="http://redirect-url.it">
                        </x-text-input>
                    </div>

                    <div class="mt-2">
                        @csrf
                        <x-primary-button type="submit">Create Client</x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
