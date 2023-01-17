<?php
$db;

try
{
	$db = new PDO(
        'mysql:host=localhost;dbname=colyseum;charset=utf8', 
        'root', 
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

// Exercice 1
$showTypesStatement = $db->prepare('SELECT `type` FROM showTypes');
$showTypesStatement->execute();
$showTypes = $showTypesStatement->fetchAll();

?>
<h1>Tous les types de show</h1>
<?php
// On affiche chaque recette une à une
foreach ($showTypes as $showType) {
?>
        <p><?php echo "Type de show: " . $showType['type']; ?></p>
        <hr>
<?php
}

?>