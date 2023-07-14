<?php require_once('header.php'); ?>

<?php 
$stm = $pdo->prepare("SELECT * FROM students WHERE ID=?");
$stm->execute(array($_REQUEST['ID']));
$result = $stm->fetchAll(PDO::FETCH_ASSOC);

foreach($result as $single){
    $name= $single['name'];
    $roll= $single['roll'];
    $email= $single['email'];
    $age= $single['age'];
}

?>


<div class="area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="view-area">
                    <br>
                    <h3 class="text-center"><?php echo $name; ?>'s details</h3>
                    <table class="table">
                        <tr>
                            <td>ID</td>
                            <td>:</td>
                            <td><?php echo $_REQUEST['ID']; ?></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><?php echo $name; ?></td>
                        </tr>
                        <tr>
                            <td>Roll</td>
                            <td>:</td>
                            <td><?php echo $roll; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $email; ?></td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td>:</td>
                            <td> <?php echo $age ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<?php require_once('footer.php'); ?>