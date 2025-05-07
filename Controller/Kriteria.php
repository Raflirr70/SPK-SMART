<?php
require_once "Database.php";
class kriteria{
    private $db;
    public function __construct(){
        $this->db = new database();   
    }
    function getkriteria(){
        return $this->db->Select("kriteria");
    }
    function tambahKriteria($datas){
        $this->db->insert("kriteria",$datas);
    }
}