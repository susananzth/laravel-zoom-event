<x-modal title="{{ __('Create new user') }}" wire:model="addUser" focusable>
    <form class="mt-6 space-y-6" method="POST">
        @csrf
        <x-validation-errors/>
        <p class="italic text-sm text-red-700 m-0">
            {{ __('Fields marked with * are required') }}
        </p>

        <div>
            <x-input-label for="first_name">{{ __('First name') }} *</x-input-label>
            <x-text-input id="first_name" class="block mt-1 w-full" type="text"
                name="first_name" :value="old('first_name')" wire:model="first_name"
                autocomplete="first_name" maxlength="150" required autofocus />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="last_name">{{ __('Last name') }} *</x-input-label>
            <x-text-input id="last_name" class="block mt-1 w-full" type="text"
                name="last_name" :value="old('last_name')" wire:model="last_name"
                autocomplete="last_name" maxlength="150" required />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="document_type_id">{{ __('Document number') }} *</x-input-label>
            <x-select-input id="document_type_id" class="block mt-1 w-full" 
                name="document_type_id" wire:model="document_type_id"
                autocomplete="document_type_id" required>
                <option value="">{{ __('Please select') }}</option>
                @foreach ($documents as $item)
                    @if (old('document_type_id') == $item->id)
                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                    @else
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @endforeach
            </x-select-input>
            <x-input-error :messages="$errors->get('document_type_id')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="document_number">{{ __('Document number') }} *</x-input-label>
            <x-text-input id="document_number" class="block mt-1 w-full" type="text"
                name="document_number" :value="old('document_number')" wire:model="document_number"
                autocomplete="document_number" maxlength="50" required />
            <x-input-error :messages="$errors->get('document_number')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="phone">{{ __('Phone') }} *</x-input-label>
            <x-text-input id="phone" class="block mt-1 w-full" type="text"
                name="phone" :value="old('phone')" wire:model="phone"
                autocomplete="phone" maxlength="50" required />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email">{{ __('Email') }} *</x-input-label>
            <x-text-input id="email" class="block mt-1 w-full" type="email"
                name="email" :value="old('email')" wire:model="email"
                autocomplete="email" maxlength="255" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password">{{ __('Password') }} *</x-input-label>
            <x-text-input id="password" class="block mt-1 w-full"
                type="password" name="password" wire:model="password"
                autocomplete="new-password" maxlength="255" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation">{{ __('Confirm Password') }} *</x-input-label>
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
               type="password" name="password_confirmation" wire:model="password_confirmation"
               autocomplete="new-password" maxlength="255" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex justify-end gap-4">
            <x-primary-button type="button" wire:click.prevent="store()">
                <i class="fa-solid fa-save me-1"></i>{{ __('Save') }}
            </x-primary-button>
            <x-secondary-button wire:click.prevent="cancel()">
                <i class="fa-solid fa-ban me-1"></i>{{ __('Cancel') }}
            </x-secondary-button>
        </div>
    </form>
</x-modal>