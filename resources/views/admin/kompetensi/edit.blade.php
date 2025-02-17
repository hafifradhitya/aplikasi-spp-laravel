<x-modal name="edit-kompetensi" :show="$errors->kompetensiDeletion->isNotEmpty()" focusable>
    <form method="POST" action="{{ route('kompetensi.update', $kompetensis->count() > 0 ? $kompetensi->id_kompetensi : '') }}" id="editKompetensiForm" class="p-6">
        @csrf
        @method('PUT')
        <h2 class="text-lg font-medium text-gray-900">Edit Kompetensi</h2>

        <div class="mt-6">
            <x-input-label for="edit_kompetensi_kelas" :value="__('Kompetensi Kelas')" />
            <x-text-input id="edit_kompetensi_kelas" name="kompetensi_kelas" type="text" class="mt-1 block w-full" required :value="old('kompetensi_kelas', $kompetensis->count() > 0 ? $kompetensi->kompetensi_kelas : '')" />
            <x-input-error :messages="$errors->get('kompetensi_kelas')" class="mt-2" />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }} 
            </x-secondary-button>
            <x-primary-button class="ml-3">
                {{ __('Update Kompetensi') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>
