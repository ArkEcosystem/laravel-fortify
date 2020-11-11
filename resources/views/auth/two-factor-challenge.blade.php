@extends('layouts.app')

@section('title')
    <x-data-bag key="fortify-content" resolver="path" view="page-title" />
@endsection

@section('breadcrumbs')
    <x-breadcrumbs :crumbs="[
        ['route' => 'login', 'label' => trans('fortify::menu.sign_in')],
        ['label' => trans('fortify::menu.2fa')],
    ]" />
@endsection

@section('content')
    <div class="container mx-auto" x-data="{ recovery: false }">
        <div class="mx-auto my-8 md:w-3/4 lg:w-3/5 xl:w-1/2">
            <h1 class="mx-4 text-2xl font-bold md:text-4xl md:mx-8 xl:mx-16">@lang('fortify::auth.two-factor.page_header')</h1>

            <div class="mt-5 lg:mt-8">
                <form
                    method="POST"
                    action="{{ route('two-factor.login') }}"
                    class="flex flex-col p-8 mx-4 border rounded-lg border-theme-secondary-200 md:mx-0 lg:p-8 xl:mx-8"
                >
                    @csrf

                    <div class="mb-4" x-show="! recovery">
                        <div class="flex flex-1">
                            <x-ark-input
                                type="password"
                                name="code"
                                :label="trans('fortify::forms.code')"
                                class="w-full"
                                :errors="$errors"
                            />
                        </div>
                    </div>

                    <div class="mb-4" x-show="recovery">
                        <div class="flex flex-1">
                            <x-ark-input
                                type="password"
                                name="recovery_code"
                                :label="trans('fortify::forms.recovery_code')"
                                class="w-full"
                                :errors="$errors"
                            />
                        </div>
                    </div>

                    <div class="flex justify-between mt-4">
                        <div class="flex-1 m-auto">
                            <button
                                type="button"
                                class="text-sm text-gray-600 underline cursor-pointer hover:text-gray-900"
                                x-show="! recovery"
                                x-on:click="
                                    recovery = true;
                                    $nextTick(() => { $refs.recovery_code.focus() })
                                ">
                                {{ trans('fortify::actions.use_recovery_code') }}
                            </button>

                            <button type="button" class="text-sm text-gray-600 underline cursor-pointer hover:text-gray-900"
                                            x-show="recovery"
                                            x-on:click="
                                                recovery = false;
                                                $nextTick(() => { $refs.code.focus() })
                                            ">
                                {{ trans('fortify::actions.use_authentication_code') }}
                            </button>
                        </div>

                        <button type="submit" class="w-full button-primary md:w-auto">
                            @lang('fortify::actions.verify')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
