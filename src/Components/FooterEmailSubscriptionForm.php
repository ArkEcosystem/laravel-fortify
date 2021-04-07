<?php

declare(strict_types=1);

namespace ARKEcosystem\Fortify\Components;

use ARKEcosystem\Fortify\Actions\SubscribeToNewsletter;
use Livewire\Component;

final class FooterEmailSubscriptionForm extends Component
{
    public bool $subscribed = false;

    public ?string $email = null;

    public ?string $status = null;

    public function subscribe()
    {
        $this->subscribe = false;
        $this->status    = null;

        $this->subscribed = SubscribeToNewsletter::execute($this->email, config('newsletter.defaultListName'));

        if ($this->subscribed) {
            $this->status = trans('fortify::messages.subscription.pending');
        } else {
            $this->status = trans('fortify::messages.subscription.duplicate');
        }

        $this->email = null;

        $this->status = null;
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('ark-fortify::newsletter.footer-subscription-form');
    }
}
