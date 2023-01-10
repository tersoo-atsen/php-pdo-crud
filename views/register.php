<?php
if (isset($_POST['submit'])) {
	$user = new UsersController();
	$user->register();
}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<?php include('./views/includes/alerts.php'); ?>
			<div class="card">
				<div class="card-header">
					<h3 class="text-center">Register</h3>
				</div>
				<div class="card-body bg-light">
					<form method="post" class="mr-1">
						<div class=row>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="fname" placeholder="First Name" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="lname" placeholder="Last Name" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="email" placeholder="Email Address" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="phone" placeholder="Phone Number" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="date" name="dob" placeholder="Date of Birth" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="password" name="password" placeholder="Password" class="form-control">
								</div>
							</div>
						</div>
						<button name="submit" class="btn btn-sm btn-primary">Register</button>
					</form>
				</div>
				<div class="card-footer">
					<a href="<?php echo BASE_URL; ?>login" class="btn btn-link">Login</a>
				</div>
			</div>
		</div>
	</div>
</div>
