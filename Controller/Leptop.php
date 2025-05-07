<?php
require_once "Database.php";
class leptop{
    private $db;
    public function __construct(){
        $this->db = new database();   
    }
    function getLeptop(){
        return $this->db->Select("laptop");
    }
    function tambahLeptop($datas){
        $this->db->insert("laptop",$datas);
    }
    function deleteLeptop($id){
        $this->db->delete($id);
    }
}