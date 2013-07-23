<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title." - ".$caption; ?></title>
		<meta charset="utf-8" />
		<meta name="description" content="<?php echo $description; ?>">
		<!-- Links to provided files.  Do not edit or remove these links -->
		<link href="images/favicon.png" type="image/png" rel="shortcut icon" />

		<!-- Link to your CSS file that you should edit -->
		<link href="core/views/css/styles.css" type="text/css" rel="stylesheet" />
        
        <script src="//ajax.googleapis.com/ajax/libs/prototype/1.7.1.0/prototype.js"></script>
        
        <script src="http://ajax.googleapis.com/ajax/libs/scriptaculous/1.9.0/scriptaculous.js"
 				type="text/javascript"></script>

	</head>

	<body>
		<div id="wrapper">
        	
			<header>
				<a href="index.php"><img src="images/logo.png" class="logo" alt="banner logo" /></a>
				<?php echo $caption; ?>
			</header>
			
			<article>
				<!-- your HTML output follows -->
				
				<form method="post">
					<input id="logout" type="hidden" value="logMeOut" name="logout">
				</form>
                                 <div class="content">
                                     <h1><?php echo $title; ?></h1>
                                     <p><?php echo $description; ?></p>
                                     <p><?php echo $loginmessage; ?></p>
                                     <div id="fileList"></div>
                                     <div id="clientList"></div>
                                     