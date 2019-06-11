 <?php 
        include 'connect.php';

        $name   = $_POST['nama'];
        $phone  = $_POST['phone'];
        $email  = $_POST['email'];
        $address    = $_POST['address'];
        $city   = $_POST['city'];
        $province   = $_POST['province'];
        $zipcode    = $_POST['zipcode'];

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $res = mysqli_query($conn, "update customer SET id_customer='$id', customer_name='$name', address='$address', province='$province', city='$city', zipcode='$zipcode', phone='$phone', email='$email' WHERE id_customer='$id'");
        } else {
            $res = mysqli_query($conn, "insert into customer values (NULL, '$name', '$address', '$province', '$city', '$zipcode', '$phone', '$email')");          
        }
        
        if($res){
            if(isset($_GET['id'])){
                header("Location:customer.php?pesan=edit");
            } else {
                header("Location:customer.php?pesan=tambah");
            }
        } else {
            echo "gagal";
        }
?>