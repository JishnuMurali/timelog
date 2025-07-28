<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>
    <div class="creative-form-card">
        <h2 class="creative-form-title">Update Password</h2>
        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')
            <div>
                <x-input-label for="update_password_current_password" :value="__('Current Password')" class="creative-label" />
                <x-text-input id="update_password_current_password" name="current_password" type="password" class="creative-input" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="update_password_password" :value="__('New Password')" class="creative-label" />
                <x-text-input id="update_password_password" name="password" type="password" class="creative-input" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="creative-label" />
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="creative-input" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>
            <button type="submit" class="creative-btn mt-10">Save</button>
        </form>
    </div>
</section>
