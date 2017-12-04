<?php
namespace core;

class View {
    public $data = [];

    /**
     * connect view pattern
     * @param $filename
     * @param $data
     */
    public function render($filename, $data = null){
        $this->data = $data;
        require_once 'views/'.$filename.".php";
    }
}