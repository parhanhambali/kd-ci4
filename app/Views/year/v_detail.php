<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tahun </h6>
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
                        <th width="80px">No</th>
                        <th class="text-center">No Naskah</th>
                        <th class="text-center">Perihal</th>
                        <th class="text-center">Tanggal Penetapan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Deskripsi</th>
                        <th class="text-center">Perubahan</th>
                        <th class="text-center">Dokumen</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $no = 1; ?>
                    <?php foreach($direction as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['script_number']; ?></td>
                        <td><?= $row['regarding']; ?></td>
                        <td><?= $row['determination_date']; ?></td>
                        <td><?= $row['status_name']; ?></td>
                        <td><?= $row['description']; ?></td>
                        <td><?= $row['replacement']; ?></td>
                        <td><a href="<?= base_url('direction/viewpdf/' . $row['direction_id']); ?>">
                                <div class="text-center"><i class="fas fa-fw fa-file-pdf" style="font-size: 2rem;"></i>
                                </div>
                            </a><br>
                        </td>

                        <td>
                            <a href="<?= base_url('direction/edit/'. $row['direction_id']); ?>"
                                class="btn btn-sm btn-warning">Edit</a>
                            <button class="btn btn-sm btn-danger my-3" data-toggle="modal"
                                data-target="#delete<?= $row['direction_id']; ?>">Hapus</button>
                        </td>
                    </tr>
                    <?php endforeach;  ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>