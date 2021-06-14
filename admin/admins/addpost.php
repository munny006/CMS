<?php include('./admins/header.php');?>
   

        <?php include('./admins/nav.php');?>

        <?php
        if (isset($_POST['add_post'])) {
           $post_title = $_POST['post_title'];
           $post_cat_id = $_POST['cat_name'];
           $post_author = $_POST['post_author'];
           $post_status  =$_POST['post_status'];


           $Post_Img =$_FILES['imge']['name'];
           $Post_Temp =$_FILES['imge']['tmp_name'];

            $post_tags = $_POST['post_tags'];
            $post_content = $_POST['post_content'];

            $post_date = date('d-m-y');
            


            $sql = "INSERT INTO post (post_cat_id,post_title,post_author,post_date,Post_img,post_content,post_tags,post_status) VALUES('$post_cat_id', '$post_title', '$post_author', now(), '$Post_Img', '$post_content', '$post_tags', '$post_status')";
            $result = mysqli_query($conn,$sql);
            if ($result)
             {
                 echo "Record has been saved!";
                 move_uploaded_file($Post_Temp, "../img/$Post_Img");
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
                            <label>Post Title</label>
                            <input type="text" name="post_title" placeholder="Post Title" class="form-control mb-2"><br>
                            
                            <select name="cat_name" id="" class="form-control">

                            <?php

                            $sql = "SELECT * FROM category";
                            $Value = mysqli_query($conn,$sql);

                            while ($row = mysqli_fetch_Assoc($Value)) 

                            {

                                $cat_id = $row['cat_id'];
                                $cat_title =$row['cat_title']; 
                         ?>
                                <option value="<?php echo $cat_id;?>"><?php echo $cat_title;?></option>

                                <?php
                               
                            }



                            ?>
                    </select><br>
                                 <label>Post Author</label>
                            <input type="text" name="post_author" placeholder="Post Author" class="form-control mb-2"><br>
                            <label>Post Status</label>
                            <input type="text" name="post_status" placeholder="Post Status" class="form-control mb-2"><br>
                             <label>Post Img</label>
                            <input type="file" name="imge" class="form-control mb-2"><br>
                              <label>Post Tags</label>
                            <input type="text" name="post_tags" placeholder="Post Tags" class="form-control mb-2"><br>
                            <label>Post content</label><br>
                            <textarea name="post_content"class="form-control mb-2" cols="30" rows="10" placeholder="Hello MunnY!"></textarea><br>
                            <button class="btn btn-success" type="submit" name="add_post">Add Post</button>
                            
                        </form>
                        
                    </div>
                 
                    </div>
                <!-- /.row -->

                       <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include('./admins/footer.php');?>
   