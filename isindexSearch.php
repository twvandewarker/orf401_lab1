<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title> ORF 401: Assignment #1 - PHP - Spring 2019 </title>
  </head>

  <body>
    <center>
      <br />
      <img src="logo.png" />
      <br />
      <img src="pikachu_bus.jpeg" />
      <br /><br />

      <?php
       
       // Set the variable $q equal to whatever follows the "?query=" in the URL
       $q = $_GET["query"];

       // If the "query" line is blank, display the search page
       if (!$q) {

       // The following echo commands generate standard HTML output for the browser to view.
       // <form action= ""> tells says which page to send the results of the form to.
      // <input type="text"> denotes a text input, the name="query" part

      echo
      '<p>Enter a single origin state abbreviation to search for:</p>
      <form action="isindexSearch.php" method="get">
        <input type="text" name="query" />
        <input type="submit" />
      </form>';
      }

      // If there was a good query passed to the PHP script in the URL
      else {

      // $string is the Python program we want to run and the parameters we want to pass to it.
      // Need to escape q for multi word cities

      echo 
      '<p>Searching for &quot' . $q . '&quot as origin state.</p>
      <br /><br />';

      $string = "/usr/bin/python search2.py riders2.dat \"" . $q . "\"";

      // Tell the server to run the command, which launches Python, and stores the results in the variable $output
      $output = shell_exec($string);

      // If nothing is found:
      if (empty($output)) {
      echo '<p>No results found. :( Please try again.</p>';
      }
      
      echo $output;
      }
      ?>
</center></body></html>



