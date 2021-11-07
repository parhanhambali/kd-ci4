<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered">
            <tr>
                <th width="100px">No</th>
                <th width="100px">:</th>
                <th><?= $direction['script_number'] ?></th>
                <th width="120px">Tanggal Upload</th>
                <th width="30px">:</th>
                <th><?= $direction['determination_date'] ?></th>
            </tr>

            <tr>
                <th>Nama direction</th>
                <th>:</th>
                <td><?= $direction['description'] ?></td>
                <th>Tanggal Update</th>
                <th>:</th>
                <td><?= $direction['year_name'] ?></td>
            </tr>

            <tr>
                <th>Deskripsi</th>
                <th>:</th>
                <td><?= $direction['status_name'] ?></td>
                <th>Ukuran File</th>
                <th>:</th>
                <td><?= $direction['regarding'] ?></td>
            </tr>
        </table>
    </div>
    <div class="col-sm-12">
        <div class="text-center">
            <iframe src="<?= base_url('file_pdf_valid/' . $direction['file_pdf_valid']) ?>" style="border:none;"
                height="600px" width="50%"></iframe>
        </div>

        <div class="col-sm-12">
            <table class="table table-bordered">
                <tr>
                    <th width="100px">No</th>
                    <th width="100px">:</th>
                    <th><?= $direction['script_number'] ?></th>
                    <th width="120px">Tanggal Upload</th>
                    <th width="30px">:</th>
                    <th><?= $direction['determination_date'] ?></th>
                </tr>

                <tr>
                    <th>Nama direction</th>
                    <th>:</th>
                    <td><?= $direction['description'] ?></td>
                    <th>Tanggal Update</th>
                    <th>:</th>
                    <td><?= $direction['year_name'] ?></td>
                </tr>

                <tr>
                    <th>Deskripsi</th>
                    <th>:</th>
                    <td><?= $direction['status_name'] ?></td>
                    <th>Ukuran File</th>
                    <th>:</th>
                    <td><?= $direction['regarding'] ?></td>
                </tr>

            </table>
        </div>
        <div class="text-center">
            <iframe src="<?= base_url('file_pdf_invalid/' . $direction['file_pdf_invalid']) ?>" style="border:none;"
                height="600px" width="50%"></iframe>
        </div>
    </div>
</div>
</div>