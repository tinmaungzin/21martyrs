<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavLink extends Component
{
    public $url;
    public $text;
    /**
     * @var array
     */
    public $possible_urls;

    /**
     * Create a new component instance.
     *
     * @param $url
     * @param $text
     * @param string $possibleUrls
     */
    public function __construct($url, $text, $possibleUrls = "")
    {
        //
        $possible_urls_arr = explode(",", $possibleUrls);
        array_push($possible_urls_arr, $url);
        $this->url = $url;
        $this->text = $text;
        $this->possible_urls = $possible_urls_arr;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav-link');
    }
}
