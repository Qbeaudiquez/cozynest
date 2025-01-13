<?php

class Article{
    private $title;
    private $content;
    private $date;
    private $authorId;
    private $catId;
    private $db;

    public function __construct(
        $db,
        $title,
        $content,
        $authorId,
        $catId,
    ){
        $this->db = $db;
        $this->title = $title;
        $this->content = $content;
        $this->authorId = $authorId;
        $this->catId = $catId;
    }



    public function save(){

            $currentDate = date("Y-m-d");
            $statement = $this->db->prepare("INSERT INTO articles (title, content, user_id, date, cat_id) VALUES (?, ?, ?, ?, ?)");
            $statement->execute([
                $this->title,
                $this->content,
                $this->authorId,
                $currentDate,
                $this->catId
            ]);
    }

}