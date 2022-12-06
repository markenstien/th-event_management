<?php build('content')?>
  <section class="portfolio_section layout_padding" id="portfolio">
    <div class="container">
      <div class="heading_container">
        <h2>
          Book An Event
        </h2>
        <p>
          minim veniam, quis nostrud exercitation ullamco laboris nisi
        </p>
      </div>

      <div class="layout_padding2">
        <div class="row">
          <div class="card col-md-6">
            <div class="card-body">
              <div class="row ">
                <div class="col-sm-7">
                  <div class="card-block">
                    <h4 class="card-title">Basic Package</h4>
                    <p>Good for 20(pax) 12,999.00</p>
                    <p>Event Theme, Catering, Cake</p>
                    <a href="<?php echo _route('home:book-event',['package' => 'basic'])?>" class="btn btn-primary btn-sm">Read More</a>
                  </div>
                </div>
                <div class="col-sm-5">
                  <img class="d-block w-100" src="<?php echo _path_upload_get('services/service_cake_1.jpg')?>" alt=""
                    style="width: 100%">
                </div>
              </div>
            </div>
          </div>
          <div class="card col-md-6">
            <div class="card-body">
              <div class="row ">
                <div class="col-sm-7">
                  <div class="card-block">
                    <h4 class="card-title">Standard Package</h4>
                    <p>Good for 40(pax) 27,999.00</p>
                    <p>Event Theme, Catering, Cake</p>
                    <a href="#" class="btn btn-sm">Read More</a>
                  </div>
                </div>
                <div class="col-sm-5">
                  <img class="d-block w-100" src="https://picsum.photos/150?image=380" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="card col-md-6">
            <div class="card-body">
              <div class="row ">
                <div class="col-sm-7">
                  <div class="card-block">
                    <h4 class="card-title">Premium Package</h4>
                    <p>Good for 60(pax) 47,999.00</p>
                    <p>Event Theme, Catering, Cake</p>
                    <a href="#" class="btn  btn-sm">Read More</a>
                  </div>
                </div>
                <div class="col-sm-5">
                  <img class="d-block w-100" src="https://picsum.photos/150?image=380" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>


  <section class="client_section layout_padding-bottom" style="margin-top: 50px">
    <div class="container">
      <div class="heading_container">
        <h2>
          Testimonial
        </h2>
        <p>
          minim veniam, quis nostrud exercitation ullamco laboris nisi
        </p>
      </div>
      <div class="layout_padding2-top">
        <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
          <div class="row">
            <div class="col-md-3">
              <div class="btn_container">
                <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
            <div class="col-md-9 col-lg-8">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="detail-box">
                    <h4>
                      Aloz den
                    </h4>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                      labore
                      et
                      dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                      aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum
                    </p>
                  </div>
                </div>
                <div class="carousel-item ">
                  <div class="detail-box">
                    <h4>
                      Aloz den
                    </h4>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                      labore
                      et
                      dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                      aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum
                    </p>
                  </div>
                </div>
                <div class="carousel-item ">
                  <div class="detail-box">
                    <h4>
                      Aloz den
                    </h4>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                      labore
                      et
                      dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                      aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum
                    </p>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </section>

<?php endbuild()?>
<?php loadTo('tmp/public')?>