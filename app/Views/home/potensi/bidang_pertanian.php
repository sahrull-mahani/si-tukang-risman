<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-8">
      <div class="col-md-12 mb-5">
        <h2>Potensi Bidang Pertanian</h2>
      </div>

      <div class="col-md-12">
        <div class="row">
          <div class="col-md">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Potensi</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if (empty($pertanian)) : ?>
                  <tr>
                    <td colspan="4" class="align-midle text-center fw-bold fs-3">Kosong</td>
                  </tr>
                <?php else : ?>
                  <?php $no = 1; ?>
                  <?php foreach ($pertanian as $prt) : ?>
                    <tr>
                      <th scope="row" class="align-middle"><?= $no++ ?></th>
                      <td class="align-middle"><?= ucwords($prt->judul) ?></td>
                      <td class="align-middle"><?= substr(ucfirst(strip_tags($prt->isi_potensi)), 0, 60) . "..." ?></td>
                      <td>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">detail</button>
                      </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?= ucwords($prt->judul) ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <?= $prt->isi_potensi ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach ?>
                <?php endif ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <?= $this->include("layout/sidebar") ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>