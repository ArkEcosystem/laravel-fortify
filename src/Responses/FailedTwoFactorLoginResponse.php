<?php

namespace ARKEcosystem\Fortify\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Validation\ValidationException;

class FailedTwoFactorLoginResponse implements Responsable
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $message = trans('fortify::messages.invalid_2fa_authentication_code');

        if ($request->wantsJson()) {
            throw ValidationException::withMessages([
                'code' => [$message],
            ]);
        }

        $request->session()->put([
            'login.id' => $request->session()->get('login.idFailure'),
        ]);

        return back()->withErrors(['code' => $message]);
    }
}
