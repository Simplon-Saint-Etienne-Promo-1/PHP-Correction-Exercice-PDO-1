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
$clientsStatement = $db->prepare('SELECT * FROM clients LIMIT 20');
$clientsStatement->execute();
$clients = $clientsStatement->fetchAll();

// On affiche chaque recette une à une
foreach ($clients as $client) {
?>
        <p><?php echo "Prénom: " . $client['firstName']; ?></p>
        <p><?php echo "Nom: " . $client['lastName']; ?></p>
        <p><?php echo "Date de naissance: " . $client['birthDate']; ?></p>
        <p><?php echo "Carte: " . $client['card']; ?></p>
        <p><?php echo "Numéro de carte: " . $client['cardNumber']; ?></p>
        <hr>
<?php
}

?>