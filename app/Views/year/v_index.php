<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Keputusan Direksi
                <a href="<?= base_url('direction/add') ?>" class="btn btn-primary btn-sm float-right">Tambah Data </a>
            </h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <!-- /.box-tools -->
            </div>

            <div class="col-12">
                <?php echo form_open_multipart('direction/import') ?>
                <div class="form-group">
                    <label for="">File Excel</label>

                    <input type="file" class="form-control-file" name="file_excel" accept=".xls, .xlsx">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-success">Proses Input</button>
                </div>
                <?php echo form_close(); ?>
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
                        <th width="80px">No</th>
                        <th class="text-center">No Naskah</th>
                        <th class="text-center">Perihal</th>
                        <th class="text-center">Tanggal Penetapan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Deskripsi</th>
                        <th class="text-center">Perubahan</th>
                        <th class="text-center">Dokumen Valid</th>
                        <th class="text-center">Dokumen Invalid</th>
                        <th width="80px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                        foreach ($direction as $key => $value) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $value['script_number']; ?></td>
                        <td><?= $value['regarding']; ?></td>
                        <td><?= $value['determination_date']; ?></td>
                        <td><?= $value['status_name']; ?></td>
                        <td><?= $value['description']; ?></td>
                        <td><?= $value['replacement']; ?></td>
                        <td><a href="<?= base_url('direction/viewpdf/' . $value['direction_id']); ?>">
                                <div class="tex-center fas fa-fw fa-file-pdf"></div>
                            </a><br>

                        </td>
                        <td><a href="<?= base_url('direction/viewpdf/' . $value['direction_id']); ?>"><i
                                    class="fas fa-fw fa-file-pdf"></i></a><br>

                        </td>
                        <td>
                            <a href="<?= base_url('direction/edit/'. $value['direction_id']); ?>"
                                class="btn btn-sm btn-warning">Edit</a>
                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#delete<?= $value['direction_id']; ?>">Delete</button>
                        </td>
                    </tr>
                    <?php }  ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php foreach ($direction as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['direction_id']; ?>">
    <div class="modal-dialog modal-danger">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Menghapus <?= $value['script_number']; ?> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                <a href="<?= base_url('direction/delete/'. $value['direction_id']) ?>" class="btn btn-danger">Hapus </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>