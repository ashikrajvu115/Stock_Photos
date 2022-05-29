<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
 <?php
    $delpid = mysqli_real_escape_string($bd->link, $_GET['delpid']);
        if (!isset($delpid) || $delpid == NULL) {
            echo "<script>window.location = 'index.php';</script>";
            //header("location:catlist.php");
           }else{
             $deleteid=$delpid;

             $query="DELETE FROM page where id='$deleteid'";
             $delpage=$bd->delete($query);
             if ($delpage) {
             	echo "<script>alert('Page delete Successfuly');</script>";
             	echo "<script>window.location = 'index.php';</script>";
             }
             else{
             	echo "<script>alert('page not delete Successfuly');</script>";
             	echo "<script>window.location = 'index.php';</script>";
             }
        }
    ?>


<?php include 'inc/footer.php';?>