<?php
// This file writes a name into the database and displays a thank you
// message to the user.

// If a get request is received, then lets return all the signatures.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the visitor's information by the "name" attribute of the input
    // element in the user HTML form.
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $color = $_POST['color'];

    // Create a data source name string. This is a connection string to the
    // database from PHP.
    $dsn = 'mysql:host=localhost;dbname=guestbook';
    $username = 'jmasukawa';
    $password = '';

    // Get a database handler PHP Data Object (PDO). We use the DSN to
    // connect to the database in this statement. The database handler is
    // a messenger of sorts for us in PHP. We can tell it to do things like
    // insert records or retrieve records and it will relay the message to
    // the database for us.
    $dbh = new PDO($dsn, $username, $password);
    
    // Create a basic SQL statement that inserts a row with the name
    // provided by the user form into the visitors table. See this link for
    // more details: http://www.w3schools.com/sql/sql_insert.asp
    $sql = "INSERT INTO visitors (firstname, lastname, color) VALUES "
        . "('$firstname', '$lastname', '$color')";
    
    // The exec function returns the number of rows affected by your SQL
    // statement.
    $count = $dbh->exec($sql);
    
    // If a row was affected by the SQL statement, write a success message.
    if ($count) {
        readfile('thanks.html');
    } else {
        // If no row was affected, write a failure message.
        readfile('error.html');
    }
}
?>
