<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
 <?php
     $deletpostid = mysqli_real_escape_string($bd->link, $_GET['deletpostid']);
        if (!isset($deletpostid) || $deletpostid == NULL) {
            echo "<script>window.location = 'index.php';</script>";
            //header("location:catlist.php");
           }else{
             $postid=$deletpostid;

             $query="DELETE FROM tbl_post where id='$postid'";
             $deldata=$bd->delete($query);
             if ($deldata) {
             	echo "<script>alert('Data delete Successfuly');</script>";
             	echo "<script>window.location = 'index.php';</script>";
             }
             else{
             	echo "<script>alert('Data not delete Successfuly');</script>";
             	echo "<script>window.location = 'index.php';</script>";
             }
        }
    ?>


<?php include 'inc/footer.php';?>