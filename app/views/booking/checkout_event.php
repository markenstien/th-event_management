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
        <h2>You are one click away to reserve your booking</h2>
        Event : <?php echo $event['name']?>, 
        Package : <?php echo $package['name']?>
    </div>
  </section>

  <div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h3>Reservation Form</h3>
                    <?php Flash::show()?>
                    <?php
                        Form::open([
                            'method' => 'post',
                            'action' => '',
                            'enctype' => 'multipart/form-data'
                        ]);

                        Form::hidden('search_key', $booked->search_key);
                        Form::hidden('event_id', $selection->event_id);
                        Form::hidden('package_id', $selection->package_id);
                    ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                    Form::label('First Name *');
                                    Form::text('firstname', '', ['class' => 'form-control' , 'required' => true]);
                                ?>
                            </div>
                            <div class="col-md-6">
                                <?php
                                    Form::label('Last Name *');
                                    Form::text('lastname', '', ['class' => 'form-control' , 'required' => true]);
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                    Form::label('Email *');
                                    Form::email('email', '', ['class' => 'form-control' , 'required' => true]);
                                ?>
                            </div>
                            <div class="col-md-6">
                                <?php
                                    Form::label('Phone Number *');
                                    Form::text('phone_number', '', ['class' => 'form-control' , 'required' => true]);
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                    Form::label('Date *');
                                    Form::date('date', '', ['class' => 'form-control' , 'required' => true]);
                                ?>
                            </div>
                            <div class="col-md-6">
                                <?php
                                    Form::label('Time *');
                                    Form::time('time', '', ['class' => 'form-control' , 'required' => true]);
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php
                            Form::label('Address *');
                            Form::textarea('address', '', ['class' => 'form-control' , 'required' => true, 'rows' => 2]);
                            Form::small('Event Location');
                        ?>
                    </div>

                    <div class="form-group">
                        <?php
                            Form::label('Notes to the team *');
                            Form::textarea('notes', '', ['class' => 'form-control' , 'required' => true , 'rows' => 4]);
                        ?>
                    </div>
                    <div class="form-group">
                        <h4>Payments</h4>
                        <?php
                            Form::label('Amount To Pay');
                            Form::text('amount', $package['price'], [
                                'class' => 'form-control',
                                'readonly' => true
                            ]);
                            Form::small('You can Pay atleast 10% of the total amount.' . "(".amountHTML(($package['price'] * .30)).")");
                        ?>
                        <label for="#">Pay through the following.</label>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab" data-toggle="tab" href="#gcash" 
                                role="tab" aria-controls="gcash" aria-selected="true">GCASH</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" 
                                href="#profile" role="tab" aria-controls="profile" aria-selected="false">BANK</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade" id="gcash" role="tabpanel" aria-labelledby="home-tab">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Account Number</td>
                                        <td>09666844486</td>
                                    </tr>
                                    <tr>
                                        <td>Account Name</td>
                                        <td>Kevin James L.</td>
                                    </tr>
                                </table>
                                <label for="#"></label>
                                <img src="<?php echo GET_PATH_UPLOAD.DS.'gcash_kevin.png'?>" 
                                    alt="" style="width: 300px">
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Organization</td>
                                        <td>PNB</td>
                                    </tr>
                                    <tr>
                                        <td>Account Number</td>
                                        <td>166010064121</td>
                                    </tr>
                                    <tr>
                                        <td>Account Name</td>
                                        <td>Kevin James Liguit</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                    Form::label('Amount Paid');
                                    Form::text('amount_paid', '', [
                                        'class' => 'form-control'
                                    ]);
                                    Form::small('in Numbers');
                                ?>
                            </div>
                            <div class="col-md-6">
                                <?php
                                    Form::label('Reference');
                                    Form::text('payment_reference', '', [
                                        'class' => 'form-control'
                                    ]);
                                    Form::small('in Numbers');
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php
                            Form::label('Attach proof of payment here.');
                            Form::file('payment');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                            Form::submit('', 'Submit Reservation');
                        ?>
                    </div>
                    <?php Form::close()?>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Selections</h4>
                    <a href="/HomeController/bookEvent?event_id=<?php echo $selection->event_id?>&package_id=<?php echo $selection->package_id?>">Change Selections</a>
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
            </div>
        </div>
    </div>
  </div>
<?php endbuild()?>
<?php loadTo('tmp/public')?>