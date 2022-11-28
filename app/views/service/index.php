<?php build('page-control')?>
	<a href="<?php echo _route('service:create')?>" 
		class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
    class="fas fa-plus fa-sm text-white-50"></i> Add Service</a>
<?php endbuild()?>

<?php build('content')?>
	<?php Flash::show()?>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Package Items</h4>
			<?php echo wLinkDefault(_route('service:create'), 'Add new Item')?>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered dataTable">
					<thead>
						<th>#</th>
						<th>Ref</th>
						<th>Service</th>
						<th>Category</th>
						<th>Descriotion</th>
						<th>Status</th>
					</thead>

					<tbody>
						<?php foreach($services as $key => $row) :?>
							<tr>
								<td><?php echo ++$key?></td>
								<td><?php echo $row->code?></td>
								<td><?php echo $row->service?></td>
								<td><?php echo $row->category?></td>
								<td><?php echo $row->description?></td>
								<td><?php echo $row->is_visible == true ? 'Active' : 'In-Active'?></td>
							</tr>
						<?php endforeach?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>