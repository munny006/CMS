<?php include('./admins/header.php');?>
    <div id="wrapper">

        <?php include('./admins/nav.php');?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         
                            <small>Author</small>
                        </h1>
                        
                    </div>
                 
                    <div class="col-lg-6">
                           <?php
                    if (isset($_POST['submit'])) {
                    if ($_POST['category'] == "") {
                        echo '<p class = "alert alert-danger">PLease Enter Category</p>';
                    }
                    else{
                          $add_cat = $_POST['category'];
                     $query ="INSERT INTO category(cat_title)VALUES('$add_cat')";
                     $result = mysqli_query($conn,$query);
                    }
                    }

                    ?>
                    <!--add new category-->
                        <form action="" method="POST">
                            <label>Add New Category</label>
                            <input type="text" name="category" placeholder="category" class="form-control mb-2"><br>
                            <button class="btn btn-info" type="submit" name="submit">Add Category</button>
                            
                        </form>
                        <br>
                        <!--edit category-->
                        <?php
                        if (isset($_GET['edit'])) {
                            $edit_Id = $_GET['edit'];
                            $sql = "SELECT * FROM category WHERE cat_id = '$edit_Id'";
                            $result = mysqli_query($conn,$sql);
                            $data = mysqli_fetch_Assoc($result);



                         ?>
                        <!--edit form-->
                            <form action="update.php" method="POST">
                            <label>Edit Category</label>
                            <input type="text" name="edit_category" placeholder="category" class="form-control mb-2" value="<?php echo $data['cat_title'];?>"><br>
                            <input type="hidden" name="edit_id" value ="<?php echo $data['cat_id'];?>">
                            <button class="btn btn-warning" type="submit" name="btn_edit_submit">Edit Category</button>
                            
                        </form>

                         <?php  
                        }


                        ?>

                    </div>
                  
                    <div class="col-lg-6">
                        <table class="table table-bordered text-center">
                     
                            <tr>
                                <th class="text-center" width="20%">Category ID</th>
                                <th class="text-center" width="50%">Category Name</th>
                                <th class="text-center" width="30%">Operations</th>

                            </tr>
                            <tr>
                         <?php 

                         $sql = "SELECT * FROM category";
                         $result = mysqli_query($conn,$sql);
                         while ($row = mysqli_fetch_assoc($result)) {
                         ?>

                            
                                <td><?php echo $row['cat_id'];?></td>
                                <td><?php echo $row['cat_title'];?></td>
                                <td>
                                    <a href="categories.php?del=<?php echo $row['cat_id'];?>"><i class="fa fa-trash btn btn-danger"></i></a>
                                    <a href="categories.php?edit=<?php echo $row['cat_id'];?>"><i class="fa fa-edit btn btn-info"></i></a>
                                </td>

                            </tr>
                            <?php
                            }
                            //delete data
                            if (isset($_GET['del'])) {
                                $Del = $_GET['del'];
                                $sql = "DELETE FROM category WHERE cat_id =$Del";
                                $result = mysqli_query($conn,$sql);
                                if ($result) {
                                  header('location:categories.php');
                                }
                            }

                            ?>
                            
                      
                        </table>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include('./admins/footer.php');?>
   