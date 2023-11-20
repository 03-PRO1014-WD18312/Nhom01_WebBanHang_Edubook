<?php

include_once "../controllers/GioHangAPIController.php";
$add_card = new GioHangControllerAPI();
// Nhận dữ liệu từ front-end
$data = json_decode(file_get_contents("php://input"));
$add_card->index($data->id);
