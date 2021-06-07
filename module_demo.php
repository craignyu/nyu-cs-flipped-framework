<?php
$title = "Demo Module 1";

// Directory where this modules data is stored 
$module_dir = "submodules";

// List of submodules this module is comprised of
$submodules = array('submodule01', 'submodule02');

// Human readable version of the submodule name
$submodules_text = array("Submodule 01", "Submodule 02");

// Description shows up before any submodule includes
$description = "<p>This is a demo module. The actual content for each of the submodules referenced above can be found in the 'submodules' folder.</p>";

// Show sidebar and header links to each submodule?
$display_submodule_links = True;

require_once("lib/helpers.php");
require("body.php");
?>
