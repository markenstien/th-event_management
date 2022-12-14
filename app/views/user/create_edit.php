<?php build('page-control')?>
	<a href="<?php echo _route('user:index')?>" 
		class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
    class="fas fa-users fa-sm text-white-50"></i> Users </a>
<?php endbuild()?>


<?php build('content')?>
	<?php Flash::show()?>
	<?php __( $form->start() )?>
		<div class="row">
			<div class="col-md-7">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Personal</h4>
					</div>
					<div class="card-body">
						<div class="form-group">
							<?php
								__( $form->getRow('first_name') );
							?>
						</div>

						<div class="form-group">
							<?php
								__( $form->getRow('last_name') );
							?>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Contact</h4>
					</div>
					<div class="card-body">
						<div class="form-group">
							<?php
								__( $form->getRow('email') );
							?>
						</div>

						<div class="form-group">
							<?php
								__( $form->getRow('phone_number') );
							?>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-5">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Auth</h4>
					</div>

					<div class="card-body">
						<div class="form-group">
							<?php __( $form->getRow('username'))?>
						</div>

						<div class="form-group">
							<?php
								__( $form->getRow('password'));
							?>
						</div>

						<div>
							
							<?php __( $form->get('submit' , ['value' => 'Save']) )?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	<?php __( $form->end() )?>
<?php endbuild()?>
	<?php build('scripts')?>
		<script type="text/javascript" src="<?php echo _path_public('js/user-logic.js')?>"></script>
	<?php endbuild()?>
<?php loadTo()?>