jQuery(document).ready(function($) {

	// The number of the next page to load (/page/x/).
	var pageNum = parseInt(pbd_alp.startPage) + 1;
	
	// The maximum number of pages the current query can return.
	var max = parseInt(pbd_alp.maxPages);
	
	// The link of the next page of posts.
	var nextLink = pbd_alp.nextLink;
	
	/**
	 * Replace the traditional navigation with our own,
	 * but only if there is at least one page of new posts to load.
	 */
	if(pageNum <= max) {
		// Insert the "More Posts" link.
		$('#primary').append('<div style="display: none;" class="alp pbd-alp-placeholder-'+ pageNum +'"></div>');
		$('#main').after('<p id="pbd-alp-load-posts" class="row"><a href="#">查看更多</a></p>');
	}
	
	
	/**
	 * Load new posts when the link is clicked.
	 */
	$('#pbd-alp-load-posts a').click(function() {
	
		// Are there more posts to load?
		if(pageNum <= max) {
		
			// Show that we're working.
			$(this).text('正在加载...');
			
			$('.pbd-alp-placeholder-'+ pageNum).load(nextLink + ' .post',
				function() {
                    
                    //$(this).replaceWith($(this).html());
                    $($(this).html()).appendTo('#primary').slideDown();
                    
					// Update page number and nextLink.
					pageNum++;
					nextLink = nextLink.replace(/paged=[0-9]?/, 'paged='+ pageNum);
					
					// Add a new placeholder, for when user clicks again.
						$('#primary').append('<div style="display: none;" class="alp pbd-alp-placeholder-'+ pageNum +'"></div>')
					
					// Update the button message.
					if(pageNum <= max) {
						$('#pbd-alp-load-posts a').text('查看更多');
					} else {
						$('#pbd-alp-load-posts').hide();
					}
				}
			);
		} else {
			$('#pbd-alp-load-posts a').append('.');
		}	
		
		return false;
	});
});