<?php 
    include 'connect.php';

    $id = $_GET['id'];

    //mysqli_query("DELETE FROM user WHERE id='$id'")or die(mysql_error());
    $res = mysqli_query($conn, "DELETE FROM customer WHERE id_customer='$id'");
            
    //header("location:index.php?pesan=hapus");

    if($res){
        //echo $successAlert;
        header("Location:customer.php?pesan=delete");
    } else {
        echo "gagal";
    }
?>