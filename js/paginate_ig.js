/* ==========================================================================
   Pagination
   ========================================================================= */	

	function pagination_crush(holder) { 
	
		var g = {};
		var resultNum = [];
	
		
		g.ix = 1;
		g.yx=1;
		
		var ex = $(holder).length;
		vx=1,recordGoup = 5, bx =5;
	
		var remainder = ex % recordGoup;
	
	
		//alert(remainder);
	
		$(holder).each(function() {	
	
		
			$(this).addClass('item' + g.ix);
			$(this).addClass('no' + g.yx);
			
			//alert(g.yx);
			resultNum.push(g.yx);	
					
			if( g.ix % recordGoup) { 	
				g.ix++;
			}else {
				g.ix= 1;
				
			$('<a href="#" class="in">' +  g.yx  + '</a> ').insertBefore('.insta-feed .pagination_crush a.pag-right');
				g.yx++;		
			}
			
			if ($(this).hasClass('no1')){
				$(this).removeClass('hidden');
			}				
							
		});
			
		   //alert(remainder);
		   if(remainder) {
		   $('<a href="#" class="in">' + g.yx + '</a> ').insertBefore('.insta-feed .pagination_crush a.pag-right');
		   g.yx++;
		   }
	
		$('a.in').each(function(){
			$(this).addClass('no'+ vx);
			vx++;
		});
		
		$('.pagination_crush a.in').click(function(event){
			g.zx = $(this).text();
			$(holder + '.hidden.'+ "no" + g.zx ).removeClass('hidden');
			$(holder).not(".no" + g.zx ).addClass('hidden');
			event.preventDefault();				
		});
	

		
		$('.pagination_crush .page-left').click(function() {
			event.preventDefault();	
			
			if ( g.zx > 0 ) {
				var yy = $(this).attr('class').substr(10,3)
				//alert(g.zx);			  
				$('.page-left[class*="n"]').removeClass();
				$(this).addClass('page-left');			
				$(this).addClass('no' + g.wx);   
				g.zx--
				
				
				$('.instagram_container').each(function(){
					if(g.zx > 0){
						
						if ($(this).hasClass('no' + g.zx)){
							$(this).removeClass('hidden');
						}else {
							$(this).addClass('hidden');
						}
													
					}
				});
				
						
			}
					
		});
	
	
		$('.pagination_crush .pag-right').click(function(event) {
			event.preventDefault();	
			
			var total = Math.floor($('.pagination_crush a.in').length);
			if ( g.zx < total  ) {
				//alert(total);			  
				$('.pag-right[class*="n"]').removeClass();
				$(this).addClass('pag-right');			
				$(this).addClass('no' + g.zx);   
				g.zx++
				
				$('.instagram_container').each(function(){
					if(g.zx < total ){
						if ($(this).hasClass('no' + g.zx)){
							$(this).removeClass('hidden');
						}else {
							$(this).addClass('hidden');
						}

					}
				});
						
			}else {
				//alert("testy");
				return
			}		
		});	
	}

	
$(window).bind("load", function() {	
	pagination_crush(".instagram_container");	
});
 