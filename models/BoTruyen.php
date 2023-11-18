<?php 
class BoTruyen
{
    public $id;
    public $img;
    public $ten;
    public $trang_thai;
    public $soluong;
    public function __construct($id,$ten, $trang_thai,$soluong,$img){
        $this->id = $id;
        $this->ten=$ten;
        $this->trang_thai=$trang_thai;
        $this -> soluong = $soluong;
        $this -> img = $img;
    }
}