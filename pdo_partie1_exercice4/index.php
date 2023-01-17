<?php
$db;

try {
    $db = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$clientsStatement = $db->prepare('SELECT *
                                    FROM clients
                                    WHERE cardNumber IN (SELECT cardNumber 
                                                        FROM cards 
                                                        WHERE cardTypesId = 1)');
$clientsStatement->execute();
$clients = $clientsStatement->fetchAll();

?><h1> Les clients qui ont une carte de fidélité </h1>
<?php
foreach($clients as $client) {
    ?>
        <p><?php echo "Prénom: " . $client['firstName']; ?></p>
        <p><?php echo "Nom: " . $client['lastName']; ?></p>
        <hr>
<?php }?>
