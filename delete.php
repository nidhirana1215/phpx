<?php
$cn=mysqli_connect("localhost","root","","electronics");
if(isset($_REQUEST['id']))
{
    $pid=$_REQUEST['id'];
    $query="delete from product where pro_id=$pid";
    $result=mysqli_query($cn,$query);
    header('location:product.php');
    echo "<script> alert('Product Deleted...')</script>";
}
?>