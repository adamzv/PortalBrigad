<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Domov</a></li>
            <li class="breadcrumb-item">Dashboard</li>
          </ol>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-building"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Počet zamestnávateľov</span>
              <span class="info-box-number"><?php echo $pocet_zamestnavatelov['pocet']; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-briefcase"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Počet ponúk</span>
              <span class="info-box-number"><?php echo $pocet_ponuk['pocet']; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Počet študentov</span>
              <span class="info-box-number"><?php echo $pocet_studentov['pocet']; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <section class="col-lg-7 connectedSortable ui-sortable">
          <div class="card card-success card-outline">
            <div class="card-header d-flex p-0">
              <h3 class="card-title p-3">
                Počet brigád za mesiac v roku 2019
              </h3>
            </div>
            <div class="card-body">
              <div id="graph">

                <script>
                  var mesiace = ["Január", "Február", "Marec", "Apríl", "Máj", "Jún", "Júl", "August", "September", "Október", "November", "December"];

                  var bar = Morris.Area({
                    element: 'graph',
                    resize: true,
                    data: <?php echo $graf_kategorie; ?>,
                    xkey: 'mesiac',
                    ykeys: ['pocet'],
                    labels: ['Počet'],
                    barColors: ['#28a745'],
                    parseTime: false,
                    hideHover: 'auto',
                    xLabelFormat: function(x) {
                      var index = parseInt(x.src.mesiac);
                      return mesiace[index - 1];
                    },
                  });
                </script>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </section>
      </div>
      <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->