<?php build('content')?>
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Package : <?php echo $bundle->name?></h4>
				</div>
				<div class="card-body">
					<?php Flash::show()?>
					<section>
						<h5 class="mb-2">Package Details</h5>
						<div class="table-responsive">
							<table class="table table-bordered">
								<tr>
									<td>Bundle Name</td>
									<td><?php echo $bundle->name?></td>
								</tr>
								<tr>
									<td>Code</td>
									<td><?php echo $bundle->code?></td>
								</tr>
								<tr>
									<td>Price</td>
									<td><?php echo $bundle->public_price?></td>
								</tr>
								<tr>
									<td>Description</td>
									<td><?php echo $bundle->description?></td>
								</tr>
							</table>
						</div>
					</section>
					<?php echo wDivider()?>
					<section>
						<h5 class="mb-2">Items</h5>
						<div class="table-responsive">
							<table class="table table-bordered">
								<?php foreach($bundle_items as $row) :?>
									<tr>
										<td style="width: 50%;">
											<a href="#"><?php echo $row->service?> (<?php echo $row->code?>)</a>
										</td>
										<td style="width: 40%;">
											<a href="#"><?php echo $row->category?></a>
										</td>
										<td><a href="<?php echo _route('service-bundle-item:delete' , $row->id)?>">Remove</a></td>
									</tr>
								<?php endforeach?>
							</table>
						</div>
					</section>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Gallery</h4>
				</div>

				<div class="card-body">
					<?php echo $attachmentForm->getForm()?>
					<section class="mt-5">
						<h5>Images</h5>
						<div class="row">
							<?php foreach($attachments as $key => $row) :?>
								<div class="col-md-4">
									<img src="<?php echo $row->full_url?>" alt="" style="width: 100%;">
									<small><?php echo $row->display_name?></small>
								</div>
							<?php endforeach?>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Add Items Into Package</h4>
				</div>
				<div class="card-body">
					<div class="row">
					<?php foreach($services as $row) :?>	
						<div class="col-md-4 mb-2">
							<div class="card">
								<div class="card-body">
									<p><?php echo $row->description?></p>
								</div>
								<div class="card-footer">
									<h6><?php echo $row->service?></h6>
									<div><a href="#"><small><?php echo $row->code?></small></a></div>
									<?php echo wDivider()?>
									<?php
										Form::open([
											'method' => 'post',
											'action' => _route('service-bundle-item:add' , $bundle_id)
										]);
										Form::hidden('service_id' , $row->id);
										Form::hidden('bundle_id' , $bundle_id);
										Form::submit('' , 'Add' , [
											'class' => 'btn btn-primary'
										]);
									?>

									<?php Form::close()?>
								</div>
							</div>
						</div>
					<?php endforeach?>
					</div>
				</div>
			</div>
		</div>


	</div>
<?php endbuild()?>
<?php loadTo()?>