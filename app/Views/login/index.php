<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>
<div class="container">

  <div class="row">
    <div class="col-md-4 offset-md-4 text-center my-5">
      <main class="form-signin my-5">
        <h1 class="h3 mb-5 fw-normal">Please sign in</h1>

        <?php if (session()->getFlashdata('error')) : ?>
          <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error') ?>
          </div>
        <?php endif ?>

        <?php if (session()->getFlashdata('success')) : ?>
          <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif ?>

        <form action="/login/process" method="POST">
          <?= csrf_field() ?>

          <div class="form-floating">
            <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" value="<?= old('username') ?>" id="floatingInput" name="username" placeholder="name@example.com">
            <?php if ($validation->hasError('username')) : ?>
              <label for="floatingInput" class="text-danger"><?= $validation->getError('username') ?></label>
            <?php else : ?>
              <label for="floatingInput">Username</label>
            <?php endif ?>
          </div>
          <div class="form-floating mb-4">
            <input type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" value="<?= old('password') ?>" id="floatingPassword" name="password" placeholder="Password">
            <?php if ($validation->hasError('password')) : ?>
              <label for="floatingPassword" class="text-danger"><?= $validation->getError('email') ?></label>
            <?php else : ?>
              <label for="floatingPassword">Password</label>
            <?php endif ?>
          </div>
          <div class="checkbox mb-3">
            <a href="/login/forgotPass">Lupa Password?</a>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
      </main>
    </div>
  </div>
</div>

<?= $this->endSection() ?>