<?php require_once('header.php'); ?>


<?php 
$stm = $pdo->prepare("DELETE FROM students WHERE ID=?");
$stm->execute(array($_REQUEST['delete']));

echo "Student data delete successfully!";

header('location:view.php?success');


?>





<?php require_once('footer.php'); ?>