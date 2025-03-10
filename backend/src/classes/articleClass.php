<?php

class Article{
    private $title;
    private $content;
    private $desc;
    private $date;
    private $authorId;
    private $catId;
    private $db;
    private $dbMongoConnect;

    public function __construct(
        $db,
        $title,
        $content,
        $desc,
        $authorId,
        $catId,
        $dbMongoConnect,
    ){
        $this->db = $db;
        $this->title = $title;
        $this->content = $content;
        $this->desc = $desc;
        $this->authorId = $authorId;
        $this->catId = $catId;
        $this->dbMongoConnect = $dbMongoConnect;
    }



    public function save($file){

            // Save in mysql
            try{
                 $statement = $this->db->prepare("INSERT INTO articles (title, content, user_id, cat_id,description) VALUES (?, ?, ?, ?,?)");
            $statement->execute([
                $this->title,
                $this->content,
                $this->authorId,
                $this->catId,
                $this->desc
            ]);
            }catch (PDOException $e) {
                echo "Erreur de connexion MySQL : " . $e->getMessage();
            }
           
            
            // Save in MongoDb
            $articleId = (int) $this->db->lastInsertId();
            $mongoCollection = 'viewCount';
            $mongoDb = 'cozynest';

            $document = [
                '_id' =>  $articleId,
                'article_id' => $articleId,
                'views_count' => 0 
            ];

            try {
                $bulkWrite = new MongoDB\Driver\BulkWrite();
                $bulkWrite->insert($document);

                $this->dbMongoConnect->executeBulkWrite("$mongoDb.$mongoCollection",$bulkWrite);
                
            } catch (MongoDB\Driver\Exception\Exception $e) {
                echo "Error MongoDB : " . $e->getMessage();
            }

            // Save picture
            if(isset($file) && $file['picture']['error'] === UPLOAD_ERR_OK){
                $uploadDir = '/frontend/assets/img/backArticle/';
                $ext = ".png";
                $uploadFile = $uploadDir . $articleId . $ext;

                $fileType = mime_content_type($file['picture']['tmp_name']);
                if(strpos($fileType, 'image') === 0){
                    move_uploaded_file($file['picture']['tmp_name'], $uploadFile);
                }
                
            }
    }

}