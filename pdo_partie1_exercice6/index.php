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
$showsStatement = $db->prepare("SELECT title, performer, date, startTime FROM shows ORDER BY title ASC");
$showsStatement->execute();
$shows = $showsStatement->fetchAll();

// On affiche chaque recette une à une
foreach ($shows as $show) {
?>
        <p><?php echo "Spectacle par " . $show['performer'] . " le " . $show['date'] . " à " . $show['startTime']; ?></p>
        <hr>
<?php
}

?>