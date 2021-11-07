<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tahun<button type="button"
                    class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#add">Tambah Data
                    Tahun</button></h6>
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
                        <th>Tahun</th>
                        <th width="200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                        foreach ($year as $key => $value) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $value['year_name']; ?></td>
                        <td>
                            <button class="btn btn-sm btn-warning" data-toggle="modal"><a
                                    href="<?= base_url('direction/',$year_id) ?>"> Detail</a></button>
                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#delete<?= $value['year_id']; ?>">Delete</button>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Tahun</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('year/add') ?>

                <div class="form-group">
                    <label for="">Year</label>
                    <input type="text" name="year_name" class="form-control" placeholder="Tahun" required>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>
<!-- Modal Add -->

<!-- Modal Edit year -->
<?php foreach ($year as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['year_id']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <h4 class="modal-title">Edit Tahun</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('year/edit/' . $value['year_id']) ?>

                <div class="form-group">
                    <label for="">Tahun</label>
                    <input type="text" name="year_name" value="<?= $value['year_name']; ?>" class="form-control"
                        placeholder="Tahun" required>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>

<!-- Modal Delete year -->
<?php foreach ($year as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['year_id']; ?>">
    <div class="modal-dialog modal-danger">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Tahun</h4>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Menghapus Data Tahun<?= $value['year_name']; ?> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                <a href="<?= base_url('year/delete/'. $value['year_id']) ?>" class="btn btn-danger">Hapus </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>