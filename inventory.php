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
        Data Inventory
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Inventory</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-2 mb-3">
            <a href="inventory_add.php" class="btn btn-block btn-primary">Add Inventory</a>
        </div>
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Initial</th>
                        <th>Count</th>
                        <th>Check in Date</th>
                        <th> Action </th>
                    </tr>
                </thead>

                <tbody>
                
                <?php
                        $res = mysqli_query($conn, "SELECT * from inventory");

                        $return = "";
                        foreach($res as $data => $value){
                            $return .= '
                                <tr>
                                    <td>'.$value['name'].'</td>
                                    <td>'.$value['initial'].'</td>
                                    <td>'.$value['count'].'</td>
                                    <td>'.$value['checkin_date'].'</td>
                                    <td>
                                        <div class="btn-action">
                                            <a href="inventory_add.php?id='.$value['id_inventory'].'" class="btn-cstm btn btn-block btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="deleteInventory.php?id='.$value['id_inventory'].'" class="btn-cstm btn btn-block btn-danger">
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
<script src="bower_components/fastclick/lib/fastclick.js"></script>
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
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
