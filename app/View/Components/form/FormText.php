<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class FormText extends Component
{
    public $message;
    /**
     * @var mixed|string
     */
    public $type;

    /**
     * Create a new component instance.
     *
     * @param $message
     * @param string $type
     */
    public function __construct($message, $type = 'danger')
    {
        //
        $this->message = $message;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.form-text');
    }
}
