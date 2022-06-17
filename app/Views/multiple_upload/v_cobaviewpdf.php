<?php foreach($images as $value) { ?>
<div class="col-sm-12">
    <div class="text-center">
        <table class="table table-bordered">
            <thead>
                <th class="text-center">No Naskah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $value['script_number']; ?></td>
            </tbody>
            <tr>
                <th class="text-center" style="background-color: white;">DOKUMEN VALID</th>
            </tr>
            </thead>
        </table>
        <iframe src="<?= base_url('multiple_file/' . $value['img_satu']) ?>" style="border:none;" height="600px"
            width="100%"></iframe>
    </div>


    <div class="col-sm-12">
        <div class="text-center">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="background-color: white;">DOKUMEN INVALID / RUJUKAN</th>
                    </tr>
                </thead>
            </table>
            <iframe src="<?= base_url('multiple_file/' . $value['img_dua']) ?>" style="border:none;" height="600px"
                width="100%"></iframe>
        </div>
    </div>
</div>
<?php } ?>