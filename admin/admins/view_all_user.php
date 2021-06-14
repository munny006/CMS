<table class="table table-stripped text-center">
                            <tr>


                                <th class="text-center">ID</th>
                                <th class="text-center">User Name</th>
                                <th class="text-center">First Name</th>
                                <th class="text-center">Last Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Delete</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Admin</th>
                                <th class="text-center">Subscriber</th>

                            </tr>      
                            <tr class="text-center">
                                <?php
                                $sql = "SELECT * FROM  users";
                                $users = mysqli_query($conn, $sql);
                                while ($row= mysqli_fetch_assoc($users)) 
                                {
                                   

                       ?>

                                <td class="text-center"><?php echo $row['user_id'];?></td>
                                <td class="text-center"><?php echo $row['user_name'];?></td>
                                <td class="text-center"><?php echo $row['first_name'];?></td>
                                <td class="text-center"><?php echo $row['last_name'];?></td>
                                <td class="text-center"><?php echo $row['user_email'];?></td>
                               <td class="text-center"><?php echo $row['user_role'];?></td>
                               

                              <td><a href="users.php?del=<?php echo $row['user_id'];?>"><i class="fa fa-trash btn btn-danger"></i></a> </td>
                              <td><a href="users.php?opt=edit_user&edit_user=<?php echo $row['user_id'];?>"><i class="fa fa-pencil btn btn-warning"></i></a> </td>
                              <td><a href="users.php?admin=<?php echo $row['user_id'];?>"><i class="fa fa-user btn btn-success"></i></a> </td>
                              <td><a href="users.php?subscriber=<?php echo $row['user_id'];?>"><i class="fa fa-users btn btn-primary"></i></a> </td>
                                 </tr>  

                                   <?php
                                }


                                //delete comment
                                if (isset($_GET['del'])) 
                                {
                                  $user_del_id = $_GET['del'];
                                  $query_user = "DELETE FROM users WHERE user_id = '$user_del_id'";

                                  $user_query = mysqli_query($conn, $query_user);


                                  if ($user_query) 
                                  {
                                     header("location:users.php");
                                  }



                                }

                                //approve 

                                if (isset($_GET['admin'])) {
                                    $admin_id =$_GET['admin']; 
                                   $sql_admin = "UPDATE users SET user_role = 'admin' WHERE user_id='$admin_id'";
                                   $sql_result_admin = mysqli_query($conn,$sql_admin);
                                


                                if ($sql_result_admin) 
                                {
                                   header("location:users.php");
                                }
                            }


                                 //unapprove 

                                if (isset($_GET['subscriber'])) {
                                    $sub_id =$_GET['subscriber']; 
                                   $sql_sub = "UPDATE users SET user_role = 'subscriber' WHERE user_id='$sub_id'";
                                   $sql_subscriber = mysqli_query($conn, $sql_sub);
                                


                                if ($sql_subscriber) 
                                {
                                   header("location:users.php");
                                }
                            }
                                ?>
                               

                                                      
                        </table>




                      