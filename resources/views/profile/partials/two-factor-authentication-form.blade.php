<div>
    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Two-Factor Authentication') }}</h3>
    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ __('Manage two-factor authentication for your account.') }}</p>

    <div class="mt-4 space-x-2">
        <form method="POST" action="/user/two-factor-authentication" class="inline">
            @csrf
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white">{{ __('Enable 2FA') }}</button>
        </form>

        <form method="POST" action="/user/two-factor-authentication" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white">{{ __('Disable 2FA') }}</button>
        </form>
    </div>
</div>
