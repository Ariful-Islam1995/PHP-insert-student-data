<?php 

require_once('header.php');

if(isset($_POST['st_update'])){
    $name= $_POST['st_name'];
    $roll= $_POST['st_roll'];
    $email= $_POST['st_email'];
    $age= $_POST['st_age'];

  if(empty($name)){
    $error= "Enter your name";
  }
  else if(empty($roll)){
    $error= "Enter your roll";
  }
  else if(!is_numeric($roll)){
    $error= "Roll must be number";
  }
  else if(empty($email)){
    $error= "Enter your email";
  }
  else if(empty($age)){
    $error= "Enter your age";
  }
  else if(!is_numeric($age)){
    $error= "Age must be number";
  }
  else{
      $stm = $pdo->prepare("UPDATE students SET name=?, roll=?, email=?, age=? WHERE ID=?");
      $stm->execute(array($name, $roll, $email, $age, $_REQUEST['edit']));
      $success= "Student data update successfully!";
  }

}

 //update student data

 $stm = $pdo->prepare("SELECT * FROM students WHERE ID=?");
 $stm->execute(array($_REQUEST['edit']));
 $result = $stm->fetchAll(PDO::FETCH_ASSOC);

 foreach($result as $update){
  $name = $update['name'];
  $roll = $update['roll'];
  $email = $update['email'];
  $age = $update['age'];
 }





?>


    <div class="area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-area">
                        <br>
                        <h3>Edit student data</h3>
                        <hr>
                        <br>
                        <?php if(isset($error)) :  ?>
                          <div class="alert alert-danger">
                          <?php echo $error; ?>
                          </div>
                        <?php endif; ?>

                        <?php if(isset($success)) :  ?>
                          <div class="alert alert-success">
                          <?php echo $success; ?>
                          </div>
                        <?php endif; ?>

                        <form action="" method="POST">
                        <div class="form-group">
                            <label for="Name">Name:</label>
                            <input type="text" name="st_name" value="<?php echo $name; ?>" class="form-control" id="Name">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="Roll">Roll:</label>
                            <input type="text" name="st_roll" value="<?php echo $roll; ?>" class="form-control" id="Roll">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="Email">Email:</label>
                            <input type="email" name="st_email" value="<?php echo $email; ?>" class="form-control" id="Email">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="Age">Age:</label>
                            <input type="text" name="st_age" value="<?php echo $age ?>" class="form-control" id="Age">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" name="st_update" class="btn btn-success" value="Edit Data">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
require_once('footer.php');
?> 