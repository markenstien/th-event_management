<?php build('content')?>
	<div class="col-md-5">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Payment Overview</h4>
				<?php echo wLinkDefault(_route('appointment:show', $payment->parent_id), 'Show Appointment')?>
			</div>
			<div class="card-body">
				<?php Flash::show()?>
				<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<td>Referece</td>
							<td><?php echo $payment->reference?></td>
						</tr>
						<tr>
							<td>Amount</td>
							<td><?php echo amountHTML($payment->amount)?></td>
						</tr>
						<tr>
							<td>External Referece</td>
							<td><?php echo $payment->external_reference?></td>
						</tr>
						<tr>
							<td>Status</td>
							<td><?php echo $payment->status?></td>
						</tr>
						<?php if(!isEqual(whoIs('user_type'), 'customer')) :?>
						<tr>
							<td>Action</td>
							<td>
								<?php echo wLinkDefault(_route('payment:approve', $payment->id), 'Approve') ?>| 
								<?php echo wLinkDefault(_route('payment:decline', $payment->id), 'Decline') ?> 
							</td>
						</tr>
						<?php endif?>
					</table>
				</div>
			</div>

			<div class="card-footer">
				<h4>Image</h4>
				<?php if($payment->pictures) :?>
					<?php foreach($payment->pictures as $key => $row) :?>
						<?php $imgVal = json_decode($row->meta_value)?>
						<img src="<?php echo GET_PATH_UPLOAD.DS.'payments/'.$imgVal->name?>"
							alt="" style="width: 250px">
					<?php endforeach?>
				<?php endif?>
			</div>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>