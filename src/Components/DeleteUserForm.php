<?php

declare(strict_types=1);

namespace ARKEcosystem\Fortify\Components;

use ARKEcosystem\Fortify\Contracts\DeleteUser;
use ARKEcosystem\UserInterface\Http\Livewire\Concerns\HasModal;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DeleteUserForm extends Component
{
    use HasModal;

    /**
     * Confirm that the user would like to delete their account.
     *
     * @return void
     */
    public function confirmUserDeletion()
    {
        $this->dispatchBrowserEvent('confirming-delete-user');

        $this->openModal();
    }

    /**
     * Delete the current user.
     *
     * @param \ARKEcosystem\Fortify\Contracts\DeleteUser $deleter
     * @param \Illuminate\Contracts\Auth\StatefulGuard   $auth
     *
     * @return void
     */
    public function deleteUser(DeleteUser $deleter, StatefulGuard $auth)
    {
        $deleter->delete(Auth::user()->fresh());

        $auth->logout();

        return redirect('/');
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('ark-fortify::profile.delete-user-form');
    }
}
