<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
?>

<h1>Liste des topics</h1>

<?php
foreach($topics as $topic ){ ?>
    <p><a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?php echo $topic->getId() ?>"><?php echo $topic ?></a> par <?php echo $topic->getUser() ?> publié le <?php echo $topic->getDateCreation()?></p>
<?php }
