<?php
require_once 'includes/SpecificAPI.php';
require_once 'includes/Custom.php';
require_once 'includes/ArticlesFactory.php';


$service = new SpecificAPI( $details );
$articles = Articles::getInstance();
$record  = $service->getRecord( '007' );
$articles->appendArticles($record);
$articleArray = $articles->getArray($articles);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Such code</title>

	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/nav.css" />
	<link rel="stylesheet" href="css/responsive.css" />
	<link rel="stylesheet" href="css/grid.css" />

</head>
<body>

	
	<section class="section-header">
		<header>ARKENEA 
			<nav class="alignright">
				<ul>
					<li><a href="#">Portfolio</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Pricing</a></li>
					<li><a href="#">Careers</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Get a quote</a></li>
				</ul>
				
			</nav>
		</header>
		<div style="clear: both;"></div>
		<div class="jumbotron">
			<h1><?= $title ?></h1>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
			</p>
			<p><strong>GOOD NEWS</strong> - You've come to the right place.</p>
			<p>
				<form class="form-inline">
					<span><input type="text" placeholder="*Your Email Address"></span>
					<span><a class="btn btn-primary" href="#">Request a Quote</a></span>
					<div style="clear:both"></div>
				</form>
			</p>
		</div>

	</section>


	<section  class="content">
		<section>
			<h1>Our success stories</h1>
			<hr />
			<div id="container">
				<a id="btn-return" onClick="returnArticles();">Previous</a>
				<pre class="demo-container"><code><p></p></code></pre>
				<div id="articles">
					<?php foreach ($articleArray as $item) { ?>
					<div class="item">

						<img src="<?php echo $item->pic; ?>" />

						<h3><?php echo mb_strimwidth((string)$item->title, 0, 40, "..."); ?></h3>
						<a onClick="showDetails('<?php echo $item->id;?>');">Continue reading...</a>
					</div>
					<?php } ?>
				</div>
			</div>
			<div style="clear:both"></div>
		</section>
	</section>


	<script src="js/jquery.min.js"></script>
	<script src="js/init.js"></script>

</body>
</html>