<html>
  <title> ORF 401: Assignment #1 - PHP - Spring 2019 </title>
  <body bgcolor="white" text="black">
    <center>
      <br /><br />
      <p>Company Name</p>
      <br /><br />
      <img src="logo.jpg" />
      <br /><br />

      <?php  // Use the <?php command so the server realizes this is PHP code and not HTML
       
       // Set the variable $q equal to whatever follows the "?query=" in the URL
       $q = $_GET["query"];

       if (!$q){  // If the "query" line is blank, display the search page

       // The following echo commands generate standard HTML output for the browser to view.
       // <form action= ""> tells says which page to send the results of the form to.
      // <input type="text"> denotes a text input, the name="query" part

      echo
      '<p>Enter a single origin/destination to search for:</p>
      <br />
      <form action="isindexSearch.php" method="get">
        <input type="text" name="query" />
        <input type="submit" />
      </form>';

      } else { // In this case, else means that there was some kind of data passed to the PHP script in the URL

      // $string is the Python program we want to run and the parameters we want to pass to it.
      // You could also use:
      // $string = "ls"
      // or something as a test.
      // Need to escape q for multi word cities

      echo 
      '<p>Searching for ' . $q . ' as origin/destination</p>
      <br /><br />';

      $string = "/usr/bin/python search.py riders.dat \"" . $q . "\"";

      // Tell the server to run the command, which launches Python, and stores the results in the variable $output
      $output = shell_exec($string);

      echo $output;
      }

      echo '</center></body></html>'
?>



