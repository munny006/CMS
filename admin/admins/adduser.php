<?php include('./admins/header.php');?>
   

        <?php include('./admins/nav.php');?>

        <?php
        if (isset($_POST['add_user'])) {
           $f_name = $_POST['f_name'];
           $l_name = $_POST['l_name'];
           $user_role = $_POST['user_role'];
           $user_name  =$_POST['user_name'];
           $user_email  =$_POST['user_email'];
           $user_Password  =$_POST['user_Password'];





           /*$Post_Img =$_FILES['imge']['name'];
           $Post_Temp =$_FILES['imge']['tmp_name'];

            $post_tags = $_POST['post_tags'];
            $post_content = $_POST['post_content'];

            $post_date = date('d-m-y');
            
*/

            $sql = "INSERT INTO  users (user_name,user_password,first_name,last_name,user_email,user_role) VALUES('$user_name', '$user_Password', '$f_name', '$l_name', '$user_email', '$user_role')";
            $result = mysqli_query($conn,$sql);
            if ($result)
             {
                 echo "Record has been saved!";
                 //move_uploaded_file($Post_Temp, "../img/$Post_Img");
            }
            else{
                echo "QUERY FILED";
            }

           

        }


        ?>
       

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col">
                        <!--add category-->
                       <form action="" method="POST" enctype="multipart/form-data">
                        
                                 <label>First Name</label>
                            <input type="text" name="f_name" placeholder="First Name" class="form-control mb-2"><br>
                            <label>Last Name</label>
                            <input type="text" name="l_name" placeholder="Last Name" class="form-control mb-2"><br>
                             <select name="user_role" id="" class="form-control mb-2">
                                <option name="subscriber" id=""> Select User </option>
                                 <option name="admin" id=""> Admin </option>
                                 <option name="subscriber" id=""> subscriber </option>
                                
                            </select><br>



                              <label>User Name</label>
                            <input type="text" name="user_name" placeholder="User Name" class="form-control mb-2"><br>
                            <label>User Email</label>
                            <input type="email" name="user_email" placeholder="User Email" class="form-control mb-2"><br><br>
                              <label>User Password</label>
                            <input type="Password" name="user_Password" placeholder="User Password" class="form-control mb-2"><br><br>
                            <button class="btn btn-success" type="submit" name="add_user">Add User</button>
                            
                        </form>
                        
                    </div>
                 
                    </div>
                <!-- /.row -->

                       <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include('./admins/footer.php');?>
   