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
                        <?php

                        if (isset($_GET['opt'])) {
                           $opt = $_GET['opt'];
                        }
                        else{
                            $opt = '';
                        }
                        switch ($opt) {
                            case 'add_user':
                                include('admins/adduser.php');
                                break;
                             case 'edit_user':
                              include('admins/edit_user.php');
                                break;
                                   
                            default:
                             include('admins/view_all_user.php');
                                break;
                        }


                        ?>
                        
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
   