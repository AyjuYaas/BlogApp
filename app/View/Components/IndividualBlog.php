<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class IndividualBlog extends Component {
    public $title;
    public $body;
    public $id;
    public function __construct($title, $body, $id) {
        $this->title = $title;
        $this->body = substr($body, 0, 200);
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('Blog.components.individual-blog');
    }
}
