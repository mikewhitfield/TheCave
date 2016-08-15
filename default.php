<?php
$channel_id = 'UCp_K44HUMKkgW-IjpSiD_-g'; // put the channel id here
$youtube = file_get_contents('https://www.youtube.com/feeds/videos.xml?channel_id='.$channel_id);
$xml = simplexml_load_string($youtube, "SimpleXMLElement", LIBXML_NOCDATA);
$json = json_encode($xml);
$youtube = json_decode($json, true);
$yt_vids = array();
$count = 0;
/*
foreach ($youtube['entry'] as $k => $v) {
    $yt_vids[$count]['id'] = str_replace('http://www.youtube.com/watch?v=', '', $v['link']['@attributes']['href']);
    $yt_vids[$count]['title'] = $v['title'];
    $count++;
}
print_r($yt_vids);
*/
?>

<!doctype html>
<!-- <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">-->
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>The HTML5 Herald</title>
  <meta name="description" content="Shoppa Entertainment">
  <meta name="author" content="BlackeyeProductions">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="stylesheet" href="css/style.css">

  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>

<body>
<!-- facebook-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- facebook-->

	<header id="pod-display">
	
		<div class="bg1"></div>
		
		
		<nav  class="nav-header">
			<div class="page">
				<a class="mobile_menu" title="menu" href="#"></a>
				<ul>
				  <li><a href="#podlist">Episodes</a></li>
				  <li><a href="#cavecrush">Crush</a></li>
				  <li><a href="#cavemen">Cavemen</a></li>
				  <li><a href="#social">whats Up</a></li>
				</ul>
			</div>
		</nav>
		
		<div class="container player ">
			<div class="page">
			<section id="podcast-player">
			<div id="audio_player">
				<audio class="pod-player" src="http://thecavepodcast.com/wp-content/uploads/2015/07/Inside-The-Cave-Face-Book-Drop-7_2_15-1.05-AM.mp3" controls></audio>
				
				<!-- <audio controls>
			<source class="mp3-player" src="http://thecavepodcast.com/wp-content/uploads/2015/07/Inside-The-Cave-Face-Book-Drop-7_2_15-1.05-AM.mp3" type="audio/mpeg" >
			<source class="ogg-player" src="http://thecavepodcast.com/wp-content/uploads/2015/07/Inside-The-Cave-Face-Book-Drop-7_2_15-1.05-AM.ogg" type="audio/ogg">
				Your browser does not support the audio tag.
				</audio> -->			
			</div>			
			</section>
		   	</div>
	   	</div>	
	   		
		<div class="page">
			<section id="podcast-info">
				<div class="podcast-details">
					<article>
					  <span class="current-pod broadcast">Now Playing</span>
					  <h5 class="episode-title"></h5>
					  <span class="pod-date"></span>
					  <p class="pod-summary"></p>
					</article>  
				
				</div>
							
				<div class="general-info">
				   <span class="about broadcast">Cave TV1</span>
<iframe width="400" height="200" src="http://www.youtube.com/embed?max-results=1&controls=0&showinfo=0&rel=0&listType=user_uploads&list=sesamestreet" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
<iframe width="400" height="200" src="http://www.youtube.com/embed?max-results=1&controls=0&showinfo=0&rel=0&listType=user_uploads&list=EvernoteVideos" frameborder="0" allowfullscreen="allowfullscreen"></iframe>

<div class="vid">

<?php
echo "<select class='other-videos'>";
foreach ($youtube['entry'] as $k => $v) {
    $yt_vids[$count]['id'] = str_replace('http://www.youtube.com/watch?v=', '', $v['link']['@attributes']['href']);
    $yt_vids[$count]['title'] = $v['title'];
    $titly = $v['title'];
    $viddy = substr($v['id'], 9);
    //echo "<iframe class='video' src='https://www.youtube.com/embed/$viddy' frameborder='0' allowfullscreen></iframe>";
    echo "<option class='yvid' value='https://www.youtube.com/embed/$viddy'>$titly</option>";
    
    $count++;
}
echo "</select>";
echo '<iframe class="video" src="https://www.youtube.com/embed/I2eqJnYnZX0" frameborder="0" allowfullscreen></iframe>';
?>
</div>
				   
				   <!-- 
				   <span class="about">Your typical text group chat gone viral by five different guys with five different views on todays current events. The purpose of the podcast is to provide an opinionated view on Sports, Entertainment, Politics, Sex and Fashion in a comical manner. Each show will end with an interview of someone in the field of Sports, Entertainment, Politics, etc…</span> -->
				   <span class="broadcast"><i class="fa fa-microphone"></i>About</span>
				   <!--<a href="#">Subscribe</a>-->
				   <p>Though-provoking, Ignorance with special guest interviews and Cave Crushes</p>
				   
				</div>
			</section> 
		</div>
			
	</header>
	

   				
	<div class="container">
		<div class="page">	
	   		<section id="podlist">
	   		   <h1>Browse Episodes</h1>
			   <div class="pagination_podcast">
			      <a href="#" class='page-left'><span>left</span></a>
			      <a href="#" class='pag-right'><span>Right</span></a>   
			   </div> 
	   		   <div id="playlist"></div>
	  		 </section>
	   	</div>
   	</div>
   	
	<div class="container crush">
		<div class="page">	
	   		<section id="cavecrush">
	   		<h1>Cave Crush</h1>
			<div id="large-pic"><a class="ig_link" href=""><img src="" alt="" /></a></div>	
			<div class="insta-feed">	   		
			   <div class="pagination_crush">
				   <a href="#" class='page-left'><span>left</span></a>
				   <a href="#" class='pag-right'><span>Right</span></a>   
			   </div>		
   		  	   <div id="instafeed"></div>   	
   		   	</div>
   		   	
	  		 </section>
	   	</div>
   	</div>
   	
	<div class="container cave">
		<div class="page">	
			<section id="cavemen">
				<h1>The Cavemen</h1>
				
					<div >
					<img src="http://thecavepodcast.com/wp-content/uploads/2015/06/joe2.jpg">
					<span class="name">The Cave’s Sexiest</span><span class="title">Co-Host</span><span class="twit">@mrjoedill</span>
					</div>
					
					<div >
					<img src="http://thecavepodcast.com/wp-content/uploads/2015/06/dawg.jpg">
					<span class="name">The Dawg</span><span class="title">Co-Host</span><span class="twit">@ronricomonroe</span>
					</div>
					
					<div >
					<img src="http://thecavepodcast.com/wp-content/uploads/2015/06/velle.jpg">
					<span class="name">Velle</span><span class="title">Co-Host</span><span class="twit">@Velle_Vel</span>
					</div>

				
					<div>
					<img src="http://thecavepodcast.com/wp-content/uploads/2015/06/ced.jpg">
					<span class="name">Ced</span><span class="title">Co-Host</span><span class="twit">@twittername</span>
					</div>
					
					<div>
					<img src="http://thecavepodcast.com/wp-content/uploads/2015/06/cb.jpg">
				<span class="name">CB</span><span class="title">Executive Producer &amp; Co-Host</span><span class="twit">@imdarealcb</span>
					</div>
					
					<div>
					<img src="http://thecavepodcast.com/wp-content/uploads/2015/07/danny.png">
					<span class="name">Danny</span><span class="title">Co-Host</span><span class="twit">@twittername</span>
					</div>
					
					<div>
					<img src="http://thecavepodcast.com/wp-content/uploads/2015/07/image2-e1455722648325.jpg">
					<span class="name">Mike</span><span class="title">Web &amp; Social</span><span class="twit">@musedweb_kos</span>
					</div>
					
					<div>
					<img src="http://thecavepodcast.com/wp-content/uploads/2015/07/image1-e1455722737281.jpg">
				<span class="name">Lamar</span><span class="title">Club Owner of VSP in Cincinnati</span><span class="twit">@twittername</span>
					</div>
				
					<div>
					<img src="http://thecavepodcast.com/wp-content/uploads/2016/02/image-e1455722593789.png">
				<span class="name">Kayla</span><span class="title">Co-Host</span><span class="twit">@twittername</span>
					</div>
							
					<div>
					<img src="http://thecavepodcast.com/wp-content/uploads/2016/02/image-e1455722540915.jpeg">
				<span class="name">Roland</span><span class="title">Video Editor</span><span class="twit">@twittername</span>
					</div>						
			</section>
		</div>
	</div> 
   	  
	<div class="container social">
		<div class="page">	
	   		<section id="social">
	   		<h1>Thats Whats Up</h1>
	<!-- <div style="">
	<a class="twitter-timeline" href="https://twitter.com/InsideTheCavePC" data-widget-id="606573599516860416">Tweets by @InsideTheCavePC</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>-->
	
	<!--facebook -->
<div class="fb-page" data-href="https://www.facebook.com/Inside-The-Cave-Podcast-679525448820417/" data-tabs="timeline" data-width="450" data-height="450" data-small-header="false" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"></div>	
	<!-- facebook -->	
	  		 </section>
	   	</div>
   	</div>
   	 
	<div class="container footer">
		<div class="page">	
	   		<footer id="footer">
	   		<div class="footer-info">
	   		<img src="img/official-Logogreywords.png" alt="logo" > <p> &copy; 2016 Inside the Cave Podcast  All rights reserved</p>
	   		</div>

	  		 </footer>
	   	</div>
   	</div> 

  <script src="js/vendor/jquery-1.11.2.min.js"></script> 
  <script src="js/vendor/tinysort.js"></script>   
  <script type="text/javascript" src="test.js"></script>
  <script src="js/script.js"></script>	 
  <script src="js/faux_paginate.js"></script>
  <script src="js/paginate_ig.js"></script>
</body>
</html>