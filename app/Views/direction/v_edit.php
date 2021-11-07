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
                    <label for="">No Arsip</label>
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
                    <select name="status_id" class="form-control">
                        <option value="<?= $direction['status_id'] ?>"><?= $direction['status_name'] ?></option>
                        <?php foreach ($status as $key => $value) { ?>
                        <option value="<?= $value['status_id'] ?>"><?= $value['status_name'] ?></option>
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
                    <input type="date" name="determination_date" class="form-control"
                        value="<?= $direction['determination_date'] ?>" placeholder="Tanggal Penetapan">
                </div>

                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="description" class="form-control"
                        rows="5"><?= $direction['description'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="">Perubahan</label>
                    <input type="text" name="replacement" class="form-control" value="<?= $direction['replacement'] ?>"
                        placeholder="Perubahan">
                </div>

                <div class="form-group">
                    <label for="">Dokumen Valid</label>
                    <input type="file" name="file_pdf_valid" class="form-control" accept=".pdf">
                    <label for="" class="text-danger">File Harus Format .PDF</label>
                </div>

                <div class="form-group">
                    <label for="">Dokumen Invalid</label>
                    <input type="file" name="file_pdf_invalid" class="form-control" accept=".pdf">
                    <label for="" class="text-danger">File Harus Format .PDF</label>
                </div>

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