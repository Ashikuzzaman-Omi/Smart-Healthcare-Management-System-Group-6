<?php

include "../Model/DatabaseConnection.php";

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "SELECT * FROM doctors";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>

    <title>Doctor Management</title>

    <link rel="stylesheet" href="design/admin design.css">

    <script>
        function confirmRemove() {
            return confirm("Are you sure you want to remove this doctor?");
        }

        function confirmUpdate() {
            return confirm("Are you sure you want to update this doctor?");
        }
    </script>

</head>

<body>

<div class="container">

    <h1>Doctor Management</h1>

    <h2>Add Doctor</h2>

    <form action="../Controller/doctorSave.php" method="post">

        <label>Doctor Name</label>
        <input type="text" name="doctorName" required>

        <label>Specialization</label>
        <input type="text" name="specialization" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Phone Number</label>
        <input type="text" name="doctorPhone" required>

        <input type="submit" value="Save">

    </form>

    <hr>

    <h2>Doctor List</h2>

    <table border="1">

        <tr>
            <th>Doctor ID</th>
            <th>Doctor Name</th>
            <th>Specialization</th>
            <th>Email</th>
            <th>Phone No</th>
            <th>Action</th>
        </tr>

        <?php

        while ($row = $result->fetch_assoc()) {

        ?>

        <tr>

            <td><?php echo $row["doctor_id"]; ?></td>

            <td><?php echo $row["doctor_name"]; ?></td>

            <td><?php echo $row["specialization"]; ?></td>

            <td><?php echo $row["email"]; ?></td>

            <td><?php echo $row["phone_no"]; ?></td>

            <td>

                <form action="../Controller/doctorUpdate.php"
                      method="post"
                      onsubmit="return confirmUpdate();">

                    <input type="hidden"
                           name="doctor_id"
                           value="<?php echo $row["doctor_id"]; ?>">

                    <input type="text"
                           name="doctorName"
                           value="<?php echo $row["doctor_name"]; ?>">

                    <input type="text"
                           name="specialization"
                           value="<?php echo $row["specialization"]; ?>">

                    <input type="email"
                           name="email"
                           value="<?php echo $row["email"]; ?>">

                    <input type="text"
                           name="doctorPhone"
                           value="<?php echo $row["phone_no"]; ?>">

                    <input type="submit" value="Update">

                </form>

                <a href="../Controller/doctorRemove.php?doctor_id=<?php echo $row["doctor_id"]; ?>"
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