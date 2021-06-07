<?php
$title = "Welcome!";

// Directory where this modules data is stored 
$module_dir = "admin";

// List of submodules this module is comprised of
$submodules = array("help", "tutors", "acknowledgements");

// Human readable version of the submodule name
$submodules_text = array("Help using these modules", "Course Tutors", "Acknowledgements");

// Description shows up before any submodule includes
$description = "This page contains links to the online learning modules that will be used throughout the course. Please note that you are responsible for a short quiz after you complete each module - these quizzes can be found in your <a href=\"http://newclasses.nyu.edu\" target=\"_blank\">NYU Classes</a> course website.";

// Show sidebard and header links to each submodule?
$display_submodule_links = False;

require_once("lib/helpers.php");
require("body.php");
?>
