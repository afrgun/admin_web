<?php include 'header.php';
    include 'sidebar.php';
    include 'connect.php';

    $title = "Add Customer";

    if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$update = true;
		$record = mysqli_query($conn, "SELECT * FROM customer WHERE id_customer='$id'");

		if (count($record) == 1 ) {
			$get = mysqli_fetch_array($record);
			
            $name   = $get['customer_name'];
            $phone  = $get['phone'];
            $email  = $get['email'];
            $address    = $get['address'];
            $city   = $get['city'];
            $province   = $get['province'];
            $zipcode    = $get['zipcode'];
            
            $title = "Edit Customer";
        } 
        
	}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Customer</a></li>
        <li class="active">Add Customer</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
         
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- <form method="post" action="addCustomer.php"> -->

            <?php
                if (isset($_GET['id'])) {
                    echo '<form method="post" action="addCustomer.php?id='.$id.'">';                    
                } else {
                    echo '<form method="post" action="addCustomer.php">';                    
                }
            ?>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Customer Name</label>
                                <input type="text" class="form-control" name="nama" placeholder="Customer name" value="<?php echo $name;?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="number" class="form-control" name="phone" placeholder="Phone" value="<?php echo $phone; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <textarea rows="5" class="form-control" name="address"><?php echo $address; ?></textarea>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">City</label>
                                <input type="text" class="form-control" name="city" placeholder="City" value="<?php echo $city; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Province</label>
                                <input type="text" class="form-control" name="province" placeholder="Province" value="<?php echo $province; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Zip Code</label>
                                <input type="number" class="form-control" name="zipcode" placeholder="Zipcode" value="<?php echo $zipcode; ?>">
                            </div>
                        </div>
                    </div>
                
                </div>
              <!-- /.box-body -->

                <div class="box-footer">
                    <input type="submit" name="addCustomer" class="btn btn-primary" value="Submit"/>
                    <a href="customer.php" class="btn btn-warning">Cancel</a>
                </div>

                <?php 
                    // if(isset($_POST['addCustomer'])){
                    //     header("location: customer.php");
                    //     exit;
                    //     // $name   = $_POST['nama'];
                    //     // $phone  = $_POST['phone'];
                    //     // $email  = $_POST['email'];
                    //     // $address    = $_POST['address'];
                    //     // $city   = $_POST['city'];
                    //     // $province   = $_POST['province'];
                    //     // $zipcode    = $_POST['zipcode'];

                    //     // $res = mysqli_query($conn, "insert into customer values (NULL, '$name', '$address', '$province', '$city', '$zipcode', '$phone', '$email')");
                        
                    //     // if($res){
                    //     //     header("Location:customer.php");
                    //     // } else {
                    //     //     echo "gagal";
                    //     // }
                    // }    
                ?>
            </form>
          </div>
          

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>


 <?php include 'footer.php';?>

</div>


<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>