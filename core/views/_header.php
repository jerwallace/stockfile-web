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
        
        <script src="http://ajax.googleapis.com/ajax/libs/scriptaculous/1.9.0/scriptaculous.js"
 				type="text/javascript"></script>

	</head>

	<body>
		<div id="wrapper">
        	
			<header>
				<a href="index.php"><img src="images/logo.png" class="logo" alt="banner logo" /></a>
				Welcome to Stockfile.
			</header>
			
			<form method="post">
				<input id="logout" type="hidden" value="log out">
			</form>
			
			<article>
				<!-- your HTML output follows -->
                                 <div id="content">
                                     <h1><?php echo $title; ?></h1>
                                     <p><?php echo $caption; ?></p>
                                     <div id="fileList"></div>
                                     <div id="clientList"></div>
                                     