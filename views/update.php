<?php
if (isset($_POST['id'])) {
	$usersController = new UsersController();
	$user = $usersController->getUser();
} else {
	Redirect::to('home');
}
if (isset($_POST['submit'])) {
	$usersController = new UsersController();
	$usersController->updateUser();
}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Update Your Details</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL; ?>" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
						<div class="form-group">
							<label for="nom">First Name*</label>
							<input type="text" name="fname" class="form-control" placeholder="First Name" value="<?php echo $user->fname; ?>">
						</div>
						<div class="form-group">
							<label for="prenom">Last Name*</label>
							<input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php echo $user->lname; ?>">
						</div>
						<div class="form-group">
							<label for="mat">Email*</label>
							<input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email; ?>">
						</div>
						<div class="form-group">
							<label for="depart">Phone Number*</label>
							<input type="text" name="phone" class="form-control" placeholder="Phone Number" value="<?php echo $user->phone; ?>">
							<input type="hidden" name="id" value="<?php echo $user->id; ?>">
						</div>
						<div class="form-group">
							<label for="date_emb">Date of Birth*</label>
							<?php $birthDate = $createDate = new DateTime($user->dob); ?>
							<input type="date" name="dob" class="form-control" value="<?php echo $birthDate->format('Y-m-d'); ?>">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary" name="submit">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
