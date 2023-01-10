<?php 
	if(isset($_POST['id'])){
		$usersController = new UsersController();
		$usersController->deleteUser();
	}
?>
