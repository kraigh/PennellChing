<!DOCTYPE html>
<html lang="en">

<!--

PennellChing LLC Website
Developed by Kraig Hufstedler
kraig.hufstedler@gmail.com
http://kraigh.com

Development in pure HTML/CSS
Uses HTML5 for Facebook elements
Uses CSS3 for things like opacity, text-shadow, etc
Uses TypeKit for Fonts

-->

	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="stylesheet" type="text/css" href="gallery.css" />
		<link href="css/lightbox.css" rel="stylesheet" />

		
		<script type="text/javascript" src="http://use.typekit.com/nua5fjg.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		
		<script src="js/jquery-1.7.2.min.js"></script>
		<script src="js/lightbox.js"></script>
		
		
		<title>PennellChing LLC</title>	
	</head>
	
	
	
	<body>
	
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<div id="wrapper">
	
<!--	Begin header!-->
	
	<div id="header">
		<h1 class="logo">
			<a href="index.html">
			<img src="images/logo.png" alt="Home" />
			</a>
		</h1>
	</div>
	
<!--End header!-->
	
	
<!--	Begin menu!-->
	
	<div class="nav">
	<ul>
		<li>
			<a href="index.html">Home</a>
		</li>
		<li>
			<a href="about.html">About Us</a>
		</li>
		<li>
			<a href="perspective.html">Our Perspective</a>
		</li>
		<li>
			<a href="work.html" class="active">Our Work</a>
		</li>
		<li>
			<a href="values.html">Our Values</a>
		</li>
		<li>
			<a href="contact.html">Contact Us</a>
		</li>
	</ul>
		
	</div>
	
<!--	End menu!-->
	
	
	
	
	
	
	
<!--	Begin body!-->

	<div class="body" id="work">
	
	<div class="quotewrapper">
	
	<div class="iconcontainer" id="leftcontainer">
	<img src="images/quoteleft.png" class="quoteicon" id="quoteleft" alt="Quote Icon">
	</div>	
	<div id="quotetext">	
	
<!--	##################    QUOTE GOES HERE   ##################-->

		<p>PennellChing exists to meet the need for sufficient funding and the related development strategies for ministries that are busy in the work of the Kingdom.</p>
		
		
	</div>
	<div class="iconcontainer" id="rightcontainer">
	<img src="images/quoteright.png" class="quoteicon" id="quoteright" alt="Quote Icon">
	</div>
	</div>
	
	
	
	<!--	##################    INTRO TEXT (ONLY 340 px wide)   ##################-->
	
	
		<div id="workgallery" class="frontpage">
		
<!--		<a href="images/work/CareNetInside1.jpg" rel="lightbox[work]"><img src="images/work/CareNetInside1.jpg" alt="CareNet"></a>
		<a href="images/work/CareNetInside2.jpg" rel="lightbox[work]"><img src="images/work/CareNetInside1.jpg" alt="CareNet"></a>
		<a href="images/work/CareNetInside3.jpg" rel="lightbox[work]"><img src="images/work/CareNetInside1.jpg" alt="CareNet"></a>
		<a href="images/work/CareNetInside4.jpg" rel="lightbox[work]"><img src="images/work/CareNetInside1.jpg" alt="CareNet"></a>						
		<a href="images/work/CareNetOutside.jpg" rel="lightbox[work]"><img src="images/work/CareNetInside1.jpg" alt="CareNet"></a>		
		<a href="images/work/CareNetOutsideOther.jpg" rel="lightbox[work]"><img src="images/work/CareNetInside1.jpg" alt="CareNet"></a>		
		<a href="images/work/CEFInside.jpg" rel="lightbox[work]"><img src="images/work/CareNetInside1.jpg" alt="CareNet"></a>	-->	
		
		<?php 
		/* function:  generates thumbnail */
		function make_thumb($src,$dest,$desired_width) {
		  /* read the source image */
		  $source_image = imagecreatefromjpeg($src);
		  $width = imagesx($source_image);
		  $height = imagesy($source_image);
		  /* find the "desired height" of this thumbnail, relative to the desired width  */
		  $desired_height = floor($height*($desired_width/$width));
		  /* create a new, "virtual" image */
		  $virtual_image = imagecreatetruecolor($desired_width,$desired_height);
		  /* copy source image at a resized size */
		  imagecopyresized($virtual_image,$source_image,0,0,0,0,$desired_width,$desired_height,$width,$height);
		  /* create the physical thumbnail image to its destination */
		  imagejpeg($virtual_image,$dest);
		}
		
		/* function:  returns files from dir */
		function get_files($images_dir,$exts = array('jpg')) {
		  $files = array();
		  if($handle = opendir($images_dir)) {
		    while(false !== ($file = readdir($handle))) {
		      $extension = strtolower(get_file_extension($file));
		      if($extension && in_array($extension,$exts)) {
		        $files[] = $file;
		      }
		    }
		    closedir($handle);
		  }
		  return $files;
		}
		
		/* function:  returns a file's extension */
		function get_file_extension($file_name) {
		  return substr(strrchr($file_name,'.'),1);
		}
		
		
		/** settings **/
		$images_dir = 'images/work/';
		$thumbs_dir = 'images/work/thumbs/';
		$thumbs_width = 175;
		$images_per_row = 3;
		
		/** generate photo gallery **/
		$image_files = get_files($images_dir);
		if(count($image_files)) {
		  $index = 0;
		  foreach($image_files as $index=>$file) {
		    $index++;
		    $thumbnail_image = $thumbs_dir.$file;
		    if(!file_exists($thumbnail_image)) {
		      $extension = get_file_extension($thumbnail_image);
		      if($extension) {
		        make_thumb($images_dir.$file,$thumbnail_image,$thumbs_width);
		      }
		    }
		    echo '<a href="',$images_dir.$file,'" class="galleryimg" rel="lightbox[work]"><img src="',$thumbnail_image,'" /></a>';
		    if($index % $images_per_row == 0) { echo '<div class="clear"></div>'; }
		  }
		  echo '<div class="clear"></div>';
		}
		else {
		  echo '<p>There are no images in this gallery.</p>';
		}
		
		
		 ?>
	
		
		
		
		
		
		</div>
		
		
		
	<!--	##################    ADD SUBORDINATE PAGES HERE!!!   ##################-->
	
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<!--	##################    STOP ADDING SUBORDINATE PAGES!!!   ##################-->
	
<!--	End body!-->

	</div>
	
<!--	Begin Footer-->
	
	<div class="footer">
	
	<ul class="menu">
		<li><a href="index.html">Home</a></li>
		<li><a href="about.html">About</a></li>
		<li><a href="perspective.html">Perspective</a></li>
		<li><a href="work.html">Work</a></li>
		<li><a href="values.html">Values</a></li>
		<li><a href="contact.html">Contact</a></li>
	</ul>
	
	<ul class="contact">

		<li id="facebook"><div class="fb-like" data-href="http://www.pennellching.com" data-send="true" data-layout="button_count" data-width="225" data-show-faces="false" data-action="recommend" data-colorscheme="dark"></div></li>
		<li><br></li>
		<li>PennellChing Development</li>
		<li>5047 North Highway A1A</li>
		<li>Unit 1703</li>
		<li>North Hutchinson Island, FL 34949</li>
	</ul>
	
	<ul class="site">

		<li id="email">Email: <a href="mailto:info@pennellching.com">info@pennellching.com</a></li>
		<li><br></li>
		<li class="design">Site Developed by:</li>
		<li><a href="mailto:kraig.hufstedler@gmail.com">Kraig Hufstedler</a></li>
		<li><br></li>
		<li id="sitemap"><a href="sitemap">Sitemap</a></li>
	</ul>
	
	
	
	</div>
	
	<!--End Footer-->
	
	</div>

	</body>
	
</html>
	
	