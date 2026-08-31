<?php

session_start();

if (!isset($_SESSION["admin_email"])) {

    header("Location: login.php");

    exit();

}

$title = "Smart Healthcare Management System";

?>

<html>

<head>

    <title><?php echo $title; ?></title>

    <link rel="stylesheet" type="text/css" href="design/adminDesign.css">

</head>

<body>

    <div class="container">

        <h1><?php echo $title; ?></h1>

        <h2>Admin Dashboard</h2>

        <p class="welcome">Welcome to Admin Panel</p>

        <fieldset>

            <legend>Admin Menu</legend>

            <table>

                <tr>

                    <td align="center">

                        <a href="user.php">

                            <button type="button">User Management</button>

                        </a>

                    </td>

                </tr>

                <tr>

                    <td align="center">

                        <a href="patient.php">

                            <button type="button">Patient Management</button>

                        </a>

                    </td>

                </tr>

                <tr>

                    <td align="center">

                        <a href="doctor.php">

                            <button type="button">Doctor Management</button>

                        </a>

                    </td>

                </tr>

                <tr>

                    <td align="center">

                        <a href="medicine.php">

                            <button type="button">Medicine Management</button>

                        </a>

                    </td>

                </tr>

                <tr>

                    <td align="center">

                        <a href="payment.php">

                            <button type="button">Payment Management</button>

                        </a>

                    </td>

                </tr>

                <tr>

                    <td align="center">

                        <a href="../Controller/logout.php">

                            <button type="button">Logout</button>

                        </a>

                    </td>

                </tr>

            </table>

        </fieldset>

    </div>

</body>

</html>