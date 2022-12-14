<?php build('content')?>
	<div class="container mt-5">
		<div class="col-md-7 mx-auto">
			<?php Flash::show()?>
			<div class="card">
				<div class="card-header text-center">
					<h4 class="card-title">Login-Form</h4>
					<p>Welcome to <span class="badge bg-warning"><?php echo COMPANY_NAME?></span> Portal</p>
					<?php echo wLinkDefault(_route('home:index'), 'Back to main page')?>
				</div>
				<div class="card-body">
					<?php 
						__( $form->start() );
					?>
					<div style="text-align: center">
						<img src="<?php echo _path_upload_get('logo_default.png')?>" 
							alt="logo" style="width: 150px;">
						</div>
					<div class="form-group">
						<?php
							__( $form->getCol('username') );
						?>
					</div>
					<div class="form-group">
						<?php
							__( $form->getCol('password') );
						?>
					</div>

					<div>
						<?php __($form->get('submit')) ?>
					</div>
					<?php __( $form->end() )?>
				</div>
			</div>
		</div>
	</div>
<?php endbuild()?>

<?php build('styles')?>
	<style type="text/css">
		div.bordered-form-element
		{
			border: 1px solid #000;
			margin-bottom: 2px;
			padding: 5px;
		}
	</style>
<?php endbuild()?>
<?php loadTo('tmp/base')?>