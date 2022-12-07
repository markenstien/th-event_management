<?php build('content')?>
<!-- end header section -->
    <!-- slider section -->
    <section class="slider_section position-relative">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-5 offset-md-1 ">
                  <div class="detail_box">
                    <h1>
                      Event Management By <br>
                      <span class="company-name"><?php echo COMPANY_NAME?></span>
                    </h1>
                    <p>
                      We are the iEvents Company, and we specialize in small-scale events. Our goal has
                      always been to make every event successful for everyone involved and simplify the
                      customer's event planning. We aim to become the go-to event management business
                      by providing our clients with top-notch service and new, cost-effective concepts. We will
                      ingrain our humble beginnings by turning ideal events into reality. At the same time,
                      through the Big Days website, our Company will assist local and small-scale
                      event-related businesses to promote their products and services through partnerships
                      and advertising.
                    </p>
                  </div>
                </div>
                <div class="col-md-6 px-0">
                  <div class="img-box">
                    <img src="<?php echo _path_upload_get('events/event_christening_3.jpg')?>" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- about section -->

  <section class="about_section layout_padding" id="about">
    <div class="container">
      <h4>Advertisement</h4>
      <div class="row mt-3">
        <div class="col-md-8">
          <div class="detail-box">
            <img src="<?php echo _path_upload_get('ads/main_ads.png')?>" 
              alt="ads" style="width: 100%">
          </div>
        </div>
        <div class="col-md-4">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/ALdgdGgF1a8?start=8" 
          title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>

  </section>

  <!-- end about section -->
  <section class="layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>Events Catered </h2>
      </div>
      <div class="row">
        <?php foreach(GLOBAL_VAR['events'] as $key => $row) :?>
          <div class="card col-md-3 mb-3">
            <div class="card-body">
              <img src="<?php echo _path_upload_get("events/".$row['picture'])?>" alt=""
                style="border-radius:50%"
                width="100%" class="mb-3">
              <h5><?php echo $row['name']?></h5>
              <a href="/HomeController/bookEvent?event_id=<?php echo $key?>" class="btn btn-sm btn-primary">Book Event</a>
            </div>
          </div>
        <?php endforeach?>
      </div>
    </div>
  </section>

  <section class="client_section layout_padding-bottom" style="margin-top: 50px;">
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

  <!-- portfolio section -->
  <section class="portfolio_section layout_padding" id="portfolio">
    <div class="container">
      <div class="heading_container">
        <h2>
          Our portfolio
        </h2>
      </div>
      <div class="portfolio_container layout_padding2">
        <div class="box-1">
          <div class="img-box b-1">
            <img src="<?php echo _path_upload_get('services/service_cake.jpg')?>" alt="">
            <div class="btn-box">
              <a href="#" class="btn-1">

              </a>
            </div>
          </div>
          <div class="img-box b-2">
            <img src="<?php echo _path_upload_get('services/service_catering_1.jpg')?>" alt="">
            <div class="btn-box">
              <a href="#" class="btn-1">

              </a>
            </div>
          </div>
        </div>
        <div class="box-2">
          <div class="box-2-top">
            <div class="img-box b-3">
            <img src="<?php echo _path_upload_get('services/service_catering.jpg')?>" alt="">
              <div class="btn-box">
                <a href="#" class="btn-1">

                </a>
              </div>
            </div>
          </div>
          <div class="box-2-top2">
            <div class="img-box b-4">
              <img src="<?php echo _path_upload_get('events/event_bday_3.jpg')?>" alt="">
              <div class="btn-box">
                <a href="#" class="btn-1">

                </a>
              </div>
            </div>
          </div>
          <div class="box-2-btm">
            <div class="img-box b-5">
              <img src="<?php echo _path_upload_get('events/event_christening_3.jpg')?>" alt="">
              <div class="btn-box">
                <a href="#" class="btn-1">

                </a>
              </div>
            </div>
            <div class="img-box b-6">
              <img src="<?php echo _path_upload_get('events/event_reunion.jpg')?>" alt="">
              <div class="btn-box">
                <a href="" class="btn-1">

                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="see_btn">
        <a href="">
          See More
        </a>
      </div>
    </div>
  </section>

<?php endbuild()?>
<?php loadTo('tmp/public')?>