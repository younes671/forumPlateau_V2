<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
?>

<h1>Liste des topics</h1>

<?php
foreach($topics as $topic ){ ?>
    <p><a href="#"><?= $topic ?></a> par <?= $topic->getUser() . " publié le " . $topic->getDateCreation()->format("d-m-Y à H:i") ?></p>
<?php }
