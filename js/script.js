/* ==========================================================================
   Youtube Video PLaylist
   ========================================================================= */
   $('.other-videos').change(function(){
   	var goVid = $(this).val();
   	$('.video').attr('src',goVid);
   });
   
   var firstVid = $('.other-videos option:first').val();
   $('.video').attr('src',firstVid );
   


  

/* ==========================================================================
   PlayList Build
   ========================================================================= */
   
   
$(document).ready(function() {
    var FEED_URL = "js/itunes.rss";
    $.ajax({
        url : FEED_URL,
        type : "GET",
        success : function(xml) {
		var item = $(xml).find('item');
		var i = 0;
		//http://thecavepodcast.com/wp-content/uploads/2016/02/image1.png
		
		item.each(function() {
		    var mp3 = $(this).find('guid').text();
		    var sub = $(this).find('itunes\\:subtitle, subtitle', this).text();	
		    var dur = $(this).find('itunes\\:duration,duration',this).text();
		    var date = $(this).find('pubDate').text();
		    var summ = $(this).find('itunes\\:summary, summary',this).text();
		    var pic= $(this).find('itunes\\:pic, pic',this).text();	    
		    var title = $(this).find('title').text();
		    
		    //console.log(mp3);
		    if(pic != ''){
		   $('<div class="pod-info hidden" data-date="' + i + '">' + 
		   '<div class="pre-data"><span class="subtitle">' + sub + '</span>' + 
		   '<span class="duration">' + dur + '</span></div>' +
		   '<figure class="pod-pic-cont"><img class="pod-pic" src="'+ pic + '"/></figure>' + 
		   '<h2>' + title + '</h2>'  + 
		   '<span class="epi-date">'  + date + '</span>' + 
		   '<a class="mp3" href="#pod-display" data-mp3="' + mp3 + '">Play Episode</a>' + 
		   '<div class="summary">' + summ + '</div>' + 
		    '</div>').appendTo('#playlist');	
		    }else{	    
		   $('<div class="pod-info hidden" data-date="' + i + '">' + 
		   '<div class="pre-data"><span class="subtitle">' + sub + '</span>' + 
		   '<span class="duration">' + dur + '</span></div>' +
		   '<h2>' + title + '</h2>'  +  
		   '<span class="epi-date">'  + date + '</span>' + 
		   '<a class="mp3" href="#pod-display" data-mp3="' + mp3 + '">Play Episode</a>' + 
		   '<div class="summary">' + summ + '</div>' + 
		    '</div>').appendTo('#playlist');	
		    }
		    		    
		    i++
		});	
		


		$('.mp3').click(function(){
			var current_track =  $(this).attr('data-mp3')
			var curr_track_str = new String(current_track);
			var replace_type_ogg = curr_track_str .replace('mp3','ogg');
			
			//alert(replace_type_ogg )
			
			var current_title = $(this).parent().find('h2').text();
			var current_date = $(this).parent().find('epi-date').text();
			var current_summary = $(this).parent().find('.summary').text();	
			
			if(navigator.userAgent.toLowerCase().indexOf('firefox') > -1)
			{
			    $('.pod-player').attr('src', replace_type_ogg );
			}else{
			    $('.pod-player').attr('src', current_track );
			}			
			
			$('.episode-title').text(current_title );
			$('.pod-date').text(current_date );
			$('.pod-summary').text(current_summary );	
		});		
        }
    });
});	





/* ==========================================================================
   Sort 
   ========================================================================= */

$(window).bind("load", function() {	
	tinysort('div.pod-info',{attr:'data-date', order:'desc'});	
});


/* ==========================================================================
   Display
   ========================================================================= */
$(window).bind("load", function() {
	(function podLoad(){
		//preload podcast information
		var latest_title = $('div#playlist div:first-child').find('h2').text();
		var latest_date = $('div#playlist div:first-child').find('epi-date').text();
		var latest_summary = $('div#playlist div:first-child').find('.summary').text();
		var grab_track = $('div#playlist div:first-child').find('.mp3').attr('data-mp3');
		var grab_track_str = new String(grab_track);
		var replace_type_ogg2 = grab_track_str .replace('mp3','ogg');
		
		$('.episode-title').text(latest_title );
		$('.pod-date').text(latest_date );
		$('.pod-summary').text(latest_summary );
		
		// Set up pod-player with 
		if(navigator.userAgent.toLowerCase().indexOf('firefox') > -1)
		{
		    $('.pod-player').attr('src', replace_type_ogg2 );
		}else{
		    $('.pod-player').attr('src', grab_track );
		}
			
		//preload cavecrush imge
		var loadCrush = $('div#instafeed div:first-child').find('img').attr('src');
		$('#large-pic img').attr('src', loadCrush );		
		
			//default hide cavecrush images
			$('div#instafeed > div').each(function(){
			 $(this).addClass('hidden');
			})
	
	     //show crush images
	     $('.instagram_container').each(function(){
	     	if($(this).hasClass('no1')){
	     		$(this).removeClass('hidden');
	     	}
	     });			
	})()
});

/* ==========================================================================
   Cave Crush
   ========================================================================= */
   
$(document).on('click', '.instagram_container a', function(event){

	event.preventDefault();
	var grab_img = $(this).parent().find('img').attr('src');
	var grab_link = $(this).attr('href');
	
	//alert(grab_link);
	
	$('#large-pic img').attr('src',grab_img);
	$('.ig_link').attr('href', grab_link);
	$('.ig_link').attr('target',' _blank');
});


/* =========================================================
  MObile Menu
=========================================================== */

$(document).ready(function(){
	$('nav a.mobile_menu').on('click', function(){
		var currentNavheight = $('nav').height();
		
		if(currentNavheight < 20) {
			var  newNavheight = $('nav div  ul ').height() + 15;
			$('nav').animate({'height' : newNavheight + 'px'}, 750)
		}else {
			$('nav').animate({'height' : '15px'}, 750, function(){
				$(this).removeAttr('style');
			});
		}
	});
	
	$(window).resize(function(){
		
		 if(  $(this).width() > 625 ){
			 $('nav').removeAttr('style');
		 }
	});

});

/* =========================================================
  Sticky Menu
=========================================================== */


$(function(){
        var stickyRibbonTop = $('.nav-header').offset().top;
          
        $(window).scroll(function(){
                if( $(window).scrollTop() > stickyRibbonTop ) {
                        $('.nav-header').css({position: 'fixed', top: '0px'}).css({zIndex: '1'}).css({paddingBottom: '15px'}).css({width: '100%'});
                } else {
                        $('.nav-header').css({position: 'static', top: '0px'});
                }
        });
});


/* =========================================================
  scroll motion
=========================================================== */
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

/* ==========================================================================
   Limit Now Playing Caption
   ========================================================================= */
$(window).bind("load", function() {
  var t = $('.pod-summary').text();
  var y = t.substr(200);
  /*
  $( ".pod-summary" ).wrap(function() {
    return "<span class='more'>" + y + "</span>";
  });
  */
});
    