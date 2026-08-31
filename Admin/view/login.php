<?php

session_start();

include "../Model/DatabaseConnection.php";

$database = new DatabaseConnection();

$connection = $database->openConnection();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users
            WHERE email='$email'
            AND password='$password'
            AND role='Admin'";

    $result = $connection->query($sql);

    if ($result && $result->num_rows == 1) {

        $_SESSION["admin_email"] = $email;

        header("Location: adminPage.php");

        exit();

    } else {

        $error = "Invalid email or password.";

    }

}

?>

<html>

<head>

    <title>Admin Login</title>

    <link rel="stylesheet" type="text/css" href="design/adminDesign.css">

</head>

<body>

    <div class="container">

        <h1>Smart Healthcare Management System</h1>

        <h2>Admin Login</h2>

        <fieldset>

            <legend>Login</legend>

            <form method="post">

                <table>

                    <tr>

                        <td><b>Email:</b></td>

                        <td>
                            <input type="email" name="email" required>
                        </td>

                    </tr>

                    <tr>

                        <td><b>Password:</b></td>

                        <td>
                            <input type="password" name="password" required>
                        </td>

                    </tr>

                    <tr>

                        <td></td>

                        <td>
                            <button type="submit">Login</button>
                        </td>

                    </tr>

                </table>

            </form>

        </fieldset>

        <?php

        if ($error != "") {

            echo "<p>" . $error . "</p>";

        }

        ?>

    </div>

</body>

</html>