<x-modal name="edit-user" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="POST" id="editUserForm" action="{{ route('users.update', $users->count() > 0 ? $user->id_user : '') }}" class="p-6">
        @csrf
        @method('PUT')
        <h2 class="text-lg font-medium text-gray-900">Edit User</h2>

        <div class="mt-6">
            <x-input-label for="edit_name" :value="__('Fullname')" />
            <x-text-input id="edit_name" name="name" type="text" class="mt-1 block w-full" required :value="old('name', $users->count() > 0 ? $user->name : '')" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div> 

        <div class="mt-6">
            <x-input-label for="edit_username" :value="__('Username')" />
            <x-text-input id="edit_username" name="username" type="text" class="mt-1 block w-full" required :value="old('username', $users->count() > 0 ? $user->username : '')" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>
 
        <div class="mt-6">
            <x-input-label for="edit_email" :value="__('Email')" />
            <x-text-input id="edit_email" name="email" type="email" class="mt-1 block w-full" required :value="old('email', $users->count() > 0 ? $user->email : '')" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="edit_password" :value="__('Password')" />
            <x-text-input id="edit_password" name="password" type="password" class="mt-1 block w-full" placeholder="Enter new password to change" />
            <span class="text-sm text-gray-600">Biarkan kosong untuk menyimpan password saat ini</span>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
 
        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="ml-3">
                {{ __('Update User') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>
