<?php build('content') ?>
	
	<div class="col-md-8 mx-auto">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Report</h4>
			</div>

			<div class="card-body">
				<?php if(!isset($_GET['report_create'])) :?>
					<div class="col-md-8 mx-auto">
						<h5 class="text-center">Report Filter</h5>
						<?php Form::open(['method' => 'get'])?>
							<div class="form-group row">
								<div class="col">
									<?php
										Form::label('Start Date');
										Form::date('start_date' , '' , ['class' => 'form-control' , 'required' => true])
									?>
								</div>
								<div class="col">
									<?php
										Form::label('End Date');
										Form::date('end_date' , '' , ['class' => 'form-control' , 'required' => true])
									?>
								</div>
							</div>
							
							<div>
								<?php Form::submit('report_create' , 'Create Report')?>
							</div>
						<?php Form::close()?>
					</div>
				<?php else:?>
					<a href="?">Re-Filter</a>
				<?php endif?>
				<?php if(!empty($data)) :?>
					<div class="table-resonsive mt-3">
						<table class="table table-bordered">
							<thead>
								<th>#</th>
								<th>Reference</th>
								<th>Event</th>
								<th>Category</th>
								<th>Amount</th>
								<th>Balance</th>
								<th>Date</th>
							</thead>

							<tbody>
								<?php foreach($reports as $key => $row) :?>
									<tr>
										<td><?php echo ++$key?></td>
										<td><?php echo $row->reference?></td>
										<td><?php echo GLOBAL_VAR['events'][$row->event]['name']?></td>
										<td><?php echo GLOBAL_VAR['packages'][$row->package]['name']?></td>
										<td><?php echo $row->initial_amount?></td>
										<td><?php echo $row->initial_amount?></td>
										<td><?php echo $row->date?></td>
									</tr>
								<?php endforeach?>
							</tbody>
						</table>
					</div>

					<section class="mt-3">
						<h4>Summary</h4>
						<div class="row">
							<div class="col-md-6">
								<table class="table table-bordered">
									<?php foreach($summary['events'] as $key => $row) :?>
										<tr>
											<td><?php echo GLOBAL_VAR['events'][$key]['name']?></td>
											<td><?php echo $row?></td>
										</tr>
									<?php endforeach?>
								</table>
							</div>

							<div class="col-md-6">
								<table class="table table-bordered">
									<?php foreach($summary['packages'] as $key => $row) :?>
										<tr>
											<td><?php echo GLOBAL_VAR['packages'][$key]['name']?></td>
											<td><?php echo $row?></td>
											<td><?php echo GLOBAL_VAR['packages'][$key]['price'] * $row?></td>
										</tr>
									<?php endforeach?>
								</table>
							</div>
						</div>
					</section>
				<?php endif?>
			</div>
		</div>
	</div>
<?php endbuild()?>



<?php loadTo()?>