<!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>

                    
                    <form action="search.php" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                     <!-- Login form -->
                <div class="well">
                    <h2>Login</h2>
                   <form action="include/login.php" method="POST">
                    <input type="text" name="username" class="form-control" placeholder="username"><br>
                    <input type="password" name="password" class="form-control" placeholder="password"><br>
                   <span class="input-group-btn">
                            <button class="btn btn-warning"  name="btn_login" type="submit">
                               Login
                        </button>
                       </span>
                   </form>
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                 <?php

                    $query = "SELECT * FROM category";
                    $result = mysqli_query($conn,$query);
                    while ($row = mysqli_fetch_assoc($result)) {
                         $cat_id = $row['cat_id'];
                      $cat_title = $row['cat_title'];
                      echo " <li>
                        <a href='category.php?category={$cat_id}'>{$cat_title}</a>
                    </li>";
                    }

                    ?>
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>
             


                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>