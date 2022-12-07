<?php build('content')?>
	<div class="card">
		<?php Flash::show()?>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered dataTable">
					<thead>
						<th>#</th>
						<th>Reference</th>
						<th>Event</th>
						<th>Package</th>
						<th>Guest</th>
						<th>Date</th>
						<th>Status</th>
						<th>Action</th>
					</thead>

					<tbody>
						<?php foreach($events as $key => $appointment) :?>
							<tr>
								<td><?php echo ++$key?></td>
								<td><?php echo $appointment->reference?></td>
								<td><?php echo $appointment->event?></td>
								<td><?php echo $appointment->package?></td>
								<td><?php echo $appointment->name?></td>
								<td><?php echo $appointment->date?></td>
								<td><?php echo $appointment->status?></td>
								<td>
									<?php
										 echo wLinkDefault(_route('appointment:edit', $appointment->id));?>
								</td>
							</tr>
						<?php endforeach?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php endbuild()?>

<?php loadTo()?>