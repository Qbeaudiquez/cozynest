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
        $catId,
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
            $currentDate = date("Y-m-d");
            $statement = $this->db->prepare("INSERT INTO articles (title, content, user_id, date, cat_id) VALUES (?, ?, ?, ?, ?)");
            $statement->execute([
                $this->title,
                $this->content,
                $this->authorId,
                $currentDate,
                $this->catId
            ]);
            
            $this->id = $this->db->lastInsertId();
        }
    }

    public function addTag(Tag $tag){
        $statement = $this->db->prepare("INSERT INTO article_tags (article_id,tag_id) VALUES (?,?)");
        $statement->execute([$this->id, $tag->getId()]);
    }

    public function getTags(){
        $statement = $this->db->prepare("SELECT tags.* FROM tags JOIN article_tags ON tags.id = article_tags.tag_id WHERE article_tags.article_id = ?");
        $statement->execute([$this->id]);
        $tags = $statement->fetchAll(PDO::FETCH_ASSOC);
        $tagTable = [];

        foreach ($tags as $tag){
            $tagTable[] = new Tag($this->db, $tag["id"], $tag["name"]);
        }
        return $tagTable;
    }

}