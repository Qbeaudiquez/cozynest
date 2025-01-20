<?php $categories = getTableData($db, 'categories') ?>

<div class="settingDisplay display" id="setting">
   <div class="catContainer">
      <div class="existsCatContainer">
         <?php foreach($categories as $categorie):?>
            <?php 
            $categoryName = $categorie['name'];
            $categoryId = $categorie['id'];
            ?>
            <form action="admin.php" method="post">
               <label for="editCategory">Nom de la catégorie : </label>
               <input type="text" name="editCategory" class="editCategory" value="<?= $categoryName?>" required>
               <input type="hidden" name="categoryId" value="<?= $categoryId?>">
               <input type="submit" value="Modifier">
            </form>
            <form action="admin.php" method="post">
               <input type="hidden" name="categoryId" value="<?= $categoryId?>">
               <input type="hidden" name="delCategory">
               <input type="submit" value="Supprimer">
            </form>
         <?php endforeach ?>
      </div>
      <?php require_once('/backend/src/manageCategories.php'); ?>


      <form action="admin.php" method="post">
         <label for="newCategory">Nouvelle catégorie : </label>
         <input type="text" name="newCategory" id="newCategory" required>
         <input type="submit" value="Créer">
      </form>
   </div>
   
<form method="POST" action="admin.php">
   <button type="submit" name="logout" value="1">Se deconnecter</button>
</form>
</div>

<?php require_once('/backend/src/logout.php');?>