<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Zamestnávatelia</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Domov</a></li>
            <li class="breadcrumb-item active">Zamestnávatelia</li>
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
          <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" role="form" action="<?php echo site_url('zamestnavatelia/edit/' . $post['id']); ?>">
          <div class="card-body">
            <?php
            if (!empty($success_msg)) {
              echo '<div class="alert alert-success">' . $success_msg . '</div>';
            } elseif (!empty($error_msg)) {
              echo '<div class="alert alert-danger">' . $error_msg . '</div>';
            }
            ?>
            <div class="form-group">
              <label for="nazov">Názov zamestnávateľa:</label>
              <input type="text" class="form-control" id="nazov" name="nazov" value="<?php echo $post['nazov']; ?>">
            </div>
            <div class="form-group">
              <label for="adresa">Adresa</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                </div>
                <input type="text" class="form-control" id="adresa" name="adresa" value="<?php echo $post['adresa']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-at"></i></span>
                </div>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $post['email']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label>Tel. číslo:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                <input type="text" class="form-control" data-inputmask="'mask': '+421 ### ### ###'" name="telefon" id="telefon" value="<?php echo $post['telefon']; ?>">
              </div>
              <!-- /.input group -->
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" name="postSubmit" class="btn btn-primary"><?php echo $action; ?></button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>