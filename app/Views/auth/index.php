    <?= $this->extend('template_adminlte/index') ?>
    <?= $this->section('page-content') ?>    
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
                                <li class="breadcrumb-item"><a href="#">Management Users</a></li>
                                <li class="breadcrumb-item active"><?= $breadcome ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data <?= $breadcome ?></h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"
                                            title="Remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="toolbar">
                                        <!-- <input type="number" class="btn  btn-default" value="1" id="number-of-row"> -->
                                        <!-- <button type="button" class="btn btn-primary create" method="groups" data-toggle="modal"><i class="fa fa-users"></i> Groups</button> -->
                                        <button type="button" class="btn btn-primary create" method="create_user"><i class="fa fa-plus"></i> <?= lang('Auth.index_create_user_link'); ?></button>
                                        <button type="button" class="btn btn-warning single-edit" id="edits" method="edit_user" disabled><i class="fa fa-edit"></i>  <?= lang('Auth.edit_user_heading'); ?></button>
                                        <button type="button" class="btn btn-danger" id="remove" disabled><i class="fa fa-trash"></i> Hapus</button>
                                    </div>
                                    <table id="table" data-toggle="table" data-ajax="ajaxRequest" data-side-pagination="server" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id" data-visible="false">ID</th>
                                                <th data-field="nomor">No</th>
                                                <th data-field="nama_user"><?= lang('Auth.index_name_th');?></th>
                                                <!-- <th data-field="username">User Name</th> -->
                                                <th data-field="username">Username</th>
                                                <th data-field="group"><?= lang('Auth.index_groups_th');?></th>
                                                <th data-field="active"><?= lang('Auth.index_status_th');?></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="card-footer">Footer</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <?= $this->endSection() ?>

