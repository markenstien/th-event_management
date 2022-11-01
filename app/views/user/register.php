<?php build('content')?>
	<div class="col-md-7 mx-auto">
		<div class="text-center">
			<div class="alert alert-primary">
				<p class="text-primary">Register to <?php echo COMPANY_NAME?></p>
			</div>
			<?php echo wLinkDefault(_route('home:index'), 'Back to main page')?>
		</div>
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

							<div class="form-group">
								<?php
									__( $form->getRow('birthdate') );
								?>
							</div>

							<div class="form-group">
								<?php
									__( $form->getRow('gender') );
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

							<div class="form-group">
								<?php
									__( $form->getRow('address') );
								?>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-5">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Credentials</h4>
						</div>

						<div class="card-body">
							<div class="form-group">
								<?php
									__( $form->getRow('username') );
								?>
							</div>

							<div class="form-group">
								<?php
									__( $form->getRow('password') );
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
	</div>
<?php endbuild()?>
<?php loadTo('tmp/base')?>