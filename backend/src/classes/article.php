<?php

class Article{
    private $id;
    private $title;
    private $content;
    private $date;
    private $authorId;
    private $catId;
    private $db;

    public function __construct(
        $db,
        $id = null,
        $title,
        $content,
        $date,
        $authorId,
        $catId
    ){
        $this->db = $db;
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
        $this->authorId = $authorId;
        $this->catId = $catId;
    }

    public function getID(){return $this->id;}
    public function getTitle(){return $this->title;}
    public function getContent(){return $this->content;}
    public function getDate(){return $this->date;}
    public function getAuthorId(){return $this->authorId;}
    public function getCatId(){return $this->catId;}

    public function setTitle($title){$this->title = $title;}
    public function setContent($content){$this->content = $content;}

    public function save(){
        if($this->id){
            $statement = $this->db->prepare("UPDATE articles SET title = ?, content = ? WHERE id = ?");
            $statement->execute([
                $this->title,
                $this->content,
                $this->id
            ]);
        }else{
            
            $stmt = $this->db->prepare("INSERT INTO articles (title, content, id, date, cat_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([
                $this->title,
                $this->content,
                $this->authorId,
                $this->date,
                $this->catId
            ]);
            
            $this->id = $this->db->lastInsertId();
        }
    }
}