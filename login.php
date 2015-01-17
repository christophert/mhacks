<?php
$page="Login";
$ASSET_PATH = $_SERVER['DOCUMENT_ROOT']."/assets/php";
require($ASSET_PATH."/header.inc");
?>
<<<<<<< HEAD
  		<div class="login-container">
  		<h1 class="page-heading">
=======
	<body>
  		<div class="login-container">
>>>>>>> production
			<form class="signin" id="signin" role="form">
				<input type="email" class="form-control" placeholder="email@domain.com" name="email" id="email" autofocus="autofocus" required>
				<input type="password" class="form-control" placeholder="password" name="password" id="password" required>
				<button class="login-submit" type="submit">Login</button>
			</form>
		</div>
<<<<<<< HEAD
<?php
require($ASSET_PATH."/footer.inc");
?>
=======
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
>>>>>>> production
