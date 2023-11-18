<?php
class TacGia
{
    public $id;
    public $name;
    public $soluong;
    public $trang_thai;
    public function __construct($id, $name, $soluong, $trang_thai)
    {
        $this->id = $id;
        $this->name = $name;
        $this->soluong = $soluong;
        $this->trang_thai = $trang_thai;
    }
}
