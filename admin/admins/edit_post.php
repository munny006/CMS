<?php include('./admins/header.php');?>
   

        <?php include('./admins/nav.php');?>

        <?php

        if (isset($_GET['p_id'])) 
        {
            $POST_ID = $_GET['p_id'];
          $sql = "SELECT * FROM post WHERE post_id='$POST_ID'";
          $result = mysqli_query($conn,$sql);

          while ($row = mysqli_fetch_assoc($result))
           {
                                 $post_id=      $row['post_id'];
                                 $post_author = $row['post_author'];
                                 $post_title =  $row['post_title'];
                                 $post_cat_id=  $row['post_cat_id'];
                                 $post_status=  $row['post_status'];
                                 $post_img =    $row['post_img'];
                                 $post_tags =   $row['post_tags'];
                                 $post_content = $row['post_content'];

          }
        }
            //update post

        if (isset($_POST['edit_post'])) {
            $post_title = $_POST['post_title'];
           $post_cat_id = $_POST['cat_name'];
           $post_author = $_POST['post_author'];
           $post_status  =$_POST['post_status'];


           $Post_Img =$_FILES['imge']['name'];
           $Post_Temp =$_FILES['imge']['tmp_name'];

            $post_tags = $_POST['post_tags'];
            $post_content = $_POST['post_content'];

           
            if (empty($Post_Img)) {
              $query= "SELECT * FROM post WHERE post_id='$POST_ID'";
              $result = mysqli_query($conn,$query);
              while ($row = mysqli_fetch_assoc($result)) {
                 $Post_Img = $row['post_img'];
              }
            }

            $sql = "UPDATE post SET post_cat_id = '$post_cat_id', post_title='$post_title',post_author='$post_author',post_date= now(),post_img= '$Post_Img',post_content='$post_content',post_status='$post_status' WHERE post_id='$POST_ID'";

            $result = mysqli_query($conn,$sql);

            if ($result) 
            {
              header("location:./posts.php");
              move_uploaded_file($Post_Temp, "../img/Post_Img");
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
                            <input type="text" name="post_title" placeholder="Post Title" class="form-control mb-2" value="<?php echo $post_title;?>"><br>

                            <select name="cat_name" id="" class="form-control">
                                
                                <?php
                                $query= "SELECT * FROM category";
                                $data =mysqli_query($conn,$query);

                                while ($row = mysqli_fetch_assoc($data)) 
                                {
                                    $cat_id = $row['post_cat_id'];
                                   ?>
                                   <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_title'];?></option>
                                <?php 
                                   }
                                    ?>
                                
                            </select><br>

                            <label>Post Author</label>
                            <input type="text" name="post_author" placeholder="Post Author" class="form-control mb-2" value="<?php echo $post_author;?>"><br>
                            <label>Post Status</label>
                            <input type="text" name="post_status" placeholder="Post Status" class="form-control mb-2" value="<?php echo $post_status;?>"><br>
                             <label>Post Img</label>
                             <img class = "img-responsive text-center" width="150" height="80" src="../img/<?php echo $post_img;?>">
                            <input type="file" name="imge" class="form-control mb-2"><br>
                              <label>Post Tags</label>
                            <input type="text" name="post_tags" placeholder="Post Tags" class="form-control mb-2" value="<?php echo $post_tags;?>"><br>
                            <label>Post content</label><br>
                            <textarea name="post_content"class="form-control mb-2" cols="30" rows="10" placeholder="Hello MunnY!"><?php echo $post_content;?></textarea><br>
                            <button class="btn btn-danger" type="submit" name="edit_post">Edit Post</button>
                            
                        </form>
                        
                    </div>
                 
                    </div>
                <!-- /.row -->

                       <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include('./admins/footer.php');?>
   