<?php
require_once('/backend/src/classes/articleClass.php');
$categories = getTableData($db, 'categories');
?>

<div class="display active">
    <form action="admin.php" method="post" enctype="multipart/form-data">
        <input type="text" name="title" id="title" placeholder="Titre">
        <textarea name="content" id="content" placeholder="Contenue ..."></textarea>
        <input type="text" name="desc" id="desc" placeholder="Description">
        <select name="category" id="category">
            <?php foreach($categories as $category):?>
                <option value="<?= $category['name']?>"><?= $category['name']?></option>
            <?php endforeach?>
        </select>
        <input type="file" name="picture" id="picture" accept="image/*" requiered>
        <input type="submit" value="teste">
    </form>
</div>

<?php require_once('/backend/src/createArticle.php');


