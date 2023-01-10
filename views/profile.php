<?php
$usersController = new UsersController();
$user = $usersController->getUser();
?>

<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<?php include('./views/includes/alerts.php'); ?>
			<div class="card">
				<div class="card-header">
					<div class="d-flex justify-content-between align-items-center">
						<a href="<?php echo BASE_URL; ?>" class="btn btn-sm btn-secondary">
							<i class="fas fa-home"></i>
						</a>
						<a href="<?php echo BASE_URL; ?>logout" title="Log out" class="btn btn-light">Log out</a>
					</div>
				</div>
				<div class="card-body bg-light">
					<div class="mb-3">
						<h1 class="m-0"><?php echo $user->fname . ' ' . $user->lname; ?></h1>
						<p class="m-0"><?php echo $user->email; ?></p>
					</div>
					<div>
						<span>Date of Birth: </span>
						<?php $birthDate = $createDate = new DateTime($user->dob); ?>
						<span><?php echo $birthDate->format('Y-m-d'); ?></span>
					</div>
					<div>
						<span>Phone Number: </span>
						<span><?php echo $user->phone; ?></span>
					</div>
				</div>
				<div class="card-footer">
					<div class="d-flex justify-content-center">
						<form class="mr-1" method="post" action="update">
							<input type="hidden" name="id" value="<?php echo $user->id; ?>">
							<button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</button>
						</form>
						<form class="ml-1" method="post" action="delete">
							<input type="hidden" name="id" value="<?php echo $user->id; ?>">
							<button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
