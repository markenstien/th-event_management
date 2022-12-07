<?php build('content')?>
  <section class="portfolio_section layout_padding" id="portfolio">
    <div class="container">
      <div class="heading_container">
        <h2>
          Basic Package
        </h2>
        <p>
          Select your package inclusions
        </p>
      </div>

      <div class="layout_padding2">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Select Event</h4>
                        <?php
                            Form::select('', ['Christening', 'Reunion', 'Birthday'], '', [
                                'class' => 'form-control'
                            ])
                        ?>
                        <div class="row mt-2">
                            <div class="col-md-4" title="Christening"><img src="<?php echo _path_upload_get('events/event_christening_3.jpg')?>" alt="" style="width: 100%"></div>
                            <div class="col-md-4" title="Birthday"><img src="<?php echo _path_upload_get('events/event_bday_3.jpg')?>" alt="" style="width: 100%"></div>
                            <div class="col-md-4" title="Reunion"><img src="<?php echo _path_upload_get('events/event_reunion_2.jpg')?>" alt="" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <h4 class="card-title">Catering</h4>
                        <section>
                            <h5>Main Dish</h5>
                            <label for="#">
                                <input type="checkbox">
                                Adobo
                            </label>

                            <label for="#">
                                <input type="checkbox">
                                Beef Steak
                            </label>

                            <label for="#">
                                <input type="checkbox">
                                Lumpia
                            </label>

                            <label for="#">
                                <input type="checkbox">
                                Pochero
                            </label>

                            <label for="#">
                                <input type="checkbox">
                                Pork Sinigang
                            </label>

                            <label for="#">
                                <input type="checkbox">
                                Pancit
                            </label>
                        </section>

                        <section class="mt-2">
                            <h5>Drinks</h5>
                            <label for="#">
                                <input type="checkbox">
                                Coke
                            </label>

                            <label for="#">
                                <input type="checkbox">
                                Sprite
                            </label>

                            <label for="#">
                                <input type="checkbox">
                                Iced Tea
                            </label>

                            <label for="#">
                                <input type="checkbox">
                                Royal
                            </label>
                        </section>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="card-body">
                        <h4 class="card-title">Cake</h4>
                        <section>
                            <h5>Main Dish</h5>
                            <label for="#">
                                <input type="checkbox">
                                Chocolate cake
                            </label>

                            <label for="#">
                                <input type="checkbox">
                                Straberry cake
                            </label>
                        </section>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Customer</h4>
                        <div class="form-group">
                            <?php
                                Form::label('First Name');
                                Form::text('firstname', '' , [
                                    'class' => 'form-control'
                                ])
                            ?>
                        </div>

                        <div class="form-group">
                            <?php
                                Form::label('Last Name');
                                Form::text('lastname', '' , [
                                    'class' => 'form-control'
                                ])
                            ?>
                        </div>

                        <div class="form-group">
                            <?php
                                Form::label('Date');
                                Form::date('date', '' , [
                                    'class' => 'form-control'
                                ])
                            ?>
                        </div>

                        <div class="form-group">
                            <?php
                                Form::label('Complete Address');
                                Form::textarea('address', '' , [
                                    'class' => 'form-control'
                                ])
                            ?>
                        </div>

                        <div class="form-group">
                            <?php
                                Form::label('Landmark');
                                Form::text('landmark', '' , [
                                    'class' => 'form-control'
                                ])
                            ?>
                        </div>

                        <div class="form-group">
                            <?php
                                Form::submit('', 'Submit Event');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div>
  </section>

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          Testimonial
        </h2>
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