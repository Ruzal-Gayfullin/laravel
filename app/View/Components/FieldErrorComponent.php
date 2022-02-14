<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FieldErrorComponent extends Component
{
    public $field;
    public $message;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($field,$message)
    {
        $this->field = $field;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.field-error');
    }
}
