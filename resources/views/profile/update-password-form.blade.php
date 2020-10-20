<div>
    <div class="flex flex-col">
        <span class="text-2xl font-semibold text-theme-secondary-900">@lang('fortify::pages.user-settings.password_information_title')</span>
        <span>@lang('fortify::forms.update_password.requirements_notice')</span>

        <form class="mt-8" wire:submit.prevent="updatePassword">
            <div class="space-y-4">
                <x-ark-input type="password" name="currentPassword" model="state.current_password" :label="trans('fortify::forms.current_password')" :errors="$errors" />
                
                <x-auth.password-rules :password-rules="$passwordRules" class="w-full">
                    <x-ark-input type="password" name="password" model="state.password" class="w-full" :label="trans('fortify::forms.new_password')" :errors="$errors" />
                </x-auth.password-rules>

                <x-ark-input type="password" name="passwordConfirmation" model="state.password_confirmation" :label="trans('fortify::forms.confirm_password')" :errors="$errors" />
            </div>
            <div class="flex justify-end mt-8">
                <button type="submit" class="button-secondary">@lang('fortify::actions.update')</button>
            </div>
        </form>
    </div>
</div>
