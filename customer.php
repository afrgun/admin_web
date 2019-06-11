<?php 
    include 'header.php';
    include 'sidebar.php';
    include 'connect.php';  

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Customer
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Customer</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php 
        $delete = '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                    Data Berhasil Dihapus
                </div>';

        $tambah = '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
            Data Berhasil Ditambah
        </div>';

        $edit = '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
            Data Berhasil Diedit
        </div>';

        if (isset($_GET['pesan'])) {
            $notif = $_GET['pesan'];
            if($notif==='delete'){
                echo $delete;
            } else if($notif==='tambah'){
                echo $tambah;
            } else {
                echo $edit;
            }
        }

        ?>
      <div class="row">
        <div class="col-xs-2 mb-3">
            <a href="customer_add.php" class="btn btn-block btn-primary">Add Customer</a>
        </div>
        
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Zip Code</th>
                        <th>Province</th>
                        <th> Action </th>
                    </tr>
                </thead>

                <tbody>
                
                <?php
                        $res = mysqli_query($conn, "SELECT * from customer");

                        $return = "";
                        foreach($res as $data => $value){
                            $return .= '
                                <tr>
                                    <td>'.$value['customer_name'].'</td>
                                    <td>'.$value['email'].'</td>
                                    <td>'.$value['phone'].'</td>
                                    <td>'.$value['address'].'</td>
                                    <td>'.$value['city'].'</td>
                                    <td>'.$value['zipcode'].'</td>
                                    <td>'.$value['province'].'</td>
                                    <td>
                                        <div class="btn-action">
                                            <a href="customer_add.php?id='.$value['id_customer'].'" class="btn-cstm btn btn-block btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="deleteCustomer.php?id='.$value['id_customer'].'" class="btn-cstm btn btn-block btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            
                                        </div>
                                    </td>
                                </tr>
                            ';
                        }
                        echo $return;
                ?>

                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        
            
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  
  <?php include 'footer.php';?>

  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
        dom: 'Bfrtip',
        buttons: {
            buttons: [
            { extend: 'print', className: 'btn btn-success' },
        ]
        }
    })
  })
</script>
</body>
</html>
