<?php build('style')?>
<style>
  .inclusion {
    display: inline-block;
    border: 1px solid #eee;
    padding: 4px;
  }
</style>
<?php endbuild()?>
<?php build('content')?>
  <section class="about_section layout_padding" id="about">
    <div class="container">
        <h2><?php echo $event['name']?></h2>
        <div class="detail-box">
            <p><?php echo $event['description']?></p>
            <div>
                <a href="">
                about More
                </a>
            </div>
        </div>
    </div>
  </section>
  <div class="container">
    <div class="row">
      <div class="col">
        <?php
          Form::open([
            'method' => 'post',
            'action' => ''
          ])
        ?>
        <!-- end about section -->
          <section class="">
            <?php if(!isset($_GET['package_id'])) :?>
                <div class="container">
                <div class="heading_container">
                    <h2>Packages</h2>
                    <p>minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
                </div>
                <div class="row space-around">
                    <?php foreach(GLOBAL_VAR['packages'] as $key => $row) :?>
                    <div class="card col-md-4 mb-3">
                        <div class="card-body">
                        <img src="<?php echo _path_upload_get($row['picture'])?>" alt=""
                            style="border-radius:50%"
                            width="100%" class="mb-3">
                        <h5><?php echo $row['name']?></h5>
                        <p class="card-text">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae, hic. Eius, iure, 
                            reprehenderit pariatur, est velit deleniti eveniet.
                        </p>
                        <a href="?<?php echo urlAddQuery(['package_id' => $key], true)?>" class="btn btn-sm btn-primary">Select Package</a>
                        </div>
                    </div>
                    <?php endforeach?>
                </div>
                </div>
            <?php endif?>
            
              <section>
                <?php if(isset($_GET['package_id'])) :?>
                  <?php 
                      $package = GLOBAL_VAR['packages'][$_GET['package_id']];
                      $packageGroup = GLOBAL_VAR['package_group'];
                      $packageGroupSecondary = $packageGroup['secondary'];
                  ?>
                  <div class="container">
                      <div class="card mb-2">
                          <div class="card-header">
                              <div class="row">
                                  <div class="col-md-6"><h4 class="card-title"><?php echo $package['name']?></h4></div>
                                  <div class="col-md-6">
                                      Price : <?php echo amountHTML($package['price'])?> | 
                                      Number Of Attendees : <?php echo $package['number_of_attendees']?>
                                  </div>
                              </div>
                              <div><input type="submit" class="btn btn-primary btn-sm" value="Save Selection"></div>
                          </div>
                      </div>

                      <div class="card">
                          <div class="card-header">
                              <div class="row">
                                  <div class="col-md-6"><h4 class="card-title">CATERING</h4></div>
                                  <div class="col-md-6">
                                      <a href="#">MAIN DISH</a> | 
                                      <a href="#">VEGETABLE</a> | 
                                      <a href="#">DESERT</a> | 
                                      <a href="#">CAKE</a>
                                  </div>
                              </div>
                          </div>

                          <div class="card-body">
                             <?php Flash::show('dish')?>
                              <?php foreach($packageGroup['catering'] as $catKey => $cateGroup) :?>
                                <div class="card mb-3">
                                  <div class="card-header">
                                    <h4 class="card-title"><?php echo $cateGroup['name']?></h4>
                                    Select (<?php echo $cateGroup['rules'][$_GET['package_id']]?>)
                                  </div>
                                  <div class="card-body">
                                    <div class="row">
                                      <?php foreach($cateGroup['items'] as $itemKey => $item) :?>
                                        <?php $labelid = "{$itemKey}".random_letter(5);?>
                                        <div class="col-md-3">
                                            <img src="<?php echo GET_PATH_UPLOAD.'/dishes/'.$catKey.'/'.$item['image']?>" 
                                              alt="<?php echo $item['name']?>" style="width:100%; height:150px; 
                                              display:block;
                                              margin:0px auto;">
                                            <label for="<?php echo $labelid?>">
                                              <input  type="checkbox" name="inclusion[<?php echo $catKey?>][<?php echo $itemKey?>]" 
                                                id="<?php echo $labelid?>"
                                                data-max="<?php echo $cateGroup['rules'][$_GET['package_id']] ?>"
                                                value="<?php echo $item['name']?>"
                                                
                                                <?php
                                                  if(isset($_POST['inclusion'][$catKey][$itemKey])) {
                                                    echo 'checked';
                                                  }
                                                ?>
                                                >
                                              <?php echo $item['name']?>
                                            </label>
                                          </div>
                                      <?php endforeach?>
                                    </div>
                                  </div>
                                </div>
                              <?php endforeach?>
                          </div>
                      </div>

                      <?php foreach($packageGroupSecondary as $key => $catGroup) :?>
                        <div class="card">
                          <div class="card-header">
                            <h4 class="card-title"><?php echo $catGroup['name']?></h4>
                            <?php echo isset($catGroup['rules']) ? 'SELECT '."(".$catGroup['rules'][$_GET['package_id']].")": ''?>
                          </div>

                          <div class="card-body">
                            <?php foreach($catGroup['items'] as $itemKey => $item) :?>
                              <?php $labelid = "{$itemKey}".random_letter(5);?>
                              <div class="inclusion">
                                <label for="<?php echo $labelid?>">
                                  <input  type="checkbox" name="inclusion[<?php echo $key?>]" 
                                    id="<?php echo $labelid?>"
                                    <?php echo isset($catGroup['rules']) ? 'data-max='.$catGroup['rules'][$_GET['package_id']]: ''?>"
                                    value="<?php echo $item?>"
                                    data-test = "<?php echo $_POST['inclusion'][$key]?>"
                                    <?php
                                        if(in_array($item, $_POST['inclusion'])) {
                                          echo 'checked';
                                        }
                                      ?>
                                    >
                                  <?php echo $item?>
                                </label>
                              </div>
                            <?php endforeach?>
                          </div>
                        </div>
                      <?php endforeach?>
                  </div>
              <?php endif?>
            </section>
            <section class="client_section layout_padding-bottom">
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
                  <p>
                    minim veniam, quis nostrud exercitation ullamco laboris nisi
                  </p>
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
            </section>
            
        <?php Form::close()?>
      </div>
        <?php if(!empty($selection)) :?>
        <div class="col-md-5">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Live Selection Preview</h4>
            </div>
            <div class="card-body">
              <?php
                $inlclusions = $selection->inclusion;
              ?>
              <ul style="list-style-type: none; margin:none; padding:none">
                <?php foreach($inlclusions as $key => $row) :?>
                  <h4><?php echo GLOBAL_VAR['packageGroupKeys'][$key]?></h4>
                  <?php foreach((array)$row as $item) :?>
                    <li><?php echo $item?></li>
                  <?php endforeach?>
                  <li>---</li>
                <?php endforeach?>
              </ul>
            </div>
            <div class="card-footer">
              <a href="/HomeController/checkoutEvent?event_code=<?php echo $booked->search_key?>" class="btn btn-primary">Checkout</a>
            </div>
          </div>
        </div>
      <?php endif?>
    </div>
  </div>

<?php endbuild()?>
<?php loadTo('tmp/public')?>