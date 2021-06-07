<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Title of Your Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/video_embed.css" rel="stylesheet" type="text/css">
    <link href="css/custom.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="ico/favicon.png">
    
    <!-- handle persistant sidebar visibility for submodules, keywords and glossary -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scrolling.js"></script>
    
    <!-- activecode units - hide them once the page loads (to allow the activecode text editors to render) -->
    <script type="text/javascript">
    	$(document).ready(function() {
	    
	    	// iterate over all activecode text editors
	    	$(".tab-pane").each(function() {
	    		if (!$(this).hasClass("activecodefirst"))
	    		{
			    	$(this).removeClass("active");
	    		}
	    	});
    	});
    
    
    </script>
    
  </head>

  <body>

    <div id="thenavbar" class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="brand" href="index.php"><h1>Title of Your Project (edit in 'body.php')</h1></a>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div id="thesidebar" class="span4">
          <div class="well sidebar-nav" id="leftmenu">
	        <nav aria-label="Module Menu">
            <ul class="nav nav-list">
                <?php
                
                	if (isset($_GET['traditional'])) {
	                    include('menu_traditional.txt');
                	}
                	else {
	                    include('menu.txt');
                	}
                
                ?>
            </ul>
            </nav>
          </div><!--/.well -->

	      <?php
	          if ($display_submodule_links) {
		  ?>

          <div id="submodulesidebar" class="well sidebar-nav">
	        <nav aria-label="Submodule Menu">
            <ul class="nav nav-list">

              <!-- SUBMODULES -->
              <?php
                  echo '<li class="nav-header">Submodules</li>';
                  foreach($submodules as $i=>$submodule) {
                      echo "<li><a href='#$submodule'>$submodules_text[$i]</a></li>";
                  }
              ?>

            </ul>
            </nav>
          </div><!--/.well -->
          <?php } ?>
        </div><!--/span-->
        <div class="span8">
          <div class="row-fluid">
            <div class="span12">
              <h2><?php echo $title; ?></h2>
              
              <ul>
                <?php
                    if ($display_submodule_links) {

                    	// display general modules
                        foreach($submodules as $i=>$submodule) {
                            echo "<li><a href='#$submodule'>$submodules_text[$i]</a></li>";
                        }

						// display enhanced modules, if necessary
						if (!isset($_GET['traditional']))
						{
	                        foreach($submodules_enhanced as $i=>$submodule) {
	                            echo "<li><a href='#$submodule'>$submodules_enhanced_text[$i]</a></li>";
	                        }
						}
						
						// always display a link to the quiz module
                        echo "<li><a href='#quiz'>Quiz</a></li>";
                    }
                    
                    
                    
                    
                    
                ?>
              </ul>
              <p><?php echo $description; ?></p>
                <?php
                
                	// display general modules
                    foreach($submodules as $submodule) {
                        echo "<a name='$submodule'></a>";
                        include($module_dir."/".$submodule."/content.txt");
                    }    

					// display enhanced modules, if necessary
					if (!isset($_GET['traditional']))
					{
	                    foreach($submodules_enhanced as $submodule) {
	                        echo "<a name='$submodule'></a>";
	                        include($module_dir."/".$submodule."/content.txt");
	                    }    
					}
					
					// always display the quiz module
                    echo "<a name='quiz'></a>";
                    include($module_dir."/quiz/content.txt");
                    
                ?>
                
              
              
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

    </div><!--/.fluid-container-->

    <hr>
    <center><a href="copyright.php">Copyright 2021</a></center>
  </body>
</html>
