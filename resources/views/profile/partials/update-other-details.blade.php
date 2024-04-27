<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Other Details') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.updatePhoneAndAddress') }}" class="mt-6 space-y-6">

        @csrf
        @method('patch')

        <div>
            <x-input-label for="phone_no" :value="__('phone_no')" />
            <x-text-input id="phone_no" name="phone_no" type="text" class="mt-1 block w-full" :value="old('phone_no', $user->phone_no)" required autofocus autocomplete="phone_no" />
            <x-input-error class="mt-2" :messages="$errors->get('phone_no')" />
        </div>

        <div>
            <x-input-label for="address" :value="__('address')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address)" required autofocus autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>