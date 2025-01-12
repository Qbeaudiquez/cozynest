<?php

class Tag{
    private $db;
    private $id;
    private $name;

    public function __construct($db,$id = null,$name){
        $this->db = $db;
        $this->id = $id;
        $this->name = $name;
    }
    public function save(){
        if($this->id){
            $statement = $this->db->prepare("UPDATE tags SET name = ? WHERE id = ?");
            $statement->execute([$this->name, $this->id]);
        }else{
            $statement = $this->db->prepare("INSERT INTO tags (name) VALUES (?)");
            $statement->execute([$this->name]);
            $this->id = $this->db->lastInsertId();
        }
    }
    public function getId(){return $this->id;}
    public function getName(){return $this->name;}
}