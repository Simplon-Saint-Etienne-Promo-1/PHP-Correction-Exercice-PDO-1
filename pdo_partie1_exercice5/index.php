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
$clientsStatement = $db->prepare("SELECT lastName, firstName FROM clients WHERE lastName LIKE 'M%' ORDER BY lastName ASC");
$clientsStatement->execute();
$clients = $clientsStatement->fetchAll();

// On affiche chaque recette une à une
foreach ($clients as $client) {
?>
        <p><?php echo "Nom: " . $client['lastName']; ?></p>
        <p><?php echo "Prénom: " . $client['firstName']; ?></p>
        <hr>
<?php
}

?>