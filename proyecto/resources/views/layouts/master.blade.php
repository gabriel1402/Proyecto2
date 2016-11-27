<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Free Web tutorials">
	<meta name="keywords" content="HTML,CSS,XML,JavaScript">
	<meta name="author" content="Hege Refsnes">
	<title>Bienes en Costa Rica - @yield('title')</title>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="css/styles.css">
	<script src="js/custom.js"></script>

</head>
<body>
	<div class="row headTop">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
			<div class="row">
				<img src="/img/logo.png" height="100px">
			</div>
		</div>
	</div>
	<div class="navbar navbar-default navbar-custom" role="navigation">
	    <div class="container">
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	        </div>
	        <div class="collapse navbar-collapse">
	            <ul class="nav navbar-nav">
	                @yield('menu')
	            </ul>
	            <ul class="nav navbar-nav navbar-right">
           	 		@yield('userBarMenu')
			      <form class="navbar-form navbar-left">
			      <div class="input-group">
			        <input type="text" class="form-control" placeholder="Search">
			        <div class="input-group-btn">
			          <button class="btn btn-default" type="submit">
			            <i class="glyphicon glyphicon-search"></i>
			          </button>
			        </div>
			      </div>
			    </form>
			    </ul>
	        </div><!--/.nav-collapse -->
	    </div>
	</div>
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
			<div class="row">
				@yield('content')
			</div>
		</div>
	</div>
	<footer class="row">
      <div class="col-md-12">
        <hr class="hrstyle13" />
        <div class="row">
        	<div class="col-md-3">
        	</div>
	          <div class="col-md-6">
	            <p>&copy; Copyright <?php echo date('Y'); ?>.</p>
	          </div>
        </div>
      </div>
    </footer>
</body>
</html>