<div class="container">
    <div class="row col-md-4">
        <h1 class="text-gray-700 mb-3">
            <?= $title; ?>

            <?= form_open_multipart('uploads/upload_file'); ?>
            <div class="form-group">
                <label for="">Nomor Naskah</label>
                <input type="text" name="script_number" class="form-control"
                    placeholder="Tambah Nomor Surat Disini ...">
            </div>
            <div class="form-group">
                <label for="images">Upload Photo</label>
                <input type="file" name="images[]" id="images"
                    class="p-1 form-control <?php $error->hasError('images') ? 'is-invalid' : ''; ?>" multiple>
                <div class="invalid-feedback">
                    <?= $error->getError('images'); ?>
                </div>
                <?php echo session()->getFlashdata('msg'); ?>
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Upload Files</button>
            </div>
            <?= form_close(); ?>
        </h1>
    </div>
</div>