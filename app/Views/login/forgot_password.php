<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">

  <div class="row">
    <div class="col-md-4 offset-md-4 text-center my-5">
      <main class="form-signin my-5">
        <h1 class="h3 mb-5 fw-normal">Masukan email pemulihan</h1>

        <?php if (session()->getFlashdata('error')) : ?>
          <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error') ?>
          </div>
        <?php endif ?>

        <form action="/login/process_forgotPass" method="POST">
          <?= csrf_field() ?>

          <div class="form-floating">
            <input type="email" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" value="<?= old('email') ?>" id="floatingInput" name="email" placeholder="name@example.com">
            <?php if ($validation->hasError('email')) : ?>
              <label for="floatingInput" class="text-danger"><?= $validation->getError('email') ?></label>
            <?php else : ?>
              <label for="floatingInput">Email</label>
            <?php endif ?>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Kirim</button>
        </form>
      </main>
    </div>
  </div>
</div>
<?= $this->endSection() ?>