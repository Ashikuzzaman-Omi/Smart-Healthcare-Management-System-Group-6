<?php

include "../Model/DatabaseConnection.php";

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "SELECT * FROM users";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>

    <title>User Management</title>

    <link rel="stylesheet" href="design/admin design.css">

    <script>
        function confirmRemove() {
            return confirm("Are you sure you want to remove this user?");
        }

        function confirmUpdate() {
            return confirm("Are you sure you want to update this user?");
        }
    </script>

</head>

<body>

<div class="container">

    <h1>User Management</h1>

    <h2>Add User</h2>

    <form action="../Controller/userSave.php" method="post">

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Full Name</label>
        <input type="text" name="fullName" required>

        <label>NID</label>
        <input type="text" name="nid" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Address</label>
        <input type="text" name="address">

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Phone Number</label>
        <input type="text" name="phoneNo" required>

        <label>Role</label>
        <input type="text" name="role" required>

        <input type="submit" value="Save">

    </form>

    <hr>

    <h2>User List</h2>

    <table border="1">

        <tr>
            <th>Username</th>
            <th>Full Name</th>
            <th>NID</th>
            <th>Email</th>
            <th>Address</th>
            <th>Password</th>
            <th>Phone No</th>
            <th>Role</th>
            <th>Action</th>
        </tr>

        <?php

        while ($row = $result->fetch_assoc()) {

        ?>

        <tr>

            <td><?php echo $row["username"]; ?></td>

            <td><?php echo $row["full_name"]; ?></td>

            <td><?php echo $row["nid"]; ?></td>

            <td><?php echo $row["email"]; ?></td>

            <td><?php echo $row["address"]; ?></td>

            <td><?php echo $row["password"]; ?></td>

            <td><?php echo $row["phone_no"]; ?></td>

            <td><?php echo $row["role"]; ?></td>

            <td>

                <form action="../Controller/userUpdate.php"
                      method="post"
                      onsubmit="return confirmUpdate();">

                    <input type="hidden"
                           name="username"
                           value="<?php echo $row["username"]; ?>">

                    <input type="text"
                           name="fullName"
                           value="<?php echo $row["full_name"]; ?>">

                    <input type="text"
                           name="nid"
                           value="<?php echo $row["nid"]; ?>">

                    <input type="email"
                           name="email"
                           value="<?php echo $row["email"]; ?>">

                    <input type="text"
                           name="address"
                           value="<?php echo $row["address"]; ?>">

                    <input type="text"
                           name="password"
                           value="<?php echo $row["password"]; ?>">

                    <input type="text"
                           name="phoneNo"
                           value="<?php echo $row["phone_no"]; ?>">

                    <input type="text"
                           name="role"
                           value="<?php echo $row["role"]; ?>">

                    <input type="submit" value="Update">

                </form>

                <a href="../Controller/userRemove.php?username=<?php echo $row["username"]; ?>"
                   onclick="return confirmRemove();">
                    Remove
                </a>

            </td>

        </tr>

        <?php

        }

        ?>

    </table>

</div>

</body>
</html>