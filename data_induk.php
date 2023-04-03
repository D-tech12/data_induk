<?php 
include_once('sidbar.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $nama ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini">
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <?php if($nama=="Ahmad"){ ?>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <table>
                <?php 
                $resultjumlah = mysqli_query($config, "SELECT count(*) as Jumlah from data");
                $jdata = $resultjumlah->fetch_assoc();
                $resultasal = mysqli_query($config, "SELECT count(*) as Asal from data WHERE asal = 'maroko'");
                $jasal = $resultasal->fetch_assoc();
                $resultasalkalbar = mysqli_query($config, "SELECT count(*) as Asal from data WHERE asal = 'kalbar'");
                $jasalkalbar = $resultasalkalbar->fetch_assoc();
                $resultasalkalteng = mysqli_query($config, "SELECT count(*) as Asal from data WHERE asal = 'kalteng'");
                $jasalkalteng = $resultasalkalteng->fetch_assoc();
                $resultasalmars = mysqli_query($config, "SELECT count(*) as Asal from data WHERE asal = 'mars'");
                $jasalmars = $resultasalmars->fetch_assoc();
                $resultasaljatim = mysqli_query($config, "SELECT count(*) as Asal from data WHERE asal = 'jatim'");
                $jasaljatim = $resultasaljatim->fetch_assoc();
                $resultasaljabar = mysqli_query($config, "SELECT count(*) as Asal from data WHERE asal = 'jabar'");
                $jasaljabar = $resultasaljabar->fetch_assoc();
                ?>
              </table>
              <h3><?= $jasaljabar['Asal'] ?>orang</h3>
              <p>santri jabar</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box <?php if($nama!='Ahmad'){echo"bg-primary";}else{echo"bg-success";} ?>">
            <div class="inner">
              <h3><?= $jasalkalbar['Asal'] ?> Orang</h3>
              <p>Santri Kalbar</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?= $jasaljatim['Asal'] ?> Orang</h3>
              <p>Santri Jatim</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?= $jasalkalteng['Asal'] ?> Orang</h3>
              <p>Santri Kalteng</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      <?php } ?>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Induk</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <td>no</td>
                  <td>id siswa</td>
                  <td>password</td>
                  <td>nama lengkap</td>
                  <td>kamar</td>
                  <td>kelas</td>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no=0;
                $result = mysqli_query($config, "SELECT * FROM data_siswa inner join user on data_siswa.id_siswa=user.id_siswa inner join data_kamar on data_siswa.id_siswa=data_kamar.id_siswa inner join data_kelas_diniyah on data_siswa.id_siswa=data_kelas_diniyah.id_siswa ");
                while($data = mysqli_fetch_array($result)){
                  $no++;
                  ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $data['id_siswa'] ?></td>
                    <td><?= $data['password'] ?></td>
                    <td><?= $data['nama_siswa'] ?></td>
                    <td><?= $data['kamar'] ?></td>
                    <td><?= $data['kelas'] ?></td>
                    <td><a href="insert.php?delete&id=<?= $data['id'] ?>" class="btn btn-warning">Hapus</a><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit<?= $data['id'] ?>">edit</a></td>
                  </tr>
                  <div class="modal fade" id="edit<?= $data['id'] ?>">
                    <div class="modal-dialog">
                      <div class="modal-content bg-primary">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Data</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          </div>
                          <form action="insert.php" method="post">
                            <div class="modal-body">
                              <input type="hidden" name="antrian" value="<?= $data['antrian'] ?>">
                              <label>Nama</label>
                              <input type="text" name="nama" value="<?= $data['nama'] ?>" required ><br><br>
                              <label>Kelas</label>
                              <input type="text" name="kelas" value="<?= $data['kelas'] ?>" required ><br><br>
                              <label>Asal</label>
                              <select name="asal" value="<?= $data['asal'] ?>" required >
                                <option value="">pilih</option>
                                <option value="maroko">Maroko</option>
                                <option value="kalbar">Kalbar</option>
                                <option value="kalteng">Kalteng</option>
                                <option value="mars">Mars</option>
                                <option value="jatim">Jatim</option>
                                <option value="jabar">Jabar</option>
                              </select><br><br>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              <button type="submit" name="edit" class="btn btn-success">Save changes</button>
                            </div>
                          </form>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <?php if($nama=="Ahmad"){ ?>
               <table id="example1" class="table table-bordered table-striped">
                <tbody>
                  <?php 
                  $resultjumlah = mysqli_query($config, "SELECT count(*) as Jumlah from data");
                  $jdata = $resultjumlah->fetch_assoc();
                  $resultasal = mysqli_query($config, "SELECT count(*) as Asal from data WHERE asal = 'maroko'");
                  $jasal = $resultasal->fetch_assoc();
                  $resultasalkalbar = mysqli_query($config, "SELECT count(*) as Asal from data WHERE asal = 'kalbar'");
                  $jasalkalbar = $resultasalkalbar->fetch_assoc();
                  $resultasalkalteng = mysqli_query($config, "SELECT count(*) as Asal from data WHERE asal = 'kalteng'");
                  $jasalkalteng = $resultasalkalteng->fetch_assoc();
                  $resultasalmars = mysqli_query($config, "SELECT count(*) as Asal from data WHERE asal = 'mars'");
                  $jasalmars = $resultasalmars->fetch_assoc();
                  $resultasaljatim = mysqli_query($config, "SELECT count(*) as Asal from data WHERE asal = 'jatim'");
                  $jasaljatim = $resultasaljatim->fetch_assoc();
                  $resultasaljabar = mysqli_query($config, "SELECT count(*) as Asal from data WHERE asal = 'jabar'");
                  $jasaljabar = $resultasaljabar->fetch_assoc();
                  ?>
                  <tr>
                    <td>Jumlah</td>
                    <td>=</td>
                    <td><?= $jdata['Jumlah'] ?></td>
                  </tr>
                  <tr>
                    <td>Jumlah Santri Maroko</td>
                    <td>=</td>
                    <td><?= $jasal['Asal'] ?> Orang</td>
                  </tr>
                  <tr>
                    <td>Jumlah Santri Kalbar</td>
                    <td>=</td>
                    <td><?= $jasalkalbar['Asal'] ?> Orang</td>
                  </tr>
                  <tr>
                    <td>Jumlah Santri Kalteng</td>
                    <td>=</td>
                    <td><?= $jasalkalteng['Asal'] ?> Orang</td>
                  </tr>
                  <tr>
                    <td>Jumlah Santri Mars</td>
                    <td>=</td>
                    <td><?= $jasalmars['Asal'] ?> Orang</td>
                  </tr>
                  <tr>
                    <td>Jumlah Santri Jatim</td>
                    <td>=</td>
                    <td><?= $jasaljatim['Asal'] ?> Orang</td>
                  </tr>
                  <tr>
                    <td>Jumlah Santri Jabar</td>
                    <td>=</td>
                    <td><?= $jasaljabar['Asal'] ?> Orang</td>
                  </tr>
                  <tr>
                    <td>Jumlah Santri Maroko,Kalbar,Kalteng,Mars,Jatim dan Jabar</td>
                    <td>=</td>
                    <td><?= intval($jasal['Asal']+$jasalkalbar['Asal']+$jasalkalteng['Asal']+$jasalmars['Asal']+$jasaljatim['Asal']+$jasaljabar['Asal']) ?> Orang</td>
                  </tr>
                </table>
              </tbody>
            </div>
          <?php } ?>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.4
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="ist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>
</html>
