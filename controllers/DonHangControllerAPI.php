<?php
include_once('../../DAO/DonHangDAOAPI.php');
class DonHangControllerAPI
{
    public function showUser($id)
    {
        $DonHangDAOAPI = new DonHangDAOAPI();
        $a = $DonHangDAOAPI->showUser($id);
        return $a;
    }
}
