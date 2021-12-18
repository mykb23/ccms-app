<?php

namespace App\Http\Traits;

trait ModalTrait
{
    public $openModal = false;

    public function openModal()
    {
        $this->resetErrorBag();
        $this->openModal = true;
    }
}
