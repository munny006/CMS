                 <table class="table table-stripped text-center">
                            <tr>


                                <th class="text-center">ID</th>
                                <th class="text-center">Author</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Img</th>
                                <th class="text-center">Comment</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Operation</th>

                            </tr>      
                            <tr class="text-center">
                                <?php
                                $query = "SELECT * FROM post";
                                $result = mysqli_query($conn,$query);
                                while ($row= mysqli_fetch_assoc($result)) 
                                {
                                  $cat_id =$row['post_cat_id'];

                                   ?>

                                <td class="text-center"><?php echo $row['post_id'];?></td>
                                <td class="text-center"><?php echo $row['post_author'];?></td>
                                <td class="text-center"><?php echo $row['post_title'];?></td>


                                <?php

                                $query = "SELECT * FROM category WHERE cat_id = '$cat_id'";
                                $data = mysqli_query($conn,$query);


                                while ($value = mysqli_fetch_assoc($data)) 
                                {
                                   ?>

                                <td class="text-center"><?php echo $value['cat_title'];?></td>


                                   <?php
                                }


                                ?>

                              












                                <td class="text-center"><?php echo $row['post_status'];?></td>
                                <td class="text-center"><img class = "img-responsive text-center" width="50" height="50" src="../img/<?php echo $row['post_img'];?>"></td>
                                <td class="text-center"><?php echo $row['post_comment_cont'];?></td>
                                <td class="text-center"><?php echo $row['post_date'];?></td>
                                <td>
                                    <a href="posts.php?del=<?php echo $row['post_id'];?>"><i class="fa fa-trash btn btn-danger"></i></a>
                                    <a href="posts.php?opt=edit_post&p_id=<?php echo $row['post_id'];?>"><i class="fa fa-edit btn btn-success"></i></a>

                                </td>
                                </tr>  

                                   <?php
                                }


                                ?>
                               

                                                      
                        </table>




                        <!--delete data-->
                        <?php
                            if (isset($_GET['del'])) {
                                $Del_id = $_GET['del'];
                                $sql = "DELETE FROM post WHERE post_id ='$Del_id'";
                                 $result = mysqli_query($conn,$sql);
                                 if ($result) {
                                     unlink("../img/$old");
                                     header("location:posts.php");
                                 }

                            }


                        ?>