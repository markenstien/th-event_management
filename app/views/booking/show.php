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
    <div class="col-md-7 mx-auto">
        <?php Flash::show()?>
        <div class="card">
            <div class="card-header text-center">
                <h4 class="card-title">Booking Reference : <?php echo $booking->reference?></h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td>Customer:</td>
                            <td><?php echo $booking->name?></td>
                        </tr>

                        <tr>
                            <td>Package:</td>
                            <td><?php echo GLOBAL_VAR['packages'][$booking->package]['name']?></td>
                        </tr>
                        <tr>
                            <td>Event:</td>
                            <td><?php echo GLOBAL_VAR['events'][$booking->event]['name']?></td>
                        </tr>

                        <tr>
                            <td>Event Price:</td>
                            <td><?php echo amountHTML($booking->initial_amount)?></td>
                        </tr>

                        <tr>
                            <td>Remaining Balance:</td>
                            <td><?php echo amountHTML($booking->remaning_balance)?></td>
                        </tr>

                        <tr>
                            <td>Event Date:</td>
                            <td><?php echo $booking->date?></td>
                        </tr>

                        <tr>
                            <td>Description:</td>
                            <td><?php echo $booking->description?></td>
                        </tr>

                        <tr>
                            <td>Address:</td>
                            <td><?php echo $booking->address?></td>
                        </tr>
                    </table>
                </div>

                <div>
                    <h5>Inclusions</h5>
                    <?php
                        $selections = json_decode($booking->selections);
                        $inclusions = $selections->inclusion;
                    ?>
                    <table class="table table-bordered">
                        <?php foreach($inclusions as $incIndex => $categories) :?>
                            <tr>
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
                                        foreach ($categories as $catKey => $catVal) :
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
        </div>
    </div>
<?php endbuild()?>
<?php loadTo('tmp/public')?>