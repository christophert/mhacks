<?php
$page="Login";
$ASSET_PATH = $_SERVER['DOCUMENT_ROOT']."/assets/php";
require($ASSET_PATH."/header.inc");
?>
	<body>
		<div class ="strive-header"> <h1> <span style= "font-size:42px">S</span>TRIVE</h1>
		</div>
  		<div class="login-container">
			<form class="signin" id="signin" role="form">
				<input type="email" class="form-control" placeholder="email@domain.com" name="email" id="email" autofocus="autofocus" required>
				<input type="password" class="form-control" placeholder="password" name="password" id="password" required>
				<button class="login-submit" type="submit">Login</button>
			</form>
		</div>
<?php
require($ASSET_PATH."/footer.inc");
?>