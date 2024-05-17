<?= $this->extend("template_adminlte/index") ?>

<?= $this->section("page-content") ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $breadcome ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-lowercase"><?= $breadcome ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card direct-chat direct-chat-primary collapsed-card mt-4">
                        <div class="card-header ui-sortable-handle bg-success" data-card-widget="collapse" style="cursor: pointer;" id="chat">
                            <h3 class="card-title">Chat Customer</h3>
                            <div class="card-tools">
                                <span class="badge badge-primary d-none" id="badge-message" data-user="<?= session('userlevel') ?>">Pesan baru</span>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="direct-chat-messages" id="messages" data-user="<?= session('userlevel') ?>"></div>
                        </div>

                        <div class="card-footer">
                            <form action="<?= site_url('chat/sendMessage') ?>" method="post" id="form-chat">
                                <div class="input-group">
                                    <input type="hidden" name="id_order" value="<?= $id_order ?>">
                                    <input type="hidden" name="id_user" value="<?= $userid ?>">
                                    <input type="text" name="pesan" placeholder="Tulis pesan Anda ..." class="form-control">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </span>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>