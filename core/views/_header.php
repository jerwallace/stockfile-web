<!DOCTYPE html>
<html>
	<head>
		<title>Stockfile.ca</title>
		<meta charset="utf-8" />
		
		<!-- Links to provided files.  Do not edit or remove these links -->
		<link href="images/favicon.png" type="image/png" rel="shortcut icon" />

		<!-- Link to your CSS file that you should edit -->
		<link href="core/views/css/styles.css" type="text/css" rel="stylesheet" />
        
        <script src="//ajax.googleapis.com/ajax/libs/prototype/1.7.1.0/prototype.js"></script>
        <script src="core/views/js/scripts.js"></script>
	</head>

	<body>
		<div id="wrapper">
        	
			<header>
                                <div id="add-link"><a href="?login">Login to stockfile</a></div>
				<a href="index.php"><img src="images/logo.png" class="logo" alt="banner logo" /></a>
				Welcome to Stockfile.
			</header>

			<article>
				<!-- your HTML output follows -->
                                 <div id="content">
                                     <h1><?php echo $title; ?></h1>
                                     <p><?php echo $caption; ?></p>