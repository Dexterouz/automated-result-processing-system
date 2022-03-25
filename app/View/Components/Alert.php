<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    /** Alert Type */
    public $type;

    /** Alert Color */
    public $color;

    /** Alert Icon */
    public $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type)
    {
        $this->type = $type;

        switch ($this->type) {
            case 'success':
                $this->color = "success";
                $this->icon = "check-circle";
                break;

            case 'error':
                $this->color = "danger";
                $this->icon = "times-circle";
                break;

            default:
                $this->color = "";
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
