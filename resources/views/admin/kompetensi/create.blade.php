<x-modal name="create-kompetensi" :show="$errors->kompetensiDeletion->isNotEmpty()" focusable>
    <form method="POST" action="{{ route('kompetensi.store')}}" class="p-6">
        @csrf
        <h2 class="text-lg font-medium text-gray-900">Add New Kompetensi</h2>

        <div class="mt-6">
            <x-input-label for="kompetensi_kelas" :value="__('Kompetensi Kelas')" />
            <x-text-input id="kompetensi_kelas" name="kompetensi_kelas" type="text" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->get('kompetensi_kelas')" class="mt-2" />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="ml-3">
                {{ __('Create Kompetensi') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>