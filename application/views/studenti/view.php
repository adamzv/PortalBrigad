<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Detail študenta</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo site_url('studenti/'); ?>">Študenti</a></li>
            <li class="breadcrumb-item active">Detail študenta</li>
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
              <?php echo !empty($student['meno']) && !empty($student['priezvisko']) ? $student['meno'] . ' ' . $student['priezvisko'] : 'Žiadne meno'; ?>
            </h3>
            <ul class="nav nav-pills ml-auto p-2">
              <li class="nav-item"><a class="nav-link active" href="<?php echo site_url('studenti/') ?>"><i class="fa fa-arrow-left"></i></a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo site_url('studenti/edit/' . $student['idstudenti']); ?>"><i class="fa fa-edit"></i></a></li>
            </ul>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <dl>
              <dt>#ID</dt>
              <dd><?php echo !empty($student['idstudenti']) ? $student['idstudenti'] : ''; ?></dd>
              <dt>Meno</dt>
              <dd><?php echo !empty($student['meno']) ? $student['meno'] : ''; ?></dd>
              <dt>Priezvisko</dt>
              <dd><?php echo !empty($student['priezvisko']) ? $student['priezvisko'] : ''; ?></dd>
              <dt>Email</dt>
              <dd><?php echo !empty($student['email']) ? $student['email'] : ''; ?></dd>
              <dt>Telefón</dt>
              <dd><?php echo !empty($student['telefon']) ? $student['telefon'] : ''; ?></dd>
              <dt>Vzdelanie</dt>
              <dd><?php echo !empty($student['vzdelanie']) ? $student['vzdelanie'] : ''; ?></dd>
            </dl>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- Main row -->

        </div>
    </div>
</div>
</section>