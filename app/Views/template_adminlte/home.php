<?= $this->extend('template_adminlte/index'); ?>
<?= $this->section('page-content'); ?>
<!-- Main content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?= $berita ?><sup style="font-size: 20px"></sup></h3>
                            <p>Berita</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <?php if (is_admin()) : ?>
                            <a href="<?= site_url('berita'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                        <?php endif ?>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $tukang ?><sup style="font-size: 20px"></sup></h3>
                            <p>Tukang</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <?php if (is_admin()) : ?>
                            <a href="<?= site_url('tukang') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                        <?php endif ?>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= count($users) ?></h3>
                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <?php if (is_admin()) : ?>
                            <a href="<?= site_url('users'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                        <?php endif ?>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $kategori ?></h3>
                            <p>Kategori</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tree"></i>
                        </div>
                        <?php if (is_admin()) : ?>
                            <a href="<?= site_url('kategori'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                        <?php endif ?>
                    </div>
                </div>
            </div>

            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tentang</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-justify">Tukang bangunan adalah pekerja yang mempunyai keterampilan dalam bidang pembangunan kebutuhan masyarakat akan seseorang yang memiliki kemampuan khusus dalam masalah pembangunan rumah.</p>
                    <p class="text-justify">Pada saat ini masih banyak orang yang kesulitan dalam mencari seseorang untuk membantu pekerjaan yang tidak bisa dilakukan berdasarkan kemapuanya sendiri, untuk karena itu diaplikasi ini masyarakat dapat mencari tukang yang dapat dipekerjaan sesuai dengan tarif yang sesuai dan pekerjaan yang diperlukan.</p>
                </div>
            </div>

        </div>
    </section>

</div>
<!-- /.content -->
</div>

<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>


<?= $this->endSection(); ?>