<?php
$page="Login";
$ASSET_PATH = $_SERVER['DOCUMENT_ROOT']."/assets/php";
require($ASSET_PATH."/header.inc");
?>
	<body>
  		<div class="login-container">
			<form class="signin" id="signin" role="form">
				<input type="email" class="form-control" name="email" id="email" autofocus="autofocus" required>
				<input type="password" class="form-control" name="password" id="password" required>
				<button class="login-submit" type="submit">Login</button>
			</form>
		</div>
		<div id="footer">		
		<div class="container">
			<small id="commit">Commit <?php echo substr(`git rev-parse --verify HEAD`,0,7); ?></small>
		</div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	</body>
</html>