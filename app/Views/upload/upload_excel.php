<div class="container-fluid">
    <div class="card">
        <div class="card-header py-3 ">
            <h4 class="m-0 font-weight-bold text-primary" text-center>
                <div class="text-center">Upload Data Excel Disini ...</div>
            </h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <!-- /.box-tools -->
            </div>

            <div class="col-md-12">
                <?php echo form_open_multipart('excel/import') ?>
                <div class="form-group">
                    <label for="">Upload File Excel Disini </label>
                    <input type="file" class="form-control-file" name="file_excel" accept=".xls, .xlsx">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-success">Proses Input</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>