<?php 
if(isset($_POST["editCategory"]) || 
    isset($_POST["delCategory"]) || 
    isset($_POST["newCategory"])){
        

        if(isset($_POST["editCategory"])){
            $categoryId = $_POST["categoryId"];
            $catName = $_POST["editCategory"];
            $query = "UPDATE categories SET name = :name WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->execute([
                'name' => $catName,
                'id' => $categoryId
            ]);

        }elseif(isset($_POST["delCategory"])){
            $categoryId = $_POST["categoryId"];
            $query = "DELETE FROM categories WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->execute([
                'id' => $categoryId
            ]);

        }elseif(isset($_POST["newCategory"])){
            $catName = $_POST["newCategory"];
            $query = "INSERT INTO categories (name) VALUES (:name)";
            $statement = $db->prepare($query);
            $statement->execute([
                'name' => $catName
            ]);
        }

        echo "<script> redirectionPage('admin.php') </script>";
        
    }
