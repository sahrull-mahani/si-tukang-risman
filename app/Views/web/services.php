<?= $this->extend('web/_template/index') ?>
<?= $this->section('page-content') ?>

<div class="ftco-blocks-cover-1">
  <div class="ftco-cover-1 overlay innerpage" style="background-image: url(<?= base_url('assets_front/images/hero_2.jpg') ?>)">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-6 text-center">
          <h1>Our Services</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="site-section" style="background-color: #dedffe;">
  <div class="container">
    <div class="row align-items-stretch">
      <div class="col-md-6 mb-5 mb-lg-5 col-lg-4">
        <div class="service-2 h-100">
          <div class="svg">
            <img src="<?= base_url('assets_front/images/flaticon/svg/001-renovation.svg') ?>" alt="Image" class="">
          </div>

          <h3><span>Renovation</span></h3>
          <p>Consectetur adipisicing elit. Numquam repellendus aut labore</p>

        </div>
      </div>
      <div class="col-md-6 mb-5 mb-lg-5 col-lg-4">
        <div class="service-2 h-100">
          <div class="svg">
            <img src="<?= base_url('assets_front/images/flaticon/svg/002-shovel.svg') ?>" alt="Image" class="">
          </div>

          <h3><span>Finishing</span></h3>
          <p>Consectetur adipisicing elit. Numquam repellendus aut labore</p>

        </div>
      </div>
      <div class="col-md-6 mb-5 mb-lg-5 col-lg-4">
        <div class="service-2 h-100">
          <div class="svg">
            <img src="<?= base_url('assets_front/images/flaticon/svg/003-bulldozer.svg') ?>" alt="Image" class="">
          </div>

          <h3><span>Building Construction</span></h3>
          <p>Consectetur adipisicing elit. Numquam repellendus aut labore</p>

        </div>
      </div>


      <div class="col-md-6 mb-5 mb-lg-5 col-lg-4">
        <div class="service-2 h-100">
          <div class="svg">
            <img src="<?= base_url('assets_front/images/flaticon/svg/004-house-plan.svg') ?>" alt="Image" class="">
          </div>

          <h3><span>House Build</span></h3>
          <p>Consectetur adipisicing elit. Numquam repellendus aut labore</p>

        </div>
      </div>
      <div class="col-md-6 mb-5 mb-lg-5 col-lg-4">
        <div class="service-2 h-100">
          <div class="svg">
            <img src="<?= base_url('assets_front/images/flaticon/svg/005-fence.svg') ?>" alt="Image" class="">
          </div>

          <h3><span>Fence Construction</span></h3>
          <p>Consectetur adipisicing elit. Numquam repellendus aut labore</p>

        </div>
      </div>
      <div class="col-md-6 mb-5 mb-lg-5 col-lg-4">
        <div class="service-2 h-100">
          <div class="svg">
            <img src="<?= base_url('assets_front/images/flaticon/svg/006-wheelbarrow.svg') ?>" alt="Image" class="">
          </div>

          <h3><span>Bridge Construct</span></h3>
          <p>Consectetur adipisicing elit. Numquam repellendus aut labore</p>

        </div>
      </div>

    </div>
  </div>
</div>


<div class="site-section bg-light">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-4 mx-auto">
        <h2 class="line-bottom text-center">Testimonials</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="testimonial-3">
          <blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure id accusantium similique temporibus nihil blanditiis adipisci aperiam, sapiente suscipit vero.</blockquote>
          <div class="vcard d-flex align-items-center">
            <div class="img-wrap mr-3">
              <img src="<?= base_url('assets_front/images/person_1.jpg') ?>" alt="Image" class="img-fluid">
            </div>
            <div>
              <span class="d-block">John Smith</span>
              <span class="position">Client From Facebook</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="testimonial-3">
          <blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure id accusantium similique temporibus nihil blanditiis adipisci aperiam, sapiente suscipit vero.</blockquote>
          <div class="vcard d-flex align-items-center">
            <div class="img-wrap mr-3">
              <img src="<?= base_url('assets_front/images/person_2.jpg') ?>" alt="Image" class="img-fluid">
            </div>
            <div>
              <span class="d-block">John Smith</span>
              <span class="position">Client From Facebook</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>