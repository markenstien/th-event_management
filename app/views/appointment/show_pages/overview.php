<?php
    $appointment = $data['appointment'];
    $payments = $data['payments'];
    $user = $data['user'];
?>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">General</h4>
                <?php if(isEqual($appointment->status, 'arrived')) :?>
                    <span class="badge bg-success">Approved</span>
                    <?php else:?>
                    <span class="badge bg-warning"><?php echo $appointment->status?></span>
                <?php endif?>
            </div>
            <div class="card-body">
                <?php if(!isEqual(whoIs('user_type'), 'customer')) :?>
                <div style="text-align: right;">
                    <a href="<?php echo _route('appointment:approve', $appointment->id)?>" class="btn btn-primary btn-sm"> Approve </a>
                    <a href="<?php echo _route('appointment:cancel', $appointment->id)?>" class="btn btn-warning btn-sm"> Cancel </a>
                </div>
                <?php endif?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td>Reference</td>
                            <td><?php echo $appointment->reference?></td>
                        </tr>
                        <tr>
                            <td>Event</td>
                            <td><?php echo GLOBAL_VAR['events'][$appointment->event]['name']?></td>
                        </tr>
                        <tr>
                            <td>Package</td>
                            <td><?php echo GLOBAL_VAR['packages'][$appointment->package]['name']?></td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td><?php echo $appointment->date?></td>
                        </tr>
                        <tr>
                            <td>Arrival Time</td>
                            <td><?php echo $appointment->start_time?></td>
                        </tr>
                        <tr>
                            <td>Initial Amount</td>
                            <td><?php echo $appointment->initial_amount?></td>
                        </tr>
                        <tr>
                            <td>Remaining Balance</td>
                            <td><?php echo $appointment->remaning_balance?></td>
                        </tr>
                    </table>
                </div>
                <p>
                    <strong>Note the team about the design or theme of cake, cupcake, souvenir, and decorations</strong>
                    <?php echo $appointment->description?>
                </p>
                <hr>
                <p>
                    <strong>Address</strong>
                    <?php echo $appointment->address?>
                </p>
            </div>

            <div class="card-footer">
                <h5>Inclusions</h5>
                <?php
                    $selections = json_decode($appointment->selections);
                    $inclusions = $selections->inclusion;
                ?>

                <table class="table table-bordered">
                    <?php foreach($inclusions as $incIndex => $categories) :?>                        <tr>
                            <?php
                                if (!isEqual($incIndex, ['main_dish','vegetable_dish'])) {
                                    echo '<td>'.GLOBAL_VAR['packageGroupKeys'][$incIndex].'</td>'; 
                                    ?> 
                                        <td>
                                            <?php
                                                if (is_array($categories)) {
                                                    foreach($categories as $catKey => $catVal) {
                                                        ?>
                                                            <div>
                                                                <label for="#"><?php echo $catVal?></label>
                                                            </div>
                                                        <?php
                                                    }
                                                } else {
                                                    ?> 
                                                        <div>
                                                            <label for="#"><?php echo $categories?></label>
                                                        </div>
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                    <?php
                                } else {
                                    echo '<td>'.GLOBAL_VAR['packageGroupKeys'][$incIndex].'</td>'; 
                                    echo '<td>';
                                    foreach($categories as $catKey => $catVal) :
                                        ?>
                                            <div>
                                                <label for="#"><?php echo $catVal?></label>
                                            </div>
                                        <?php
                                        endforeach;
                                    echo '</td>';
                                }
                            ?>
                        <?php endforeach?>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Payments</h4>
                <!-- Button trigger modal -->
                <?php echo wLinkDefault('#', 'Add Payment', [
                    'data-bs-toggle' => 'modal',
                    'data-bs-target' => '#paymentModal'
                ])?>
            </div>
            <div class="card-body">
                <?php if($payments) :?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <th>#</th>
                                <th>Reference</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>

                            <tbody>
                                <?php foreach($payments as $key => $row) :?>
                                    <tr>
                                        <td><?php echo ++$key?></td>
                                        <td><?php echo $row->reference?></td>
                                        <td><?php echo $row->amount?></td>
                                        <td><?php echo $row->status?></td>
                                        <td>
                                            <?php echo wLinkDefault(_route('payment:show', $row->id), 'Show');?>
                                            <?php 
                                                if(!whoIs('user_type','customer')) {
                                                    echo wLinkDefault(_route('appointment:updatePayment', null, [
                                                        'action' => 'approve',
                                                        'payment_id' => $row->id,
                                                        'appointment_id' => $appointment->id
                                                    ]), 'Approve');
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
                <?php endif?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Guest</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td>Guest</td>
                            <td><?php echo $appointment->name?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $appointment->email?></td>
                        </tr>
                        <tr>
                            <td>Mobile</td>
                            <td><?php echo $appointment->phone_number?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <?php
            Form::open([
                'method' => 'post',
                'action' => _route('appointment:addPayment', null, [
                    'redirectTo' => seal(_route('appointment:show', $appointment->id))
                ]),
                'enctype' => 'multipart/form-data'
            ]);

            Form::hidden('parent_id', $appointment->id);
            Form::hidden('meta_key', 'RESERVATION');
        ?>
            <div class="form-group">
                <?php
                    Form::label('Amount *');
                    Form::text('amount', '' , ['class' => 'form-control', 'required' => true]);
                ?>
            </div>

            <div class="form-group">
                <?php
                    Form::label('Reference');
                    Form::text('external_reference', '' , ['class' => 'form-control', 'required' => true]);
                ?>
            </div>

            <div class="form-group mt-2">
                <?php
                    Form::label('Proof of Payment');
                    Form::file('payment', ['class' => 'form-control', 'required' => true]);
                ?>
            </div>

            <div class="form-group mt-2">
                <?php
                    Form::submit('add_payment', 'Save Payment');
                ?>
            </div>
        <?php Form::close()?>
      </div>
    </div>
  </div>
</div>
