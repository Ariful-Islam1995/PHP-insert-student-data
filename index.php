<?php 

require_once('header.php');

if(isset($_POST['st_submit'])){
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
    $statement= $pdo->prepare("INSERT INTO students(name,roll,email,age) VALUES(?,?,?,?)");
    $statement->execute(array($name,$roll,$email,$age));
    $success="student data insert successfully!";
  }

}

?>


    <div class="area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-area">
                        <br>
                        <h3>insert student data</h3>
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
                            <input type="text" name="st_name" class="form-control" id="Name">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="Roll">Roll:</label>
                            <input type="text" name="st_roll" class="form-control" id="Roll">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="Email">Email:</label>
                            <input type="email" name="st_email" class="form-control" id="Email">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="Age">Age:</label>
                            <input type="text" name="st_age" class="form-control" id="Age">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" name="st_submit" class="btn btn-success" value="insert data">
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