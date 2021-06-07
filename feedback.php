<?php
$ip = $_SERVER['REMOTE_ADDR'];
$forward = $_SERVER['HTTP_X_FORWARDED_FOR'];
$module = $_SERVER['HTTP_REFERER'];

if ($_POST) {
  $questions = array("helpful",
                     "best_resource",
                     "comments" );

  foreach ($questions as $question) {
    $answer= $_POST[$question];
    if (is_array($answer))
      $answer = implode(" and ", $answer);
    $line = "$ip,$forward,$question: $answer\n";
    $feedback .= $line;
  }
  $feedback .= "$ip,$forward,module: $module\n";

  $success = true;
  
  // extract values that we care about
  $helpful       = $_POST['helpful'];
  $best_resource = implode(" and ", $_POST['best_resource']);
  $comments      = str_replace('|', "", $_POST['comments']); 

  // figure out where to store this data
  $filename = str_replace('/feedback.php', '/_data/feedback.txt', $_SERVER['SCRIPT_FILENAME']);

  // now write to a text file
  $data = $ip . '|' . '|' . $module . '|' . $helpful . '|' . $best_resource . '|' . $comments . "\n";
  file_put_contents('_data/feedback.txt', $data, FILE_APPEND | LOCK_EX);

  if ($success) {
    die("Thank you kindly.  Your data has been recorded.");
  } else {
    die("Could not send feedback.  Please contact kapp@cs.nyu.edu");
  }
}

?>
