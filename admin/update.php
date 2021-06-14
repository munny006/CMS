<?php
 include('./admins/header.php');

if (isset($_POST['btn_edit_submit'])) 
{
	$up_id = $_POST['edit_id'];
	$up_cat = $_POST['edit_category'];

	$query= "UPDATE category SET cat_title = '$up_cat' WHERE cat_id ='$up_id'";
	 $add = mysqli_query($conn,$query);
	if ($add) 
	{
		
		header("location:category.php");
		echo '<p class ="alert alert-success"> Your Category Has been Updated </p>';
	}
	else{
		echo "Query Filed!";
	}

}



?>