<!DOCTYPE html>
<html>
<body>

<?php
require_once '_connec.php';
$pdo = new \PDO(DSN, USER, PASS);

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<ul>
    <?php foreach($friends as $friend): ?>
        <?= '<li>' . $friend['firstname'] . ' ' . $friend['lastname'] . '</li>'; ?>
    <?php endforeach; ?>
</ul>

<form action="check.php" method="post" >
    <div>
        <label  for="firstname">Prénom :</label>
        <input  type="text"  id="firstname"  name="firstname" required="">
    </div>
    <div>
        <label  for="lastname">Nom :</label>
        <input  type="text" id="lastname" name="lastname" required="" >
    </div>
    <div  class="button">
        <button  type="submit">Ajouter un Friend</button>
    </div>
</form>

  </body>
</html>

