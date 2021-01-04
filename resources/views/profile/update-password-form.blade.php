<div x-data="{isTyping: false}">
    <div class="flex flex-col space-y-4">
        <div>
            <x-ark-alert type="warning" :message="trans('fortify::pages.user-settings.update_password_alert_description')" />
        </div>
        <div>
            <x-ark-flash />
        </div>
        <span class="header-4">@lang('fortify::pages.user-settings.password_information_title')</span>
        <span>@lang('fortify::forms.update-password.requirements_notice')</span>
    </div>
    <form class="mt-8" wire:submit.prevent="updatePassword">
        <div class="space-y-4">
            <x-ark-input type="password" name="current_password" model="state.current_password" :label="trans('fortify::forms.current_password')" :errors="$errors" />

            <x:ark-fortify::password-rules class="w-full" :password-rules="$passwordRules" is-typing="isTyping" rules-wrapper-class="grid gap-4 my-4 sm:grid-cols-2 lg:grid-cols-3">
                <x-ark-input type="password" name="password" model="state.password" class="w-full" :label="trans('fortify::forms.new_password')" @keydown="isTyping=true" :errors="$errors" />
            </x:ark-fortify::password-rules>

            <x-ark-input type="password" name="password_confirmation" model="state.password_confirmation" :label="trans('fortify::forms.confirm_password')" :errors="$errors" />
        </div>
        <div class="flex w-full mt-8 sm:justify-end">
            <button type="submit" class="w-full button-secondary sm:w-auto">@lang('fortify::actions.update')</button>
        </div>
    </form>
</div>
