<?php
    $users = $result["data"]['users'];
    
?>

<h1>Liste des utilisateurs</h1>

<?php if($users){
foreach($users as $user){  ?>
    <p><?= $user->getUserName() . " inscrit le : " . $user->getDateRegistration()?></a></p>
<?php } }else
            {
                echo "Il n'y a aucun utilisateur ! ";
            } 