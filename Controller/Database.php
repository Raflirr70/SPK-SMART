<?php
class database{
    public $mysqli;
    public function __construct(){
        $this->mysqli = new mysqli("localhost", "root","","spk");

    }
    public function __destruct(){
        $this->mysqli->close();
    }
    
    public function Select($table){
        $sql = "SELECT * FROM ".$table;
        $result = $this->mysqli->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function insert($table, $rows)
    {
        $sql = "INSERT INTO $table";
        $row = null;
        $value = null;

        foreach ($rows as $key => $nilai) {
            $row .= ",".$key;
            $value .= ",'".$nilai."'";
        }

        $sql .= "(". substr($row, 1) .")";
        $sql .= " VALUES (". substr($value, 1) .")";

        $query = $this->mysqli->prepare($sql);
        $query->execute();
    }

    function delete($id){
        $sql2 = "DELETE FROM kriteria WHERE id_laptop = $id";
        $result = $this->mysqli->query($sql2);
        $sql1 = "DELETE FROM laptop WHERE id = $id";
        $result = $this->mysqli->query($sql1);
    }

    function deleteHasil(){
        $sql = "DELETE FROM hasil";
        $this->mysqli->query($sql);
    }
}