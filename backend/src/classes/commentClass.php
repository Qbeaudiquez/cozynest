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

    public function __construct($db,$id = null,$pseudo,$content,$date,$isValid = 0, $answer = null, $articleId){
        $this->db = $db;
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->content = $content;
        $this->date = $date;
        $this->isValid = $isValid;
        $this->answer = $answer;
        $this->articleId = $articleId;
    }

    public function save(){
            $currentDate = date("Y-m-d");
            $statement = $this->db->prepare("INSERT INTO comments (pseudo, content, date, is_valid, answer, article_id) VALUES (?,?,?,?,?,?)");
            $statement->execute([$this->pseudo, $this->content, $currentDate, $this->isValid, $this->answer, $this->articleId]);
            $this->id = $this->db->lastInsertId();

    }

    public function validate(){
        $this->isValid = 1;
        $statement = $this->db->prepare("UPDATE comments SET is_valid = ? WHERE id = ?");
        $statement->execute([$this->isValid, $this->id]);
    }

    public function addAnswer($answerContent){
        if($this->answer !== null){
            return;
        }

        $statement = $this->db->prepare("UPDATE comments SET answer = ? WHERE id = ?");
        $statement->execute([$answerContent, $this->id]);
    }

    public function getId() { return $this->id; }
    public function getPseudo() { return $this->pseudo; }
    public function getContent() { return $this->content; }
    public function getDate() { return $this->date; }
    public function getIsValid() { return $this->isValid; }
    public function getAnswer() { return $this->answer; }
}