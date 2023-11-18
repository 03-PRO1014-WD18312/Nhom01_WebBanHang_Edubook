<?php
class TaiKhoan
{
    public $id;
    public $name;
    public $email;
    public $quyen;
    public $trang_thai;
    public function __construct($id, $name, $email, $quyen, $trang_thai)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->quyen = $quyen;
        $this->trang_thai = $trang_thai;
    }
}
class role
{
    public $id;
    public $name;
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}
