<table class="table table-stripped text-center">
                            <tr>


                                <th class="text-center">ID</th>
                                <th class="text-center">Author</th>
                                <th class="text-center">Comment</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Response To</th>
                                <th class="text-center">Approve</th>
                                <th class="text-center">UnApprove</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Operation</th>

                            </tr>      
                            <tr class="text-center">
                                <?php
                                $sql = "SELECT * FROM  comment";
                                $comments = mysqli_query($conn, $sql);
                                while ($row= mysqli_fetch_assoc($comments)) 
                                {
                                    $comment_id = $row['comment_id'];
                                  $comment_post_id = $row['comment_post_id'];

                       ?>

                                <td class="text-center"><?php echo $row['comment_id'];?></td>
                                <td class="text-center"><?php echo $row['comment_author'];?></td>
                                <td class="text-center"><?php echo $row['comment_content'];?></td>
                                <td class="text-center"><?php echo $row['comment_email'];?></td>
                                <td class="text-center"><?php echo $row['comment_status'];?></td>



                                <?php
                                $query = "SELECT * FROM post WHERE post_id ='$comment_post_id'";
                                $result = mysqli_query($conn,$query);


                                while ($value = mysqli_fetch_assoc($result)) 
                                {
                                  $post_id = $value['post_id'];
                                  $post_title  = $value['post_title']; 

                                  ?>

                                   <td><a href="../post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title;?></a></td>
                              
                                <td><a href="comments.php?approve=<?php echo $comment_id;?>">Approve</a></td>
                                <td><a href="comments.php?unapprove=<?php echo $comment_id;?>">UnApprove</a></td>

                                <?php
                            }
                                ?>

                                <td class="text-center"><?php echo $row['comment_date'];?></td>
                                <td>
                                    <a href="comments.php?del=<?php echo $comment_id;?>"><i class="fa fa-trash btn btn-danger"></i></a> </td>
                                 </tr>  

                                   <?php
                                }


                                //delete comment
                                if (isset($_GET['del'])) 
                                {
                                  $comment_id = $_GET['del'];
                                  $query_comment = "DELETE FROM comment WHERE comment_id = '$comment_id'";

                                  $comment_query = mysqli_query($conn,$query_comment);


                                  if ($comment_query) 
                                  {
                                     header("location:comments.php");
                                  }



                                }

                                //approve 

                                if (isset($_GET['approve'])) {
                                    $cmt_id =$_GET['approve']; 
                                   $sql_Comment = "UPDATE comment SET comment_status = 'approve' WHERE comment_id='$cmt_id'";
                                   $sql_result = mysqli_query($conn,$sql_Comment);
                                


                                if ($sql_result) 
                                {
                                   header("location:comments.php");
                                }
                            }


                                 //unapprove 

                                if (isset($_GET['unapprove'])) {
                                    $cmt_id =$_GET['unapprove']; 
                                   $sql_Comment = "UPDATE comment SET comment_status = 'unapprove' WHERE comment_id='$cmt_id'";
                                   $sql_result = mysqli_query($conn,$sql_Comment);
                                


                                if ($sql_result) 
                                {
                                   header("location:comments.php");
                                }
                            }
                                ?>
                               

                                                      
                        </table>




                      