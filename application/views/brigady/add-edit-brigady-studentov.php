<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Brigády</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Domov</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo site_url('brigady/'); ?>">Brigády</a></li>
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
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?php echo $title; ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <?php if ($action == 'Editovať') {
          echo form_open('brigady/editbrigada/' . $post['id']);
        } else {
          echo form_open('brigady/addbrigada/');
        } ?>
        <div class="card-body">
          <?php if (validation_errors()) {
            echo '<div class="alert alert-danger">' . validation_errors() . '</div>';
          } ?>
          <div class="form-group">
            <label for="nazov">Brigáda:</label>
            <select name="brigada" id="brigada" class="form-control">
              <?php if ($action == 'Editovať') {
                if (!empty($post['idbrigady'])) {
                  foreach ($brigady as $brigada) {
                    if ($brigada['idbrigady'] === $post['idbrigady']) {
                      echo '<option value="' . $brigada['idbrigady'] . '" selected>' . $brigada['nazov'] . ' | ' . $brigada['zamestnavatel'] . '</option>';
                    } else {
                      echo '<option value="' . $brigada['idbrigady'] . '">' . $brigada['nazov']  . ' | ' . $brigada['zamestnavatel'] . '</option>';
                    }
                  }
                }
              } else {
                if (!empty($brigady)) {
                  foreach ($brigady as $brigada) {
                    echo '<option value="' . $brigada['idbrigady'] . '">' . $brigada['nazov']  . ' | ' . $brigada['zamestnavatel'] . '</option>';
                  }
                }
              } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="student">Študent:</label>
            <select name="student" id="student" class="form-control">
              <?php if ($action == 'Editovať') {
                if (!empty($post['idstudenti'])) {
                  foreach ($studenti as $student) {
                    if ($student['idstudenti'] === $post['idstudenti']) {
                      echo '<option value="' . $student['idstudenti'] . '" selected>' . $student['meno'] . ' ' . $student['priezvisko'] . '</option>';
                    } else {
                      echo '<option value="' . $student['idstudenti'] . '">' . $student['meno'] . ' ' . $student['priezvisko']  . '</option>';
                    }
                  }
                }
              } else {
                if (!empty($studenti)) {
                  foreach ($studenti as $student) {
                    echo '<option value="' . $student['idstudenti'] . '">' . $student['meno'] . ' ' . $student['priezvisko'] . '</option>';
                  }
                }
              } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="doh_hod_mzda">Dohodnutá hodinová mzda:</label>
            <input type="text" class="form-control" id="doh_hod_mzda" name="doh_hod_mzda" value="<?php echo !empty($post['doh_hod_mzda']) ? $post['doh_hod_mzda'] : set_value('doh_hod_mzda'); ?>">
          </div>
          <div class="form-group">
            <label for="provizia">Provízia:</label>
            <input type="text" class="form-control" id="provizia" name="provizia" value="<?php echo !empty($post['provizia']) ? $post['provizia'] : set_value('provizia'); ?>">
          </div>
          <div class="form-group">
            <label>Nástup:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
              </div>
              <input type="date" class="form-control" name="nastup" id="nastup" value="<?php echo !empty($post['nastup']) ? $post['nastup'] : set_value('nastup'); ?>">
            </div>
          </div>
          <div class="form-group">
            <label>Ukončenie:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
              </div>
              <input type="date" class="form-control" name="ukoncenie" id="ukoncenie" value="<?php echo !empty($post['ukoncenie']) ? $post['ukoncenie'] : set_value('ukoncenie'); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="vzdelanie">Aktívna:</label>
            <select name="aktivna" id="aktivna" class="form-control">
              <option value="1" <?php echo !empty($post['aktivna']) && $post['aktivna'] == 1 ? 'selected' : ''; ?>>aktuálna</option>
              <option value="0" <?php echo !empty($post['aktivna']) && $post['aktivna'] == 0 ? 'selected' : ''; ?>>neaktuálna</option>
            </select>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <input type="submit" name="postSubmit" class="btn btn-primary" value="<?php echo $action; ?>">
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </section>
</div>