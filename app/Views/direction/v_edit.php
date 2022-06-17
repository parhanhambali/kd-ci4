<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Data Keputusan Direksi (KD)</h3>

                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php 
                    $errors = session()->getFlashdata('errors');
                    if (!empty($errors)) { ?>
                <div class="alert alert-danger alert-dismissible">
                    <ul>
                        <?php foreach ($errors as $key => $value) { ?>
                        <li><?= esc($value) ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <?php } ?>

                <?php echo form_open_multipart('direction/update/' . $direction['direction_id']); 
                ?>

                <div class="form-group">
                    <label for="">No Naskah</label>
                    <input type="text" name="script_number" class="form-control"
                        value="<?= $direction['script_number'] ?>">
                </div>

                <div class="form-group">
                    <label for="">Tahun</label>
                    <select name="year_id" class="form-control">
                        <option value="<?= $direction['year_id'] ?>"><?= $direction['year_name'] ?></option>
                        <?php foreach ($year as $key => $value) { ?>
                        <option value="<?= $value['year_id'] ?>"><?= $value['year_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status_name" class="form-control">
                        <option value="<?= $direction['status_name'] ?>"><?= $direction['status_name'] ?></option>
                        <?php foreach ($status as $key => $value) { ?>
                        <option value="<?= $value['status_name'] ?>"><?= $value['status_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Perihal</label>
                    <input type="text" name="regarding" class="form-control" value="<?= $direction['regarding'] ?>"
                        placeholder="Perihal">
                </div>

                <div class="form-group">
                    <label for="">Tanggal Penetapan</label>
                    <input type="text" name="determination_date" class="form-control"
                        value="<?= $direction['determination_date'] ?>" placeholder="Tanggal Penetapan">
                </div>

                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="description" class="form-control"
                        rows="5"><?= $direction['description'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="">Perubahan</label>
                    <input type="text" name="replacement" value="<?= $direction['replacement'] ?>" class="form-control"
                        placeholder="Perubahan">
                </div>

            <div class="form-group">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPdf">
                    Tambah PDF
                </button>
            </div>


       <!-- <div class="form-group">
                <button type="button" class="btn btn-primary " id="btnTambah" onclick="addPdf();">Tambah PDF</button>
                <table class="table-border">
                    <thead>
                        <tr>
                            <th scope="col">UploadPDF</th>
                        </tr>
                    </thead>
                    <tbody id="tbody"></tbody>
                </table>
                </div> -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('direction') ?>" class="btn btn-success">Kembali</a>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
</div>


<div class="modal fade" id="tambahPdf" tabindex="-1" role="dialog" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPdf">Upload PDF</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form action="<?= base_url('pdf/tambah/') ?>" enctype="multipart/form-data" method="POST">
                           <div class="modal-body">
                            <input type="hidden" name="direction_id" value="<?= $direction['direction_id'] ?>" class="form-control"
                        placeholder="Perubahan">

                        <input type="file" name="file_pdf" class="form-control"
                        placeholder="Tambah PDF" accept=".pdf">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('direction') ?>" class="btn btn-success">Kembali</a>
                        </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>