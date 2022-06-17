
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
    <table class="table table-bordered" style="background-color: white;">   
                <thead>
                    <tr>
                        <th>No</th>
                        <th>File PDF</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php foreach($pdf as $row) : ?>
                        <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['file_pdf']; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lihatPdf<?= $row['pdf_id']; ?>">
                    Lihat PDF
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $row['pdf_id']; ?>">Hapus PDF</button>
                            </td>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>     
        </div>
    </div>
</div>

<?php foreach($pdf as $value) : ?>
<div class="modal fade" id="lihatPdf<?= $value['pdf_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content mb-2">
            <div class="modal-header">
                <h5 class="modal-title" id="lihatPdf">Data PDF</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                           <div class="modal-body">
                        <iframe src="<?= base_url('oke_file/' . $value['file_pdf']) ?>" style="border:none;"
                height="600px" width="100%"></iframe>
                        </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php foreach ($pdf as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['pdf_id']; ?>">
          <div class="modal-dialog modal-danger">
            <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Delete PDF</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                Apakah Anda Yakin Menghapus <?= $value['file_pdf']; ?> ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                <a href="<?= base_url('pdf/delete/'. $value['pdf_id']) ?>" class="btn btn-danger">Hapus </a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<?php } ?>