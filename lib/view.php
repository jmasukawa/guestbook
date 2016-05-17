<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Viewing Guestbook</title>
</head>
<body>
    <h1>Guestbook</h1>
    <p>These people signed my guestbook:</p>
    <table border="1">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Favorite Color</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // The script below retrieves stored visitors info and displays them.

        // If a GET request is received, then return all visitors.
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            // Create a data source name string. This is a connection string
            // to the database from PHP, and defines what kind of database we
            // are talking to, the hostname of the DBMS, and the database name
            // we're trying to access. It also provides a username and password
            // for authentication/authorization.
            $dsn = 'mysql:host=localhost;dbname=guestbook';
            $username = 'jmasukawa'; // Cloud9 username
            $password = ''; // default password is empty in 'dev mode'.

            // Create a database handler PHP Data Object (PDO). We use the DSN
            // to connect to the database in this statement. The database
            // handler is a 'relay object' of sorts for us in PHP. We can tell
            // it to do things like insert records or retrieve records and it
            // will relay the action to the database for us.
            $dbh = new PDO($dsn, $username, $password);

            // Create a basic SQL statement that selects all rows from the 
            // visitors table, which is defined in the guestbook database.
            $sql = 'SELECT * FROM visitors';

            // For each row that was retrieved from the query, print out the
            // first name, last name, and color in table data cells.
            foreach ($dbh->query($sql) as $currentRow) {
                // Extract the information from the current row being processed.
                $firstname = $currentRow['firstname'];
                $lastname = $currentRow['lastname'];
                $color = $currentRow['color'];
                
                // Write the HTML for the table rows that contain each visitor's
                // information. The 'echo' function works just like JavaScript's
                // document.write function.
                echo '<tr>';
                // NOTE: double quoted strings in PHP will interpret variable
                // names as the actual values that they contain. This can be
                // useful and easier to read in some circumstances. If
                // $firstname = 'Jon', the line below would print "<td>Jon</td>"
                echo "<td>$firstname</td>";
                echo "<td>$lastname</td>";
                echo "<td style='color: $color;'>$color</td>";
                echo '</tr>';
            }
        }
        ?>
        </tbody>
    </table>
    <!-- back button for the user to go back once they reach this page -->
    <button onclick="goBack();">Go Back</button>
    <script>
        // This function will have similar behavior to clicking the 'back arrow'
        // in a browser.
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
