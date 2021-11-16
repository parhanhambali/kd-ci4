<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Status<button type="button"
                    class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#add">Tambah Data
                    Status</button></h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php 
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Success ';
                    echo session()->getFlashdata('pesan');
                    echo '</h4></div>';
                }
                ?>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Status</th>
                        <th width="200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                        foreach ($status as $key => $value) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $value['status_name']; ?></td>
                        <td>
                            <button class="btn btn-sm btn-warning" data-toggle="modal"
                                data-target="#edit<?= $value['status_id']; ?>">Edit</button>
                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#delete<?= $value['status_id']; ?>">Hapus</button>
                        </td>
                    </tr>
                    <?php }  ?>
                </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Tambah Status</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <?php echo form_open('status/add') ?>

                <div class="form-group">
                    <label for="">Status</label>
                    <input type="text" name="status_name" class="form-control" placeholder="Tambah Status Disini ..."
                        required>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Modal Add -->

<!-- Modal Edit status -->
<?php foreach ($status as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['status_id']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Status</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('status/edit/' . $value['status_id']) ?>

                <div class="form-group">
                    <label for="">Edit Status</label>
                    <input type="text" name="status_name" value="<?= $value['status_name']; ?>" class="form-control"
                        placeholder="status" required>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>

<!-- Modal Delete status -->
<?php foreach ($status as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['status_id']; ?>">
    <div class="modal-dialog modal-danger">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Status</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Menghapus <?= $value['status_name']; ?> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                <a href="<?= base_url('status/delete/'. $value['status_id']) ?>" class="btn btn-danger">Hapus </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>