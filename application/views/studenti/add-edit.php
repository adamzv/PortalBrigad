<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Študenti</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Domov</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo site_url('studenti/'); ?>">Študenti</a></li>
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
          echo form_open('studenti/edit/' . $post['idstudenti']);
        } else {
          echo form_open('studenti/add/');
        } ?>
        <div class="card-body">
          <?php if (validation_errors()) {
            echo '<div class="alert alert-danger">' . validation_errors() . '</div>';
          } ?>
          <div class="form-group">
            <label for="meno">Meno:</label>
            <input type="text" class="form-control" id="meno" name="meno" value="<?php echo !empty($post['meno']) ? $post['meno'] : set_value('meno'); ?>">
          </div>
          <div class="form-group">
            <label for="priezvisko">Priezvisko:</label>
            <input type="text" class="form-control" id="priezvisko" name="priezvisko" value="<?php echo !empty($post['priezvisko']) ? $post['priezvisko'] : set_value('priezvisko'); ?>">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-at"></i></span>
              </div>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo !empty($post['email']) ? $post['email'] : set_value('email'); ?>">
            </div>
          </div>
          <div class="form-group">
            <label>Tel. číslo:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-phone"></i></span>
              </div>
              <input type="text" class="form-control" data-inputmask="'mask': '+421 999 999 999'" name="telefon" id="telefon" value="<?php echo !empty($post['telefon']) ? $post['telefon'] : set_value('telefon'); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="vzdelanie">Vzdelanie:</label>
            <input type="text" class="form-control" id="vzdelanie" name="vzdelanie" value="<?php echo !empty($post['vzdelanie']) ? $post['vzdelanie'] : ''; ?>">
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