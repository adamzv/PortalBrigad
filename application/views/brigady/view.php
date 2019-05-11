<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Detail brigády</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo site_url('brigady/'); ?>">Brigády</a></li>
            <li class="breadcrumb-item active">Detail brigády</li>
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
      <section class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header d-flex p-0">
            <h3 class="card-title p-3">
              <i class="fa fa-user mr-1"></i>
              <?php echo !empty($brigada['nazov']) ? $brigada['nazov'] : 'Žiadny názov'; ?>
            </h3>
            <ul class="nav nav-pills ml-auto p-2">
              <li class="nav-item"><a class="nav-link active" href="<?php echo site_url('brigady/') ?>"><i class="fa fa-arrow-left"></i></a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo site_url('brigady/edit/' . $brigada['idbrigady']); ?>"><i class="fa fa-edit"></i></a></li>
            </ul>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <dl>
              <dt>#ID</dt>
              <dd><?php echo !empty($brigada['idbrigady']) ? $brigada['idbrigady'] : ''; ?></dd>
              <dt>Názov brigády</dt>
              <dd><?php echo !empty($brigada['nazov']) ? $brigada['nazov'] : ''; ?></dd>
              <dt>Zamestnávateľ</dt>
              <dd><?php echo !empty($brigada['zamestnavatel']) ? $brigada['zamestnavatel'] : ''; ?></dd>
              <dt>Hodinová mzda</dt>
              <dd><?php echo !empty($brigada['hod_mzda']) ? $brigada['hod_mzda'] . '€' : ''; ?></dd>
              <dt>Nástup od</dt>
              <dd><?php echo !empty($brigada['od']) ? date('d.m.Y', strtotime($brigada['od'])) : ''; ?></dd>
              <dt>Aktívna</dt>
              <dd><?php if (!empty($brigada['aktivna'])) {
                    if ($brigada['aktivna'] == 1) {
                      echo 'aktuálna';
                    } else {
                      echo 'neuaktuálna';
                    }
                  } else {
                    echo '';
                  } ?></dd>
              <dt>Popis</dt>
              <dd><?php echo !empty($brigada['popis']) ? $brigada['popis'] : ''; ?></dd>
            </dl>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- Main row -->

        </div>
    </div>
</div>
</section>