<div class="col-sm-12">
    <table class="table table-bordered" style="background-color: white;">
        <thead>
            <tr>
                <th class="text-center">No Naskah</th>
                <th class="text-center">Perihal</th>
                <th class="text-center">Tanggal Penetapan</th>
                <th class="text-center">Status</th>
                <th class="text-center">Deskripsi</th>
                <th class="text-center">Perubahan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $direction['script_number']; ?></td>
                <td><?= $direction['regarding']; ?></td>
                <td><?= $direction['determination_date']; ?></td>
                <td><?= $direction['status_name']; ?></td>
                <td><?= $direction['description']; ?></td>
                <td><?= $direction['replacement']; ?></td>
        </tbody>
    </table>
</div>

<div class="col-sm-12">
    <div class="text-center">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" style="background-color: white;">DOKUMEN VALID</th>
                </tr>
            </thead>
        </table>
        <iframe src="<?= base_url('file_pdf_valid/' . $direction['file_pdf_valid']) ?>" style="border:none;"
            height="600px" width="50%"></iframe>
    </div>

    <div class="col-sm-12">
        <div class="text-center">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="background-color: white;">DOKUMEN INVALID</th>
                    </tr>
                </thead>
            </table>
            <iframe src="<?= base_url('file_pdf_invalid/' . $direction['file_pdf_invalid']) ?>" style="border:none;"
                height="600px" width="50%"></iframe>
        </div>
    </div>
</div>