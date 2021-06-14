
<?php include('include/header.php');?>

    <!-- Navigation -->
<?php include('include/nav.php');?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
      
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                  <?php

                    if(isset($_POST['submit'])){
                       $search = $_POST['search'];
                       $sql = "SELECT * FROM post WHERe post_tags LIKE '%$search%'";
                       $result = mysqli_query($conn,$sql);
                       if (mysqli_num_rows($result)) {
                        
                  while($row = mysqli_fetch_assoc($result)){
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_img = $row['post_img'];
                $post_content = $row['post_content'];
                $post_tags = $row['post_tags'];
           ?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title;?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="img/<?php echo $post_img;?>" alt="">
                <hr>
                <p><?php echo $post_content;?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

            
        <?php 
    }
}
else{
    echo "<h2>Not Found</h2>";
}
}



        ?>
        </div>
            <?php include('include/side_bar.php');?>
        <!-- /.row -->

        <hr>

         <?php include('include/footer.php');?>