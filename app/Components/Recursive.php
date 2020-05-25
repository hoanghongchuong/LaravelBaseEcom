<?php
namespace App\Components;

class Recursive {
    private $data;
    private $htmlSelect = '';
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function recursive($id = 0, $text = '') {
        foreach($this->data as $cate) {
            if($cate->parent_id === $id) {
                $this->htmlSelect .= "<option>".$text.$cate->name."</option>";
                $this->recursive($cate->id, $text. '-');
            }
        }
        return $this->htmlSelect;
    }
}
