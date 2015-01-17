<?php
$page="Login";
$ASSET_PATH = $_SERVER['DOCUMENT_ROOT']."/assets/php";
require($ASSET_PATH."/header.inc");
?>
  		<div class="login-container">
  		<h1 class="page-heading">
			<form class="signin" id="signin" role="form">
				<input type="email" class="form-control" placeholder="email@domain.com" name="email" id="email" autofocus="autofocus" required>
				<input type="password" class="form-control" placeholder="password" name="password" id="password" required>
				<button class="login-submit" type="submit">Login</button>
			</form>
		</div>
<?php
require($ASSET_PATH."/footer.inc");
?>