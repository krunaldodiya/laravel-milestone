<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class Status extends AbstractAction
{
    public function getTitle()
    {
        return 'Reset Device';
    }

    public function getIcon()
    {
        return 'voyager-phone';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-danger',
        ];
    }

    public function getDefaultRoute()
    {
        return route('reset.device', ['id' => $this->data->id]);
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'users';
    }
}
