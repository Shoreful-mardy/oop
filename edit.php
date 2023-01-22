<?php
include_once('header.php');

 // for edit data start
 if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM user WHERE id = '$id'";
    $result = $db->select($sql);
    $row = mysqli_fetch_assoc($result);

    
   }
// for edit data end


   $name = $phone= $email = '';
   $name_err = $phone_err= $email_err = null;


  if(isset($_POST['update'])){
      $id = $_POST['id'];

         if($_POST['User_name'] != ''){
            $name =$db->verify_data( $_POST['User_name']);
         }else{
            $name_err = " name fild is blank";
         }

         if($_POST['User_number'] != ''){
            $phone = $db->verify_data($_POST['User_number']);
         }else{
            $phone_err = " phone fild is blank";
         }

         if($_POST['User_email'] != ''){
            $email =$db->verify_data($_POST['User_email']) ;
                  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                     $email_err = ' Email format is not valid ';
                  }
         }else{
            $email_err = " email fild is blank";
           }

 if($name_err== null && $phone_err== null && $email_err== null){
         $sql = "UPDATE user SET name = '$name', phone = '$phone', email= '$email' WHERE id = '$id'";

                  if ($db->update($sql)) {
                     echo 'data Upadate succesfully';
                     header("Location: all_user.php");
                  }else{
                     echo 'data Update failed . error:'.$sql;
                  }
  }
      
}

   ?>
<div class="container">
   <div class="row">
      <div class="col-8 d-block m-auto">
      <form action="" method="POST">
      <input type="hidden" name="id" value="<?php echo $id ?>" >
      <label for="name">Name : </label>
      <input type="text" style="width: 100%;" required name="User_name" value="<?php echo $row['name'] ?>" id="name"><span
         style="color : red;"><?php echo $name_err ?></span><br>
      <label for="phone">Phone : </label>
      <input type="number" style="width: 100%;" required name="User_number" value="<?php echo $row['phone'] ?>" id="phone"><span
         style="color : red;"><?php echo $phone_err ?></span><br>
      <label for="email">Email:</label>
      <input type="email" style="width: 100%;" required name="User_email" value="<?php echo $row['email'] ?>" id="email"><span
         style="color : red;"><?php echo $email_err ?></span><br>
      <button type="submit" name="update" class="btn btn-success">Update</button>
      <a href="./all_user.php" class="btn btn-info">All User >></a>
   </form>
      </div>
   </div>
</div>
</body>

</html>