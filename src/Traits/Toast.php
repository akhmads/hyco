<?php

namespace Akhmads\Hyco\Traits;

trait Toast
{
    public function success($url, $message)
    {
        session()->flash('toast_message', $message);
        session()->flash('toast_type', 'success');
        $this->redirect($url, navigate: true);
    }
}
