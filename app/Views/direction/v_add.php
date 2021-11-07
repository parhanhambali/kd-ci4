<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <div class="box-tools pull-right">
                        <h3 class="box-title">Tambah Data KD</h3>

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

                        <?php echo form_open_multipart('direction/insert'); ?>

                        <div class="form-group">
                            <label for="">Nomor Arsip</label>
                            <input type="text" name="script_number" class="form-control"
                                placeholder="Tambah Nomor Surat Disini ...">
                        </div>

                        <div class="form-group">
                            <label for="">Perihal</label>
                            <textarea name="regarding" class="form-control" rows="5"
                                placeholder="Tambah Perihal Disini ..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Tanggal Penetapan</label>
                            <input type="date" name="determination_date" class="form-control"
                                placeholder="Tanggal Penetapan">
                        </div>

                        <div class="form-group">
                            <label for="">Tahun</label>
                            <select name="year_id" class="form-control">
                                <option value="">--Pilih Tahun Disini--</option>
                                <?php foreach ($year as $key => $value) { ?>
                                <option value="<?= $value['year_id'] ?>"><?= $value['year_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status_id" class="form-control">
                                <option value="">--Pilih Status Disini--</option>
                                <?php foreach ($status as $key => $value) { ?>
                                <option value="<?= $value['status_id'] ?>"><?= $value['status_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <textarea name="description" class="form-control" rows="5"
                                placeholder="Tambah Deskripsi Disini ..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Perubahan</label>
                            <input type="text" name="replacement" class="form-control"
                                placeholder="Tambah Perubahan Disini ...">
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