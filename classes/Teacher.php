<?php
include "Main.php";

class Teacher extends Main {
    private $name;
    private $dep;
    private $age;
    protected $table = "tbl_teacher";

    // Insert Data
    public function setName($name){
        $this->name = $name;
    }
    public function setDep($dep){
        $this->dep = $dep;
    }
    public function setAge($age){
        $this->age = $age;
    }
    public function insertData(){
        $sql = "INSERT INTO  $this->table(name, dep, age) VALUES (:name, :dep, :age)";
        $stmt = DB::getPrepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':dep', $this->dep);
        $stmt->bindParam(':age', $this->age);
        return $stmt->execute();
    }

    // Update Data
    public function updateData($id){
        $sql = "UPDATE $this->table SET name=:name, dep=:dep, age=:age WHERE id=:id";
        $stmt = DB::getPrepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':dep', $this->dep);
        $stmt->bindParam(':age', $this->age);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}