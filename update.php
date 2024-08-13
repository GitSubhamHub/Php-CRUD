<?php include 'Connection.php';
 $id=$_GET['id'];
 $select="SELECT * FROM student WHERE id='$id'";
 $data=mysqli_query($con,$select);
 $row=mysqli_fetch_array($data);
 ?>

 <div>
 <form action="" method="POST">
     <input value="<?php echo $row['firstname'] ?>" type="text" name="firstname" placeholder="firstname"> <br><br>
     <input type="text" name="lastname" placeholder="lastname" value="<?php echo $row['lastname'] ?>"> <br><br>
     <input type="number" name="age" placeholder="age" value="<?php echo $row['age'] ?>"> <br><br>

     <input type="submit" name="update_btn" value="Update"> 
      <button><a href="view.php">Back</a></button>
 </form>
</div>

<?php
      if(isset($_POST['update_btn'])) {
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $age=$_POST['age'];

        $update="UPDATE student SET firstname='$fname',
                        lastname='$lname', age='$age' WHERE id='$id'";
            $data=mysqli_query($con,$update);
            if($data) {
                ?>
                <script type="text/javascript">
                    alert("Data Updated Successfully");
                    window.open("http://localhost/Demo/view.php", "_self");
                </script>
                <?php
            }
            else {
                ?>
                <script type="text/javascript">
                    alert("Please Try Again");
                </script>
                <?php
            }
      }
    ?>
