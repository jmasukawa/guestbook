<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thanks</title>
</head>
<body>
    <h1>Thanks for signing my guestbook!</h1>
    <?php
    // Only do anything if a post request was sent to this form handler.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the visitor's information by the "name" attribute of the input
        // element in the user HTML form.
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $color = $_POST['color'];
        
        // Write the information back to the document for testing purposes.
        // We'll remove this later.
        echo "<p>You entered:";
        echo "<br>First name: $firstname";
        echo "<br>Last name:$lastname";
        echo "<br>Favorite Color: $color";
        echo "</p>";
    }
    ?>
</body>
</html>