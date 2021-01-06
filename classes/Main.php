<?php
include "DB.php";
abstract class Main{
    protected $table;
    abstract public function insertData();
    abstract public function updateData($id);

    // ReadById Data
    public function readById($id){
        $sql = "SELECT * FROM $this->table WHERE id=:id";
        $stmt = DB::getPrepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    // Read Data
    public function readAll(){
        $sql = "SELECT * FROM $this->table";
        $stmt = DB::getPrepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Delete Data
    public function deleteData($id){
        $sql = "DELETE FROM $this->table WHERE id=:id";
        $stmt = DB::getPrepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
