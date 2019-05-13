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
          echo form_open('brigady/edit/' . $post['idbrigady']);
        } else {
          echo form_open('brigady/add/');
        } ?>
        <div class="card-body">
          <?php if (validation_errors()) {
            echo '<div class="alert alert-danger">' . validation_errors() . '</div>';
          } ?>
          <div class="form-group">
            <label for="nazov">Názov ponuky:</label>
            <input type="text" class="form-control" id="nazov" name="nazov" value="<?php echo !empty($post['nazov']) ? $post['nazov'] : set_value('nazov'); ?>">
          </div>
          <div class="form-group">
            <label for="popis">Popis:</label>
            <textarea rows="10" class="form-control" id="popis" name="popis"><?php echo !empty($post['popis']) ? $post['popis'] : set_value('popis'); ?></textarea>
          </div>
          <div class="form-group">
            <label for="hod_mzda">Hodinová mzda:</label>
            <input type="text" class="form-control" id="hod_mzda" name="hod_mzda" value="<?php echo !empty($post['hod_mzda']) ? $post['hod_mzda'] : set_value('hod_mzda'); ?>">
          </div>
          <div class="form-group">
            <label>Nástup od:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
              </div>
              <input type="date" class="form-control" name="od" id="od" value="<?php echo !empty($post['od']) ? $post['od'] : set_value('od'); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="vzdelanie">Aktívna:</label>
            <select name="aktivna" id="aktivna" class="form-control">
              <option value="1" <?php echo !empty($post['aktivna']) && $post['aktivna'] == 1 ? 'selected' : ''; ?>>aktuálna</option>
              <option value="0" <?php echo !empty($post['aktivna']) && $post['aktivna'] == 0 ? 'selected' : ''; ?>>neaktuálna</option>
            </select>
          </div>
          <div class="form-group">
            <label>Zamestnávateľ:</label>
            <select name="zamestnavatel" id="zamestnavatel" class="form-control">
              <?php if ($action == 'Editovať') {
                if (!empty($post['idzamestnavatelia'])) {
                  foreach ($zamestnavatelia as $zamestnavatel) {
                    if ($zamestnavatel['id'] === $post['idzamestnavatelia']) {
                      echo '<option value="' . $zamestnavatel['id'] . '" selected>' . $zamestnavatel['nazov'] . '</option>';
                    } else {
                      echo '<option value="' . $zamestnavatel['id'] . '">' . $zamestnavatel['nazov']  . '</option>';
                    }
                  }
                }
              } else {
                if (!empty($zamestnavatelia)) {
                  foreach ($zamestnavatelia as $zamestnavatel) {
                    echo '<option value="' . $zamestnavatel['id'] . '">' . $zamestnavatel["nazov"] . '</option>';
                  }
                }
              } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Kategória:</label>
            <select name="kategoria" id="kategoria" class="form-control">
              <?php if ($action == 'Editovať') {
                if (!empty($post['idkategorie'])) {
                  foreach ($kategorie as $kategoria) {
                    if ($kategoria['idkategorie'] === $post['idkategorie']) {
                      echo '<option value="' . $kategoria['idkategorie'] . '" selected>' . $kategoria['kategoria'] . '</option>';
                    } else {
                      echo '<option value="' . $kategoria['idkategorie'] . '">' . $kategoria['kategoria']  . '</option>';
                    }
                  }
                }
              } else {
                if (!empty($kategorie)) {
                  foreach ($kategorie as $kategoria) {
                    echo '<option value="' . $kategoria['idkategorie'] . '">' . $kategoria['kategoria'] . '</option>';
                  }
                }
              } ?>
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