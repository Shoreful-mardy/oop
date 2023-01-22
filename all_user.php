<?php
include_once('header.php');


   if(isset($_GET['id'])){
    $id = $_GET['id'];

    $delete = $db->delete($id,'user');
    if($delete){
      echo 'Delete Successfully';
    }else{
      echo 'Delete failed!!';
    }
    
   }


  $sql = "SELECT * FROM user ";
  $result = $db->select($sql);
  
?>

<div class="container">
  <div class="row">
    <div class="col-md-8 d-block m-auto">
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">phone number</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 0; 
    while($row = mysqli_fetch_assoc($result)){ $i++ ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['name']?></td>
        <td><?php echo $row['phone']?></td>
        <td><?php echo $row['email']?></td>
        <td><a class="btn btn-warning" href="edit.php?id= <?php echo $row['id']?>">Edit</a></td>
        <td><a onclick="return confirm('Are you sure want to delete this item ?')" class="btn btn-danger" href="?id= <?php echo $row['id']?>">Delete</a></td>
      </tr>
    <?php }
    ?>
  </tbody>
</table>
  <div class="col-8">
    <a class="btn btn-success text-center" href="./indax.php">Back to input page</a>
  </div>
    </div>
  </div>
</div>
</body>
</html>