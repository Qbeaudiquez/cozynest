<?php $invalidComments = getComment($db, 0)?>
<div class="commentsDisplay display" id="comments" style="flex-wrap:wrap;">
<?php if(empty($invalidComments)) : ?>
<div class='noCommentContainer'>Aucun commentaire a manager</div>
<?php else : ?>

<?php foreach($invalidComments as $invalidComment):?>
        <div class="invalidCommentContainer">
            <h4 class="invalidCommentPseudo"><?=$invalidComment['pseudo']?></h4>
            <p class="invalidCommentContent"><?=$invalidComment['content']?></p>
            <form action="admin.php" method="post">
                <input type="hidden" name="deleteComment">
                <input type="hidden" name="manageCommentId" value="<?= $invalidComment['id']?>">
                <input type="submit" value="Supprimer">
            </form>
            <form action="admin.php" method="post">
                <input type="hidden" name="validComment">
                <input type="hidden" name="manageCommentId" value="<?= $invalidComment['id']?>">
                <input type="submit" value="Valider">
            </form>
        </div>
    <?php endforeach ?>
<?php require_once('/backend/src/manageComment.php') ?>
</div>
<?php endif?>
