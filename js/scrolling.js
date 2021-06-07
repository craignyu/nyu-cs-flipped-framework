/*
 * Allows scrolling of certain sidebar elements
 */
$(document).ready(function(){

    var $sidebar   = $("#submodulesidebar"), 
    	$navbar    = $("#thenavbar")
        $window    = $(window),
        $leftmenu  = $("#leftmenu"),
        offset     = $sidebar.offset(),
        topPadding = 45,
        minDynamicWidth = 755;
        
    if (document.getElementById('submodulesidebar') !== null) {
        
	    $window.scroll(computeNewSidebarPosition);
	    $window.resize(computeNewSidebarPosition);
	    
	    function computeNewSidebarPosition() 
	    {
	        // don't update sidebar if we are in fully responsive mode (mobile display)
	        if ($window.width() < minDynamicWidth) 
	        {
	        	$sidebar.css("position", "static");
	        	$sidebar.css("width", $leftmenu.width()+"px");
	        } 
	        
	        // if the navbar is static then we need to offset the sidebar based on the top of the window
	        else if ($navbar.css("position") == "static")
	        {
	        	if ($window.scrollTop() > offset.top)
	        	{
		        	$sidebar.css("position", "fixed");
		        	$sidebar.css("top", "0px");
		        	$sidebar.css("width", $leftmenu.width()+"px");
	        	}
	        	else
	        	{
		        	$sidebar.css("position", "static");
		        	$sidebar.css("width", $leftmenu.width()+"px");
	        	}
	        }
	        
	        // if the navbar is fixed then we need to offset the sidebar using some additional padding on top
	        else
	        {
	        	if ($window.scrollTop() > offset.top-topPadding)
	        	{
		        	$sidebar.css("position", "fixed");
		        	$sidebar.css("top", topPadding+"px");
		        	$sidebar.css("width", $leftmenu.width()+"px");
	        	}
	        	else
	        	{
		        	$sidebar.css("position", "static");
		        	$sidebar.css("width", $leftmenu.width()+"px");
	        	}
	        }
	    }	    
    }
});
