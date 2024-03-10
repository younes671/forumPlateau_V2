<?php
    $posts = $result["data"]['posts'];
    
?>

<h1>Liste des postes</h1>

<?php if($posts){
foreach($posts as $post){  ?>
    <h2><?= $post->getTopic() ?></h2>
    <p><?php echo $post->getText() . " posté par " . $post->getUser() . " le : " . $post->getDateCreation()?></a></p>
<?php } }else
            {
                echo "Il n'y a aucun post sur le sujet ! ";
            } 