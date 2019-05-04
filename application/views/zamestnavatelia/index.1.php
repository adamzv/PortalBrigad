<div class="container">
    <?php if(!empty($success_msg)){ ?>
        <div class="col-xs-12">
            <div class="alert alert-success"><?php echo $success_msg; ?></div>
        </div>
    <?php }elseif(!empty($error_msg)){ ?>
        <div class="col-xs-12">
            <div class="alert alert-danger"><?php echo $error_msg; ?></div>
        </div>
    <?php } ?>
    <div class="row">
        <h1>Zamestnávatelia</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default ">
                <div class="panel-heading">Zamestnávatelia <a href="<?php echo site_url('zamestnavatelia/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th width="20%">Názov</th>
                        <th width="20%">Adresa</th>
                        <th width="20%">Email</th>
                        <th width="20%">Telefón</th>
                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php if(!empty($zamestnavatelia)): foreach($zamestnavatelia as $zamestnavatel): ?>
                        <tr>
                            <td><?php echo '#'.$zamestnavatel['id']; ?></td>
                            <td><?php echo $zamestnavatel['nazov']; ?></td>
                            <td><?php echo $zamestnavatel['adresa']; ?></td>
                            <td><?php echo $zamestnavatel['email']; ?></td>
                            <td><?php echo $zamestnavatel['telefon']; ?></td>
                            <td>
                                <a href="<?php echo site_url('zamestnavatelia/view/'.$zamestnavatel['id']); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('zamestnavatelia/edit/'.$zamestnavatel['id']); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('zamestnavatelia/delete/'.$zamestnavatel['id']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="4">Žiadny zamestnávatelia ......</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>