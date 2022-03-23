<?php
 ob_start();
 session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link href="<?php echo $cssDir ; ?>all.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo $cssDir ; ?>style.css" />
	
	<link rel="icon" type="image/png" href="https://images.unidays.world/i/favicons/set-a/favicon-196x196.png" />

    <base href="my">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui" />
	<title><?php  global $pageTitle;   echo $pageTitle ; ?></title>
	<meta name="description" content="" />

</head>
<body>


