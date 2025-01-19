<?php

class Comment{
    private $db;
    private $id;
    private $pseudo;
    private $content;
    private $date;
    private $isValid;
    private $answer;
    private $articleId;

    public function __construct($db,$pseudo,$content, $articleId){
        $this->db = $db;
        $this->pseudo = $pseudo;
        $this->content = $content;
        $this->articleId = $articleId;
    }

    public function save($articleId){
            $currentDate = date("Y-m-d");
            $statement = $this->db->prepare("INSERT INTO comments (pseudo, content, date, article_id) VALUES (?,?,?,?)");
            $statement->execute([
                $this->pseudo, 
                $this->content, 
                $currentDate, 
                $this->articleId
            ]);

            $this->id = $this->db->lastInsertId();

    }

    public function getId() { return $this->id; }
    public function getPseudo() { return $this->pseudo; }
    public function getContent() { return $this->content; }
    public function getDate() { return $this->date; }
    public function getIsValid() { return $this->isValid; }
    public function getAnswer() { return $this->answer; }
}