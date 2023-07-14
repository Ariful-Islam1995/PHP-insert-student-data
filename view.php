<?php 
require_once('header.php'); ?>

<div class="area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <div class="view-area table-responsive">
                <br>
                 <h3 class="text-center">View all Student data</h3>

                <?php if(isset($_REQUEST['success'])) : ?>

                  <div class="alert alert-success">
                    student data deleted successfully! 
                  </div>

                <?php endif; ?>

                 <hr>
                   <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Roll</th>
                          <th>Email</th>
                          <th>Age</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                         $view= $pdo->prepare("SELECT * FROM students");
                         $view->execute();
                         $result= $view->fetchAll(PDO::FETCH_ASSOC);

                         $i=1;

                         foreach($result as $row) :

                        ?>

                        <tr>
                            <td><?php echo $i; $i++; ?></td>
                            <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['roll']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['age']; ?></td>
                            <td>
                              <a href="singleview.php?ID=<?php echo $row['ID']; ?>">view</a> |
                              <a href="edit.php?edit=<?php echo $row['ID']; ?>">edit</a> |
                              <a onclick="return mydelete()" href="delete.php?delete=<?php echo $row['ID'] ?>">delete</a>
                            </td>
                        </tr>
                        
                        <?php endforeach; ?>

                      </tbody>
                   </table>
               </div>
            </div>
        </div>
    </div>
</div>


<?php
 require_once('footer.php');
?>