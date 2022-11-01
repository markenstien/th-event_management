<?php build('content')?>	
	<div class="col-md-7">
		
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Create New Package Item</h4>
				<?php echo wLinkDefault(_route('service:index'), 'List of Items')?>
			</div>
			<div class="card-body">
				<?php Flash::show()?>
				<?php __( $form->start() )?>

					<div class="form-group">
						<?php
							__( $form->getRow('service') );
						?>
					</div>

					<div class="form-group">
						<?php
							__( $form->getRow('category_id') );
						?>
					</div>
					

					<div class="form-group">
						<?php
							__( $form->getRow('status') );
						?>
					</div>
					

					<div class="form-group">
						<?php
							__( $form->getRow('description') );
						?>
					</div>

					<div class="form-group">
						<?php
							__( $form->get('submit') );
						?>
					</div>
				<?php __( $form->end() )?>
			</div>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>