<?php

include "../Model/DatabaseConnection.php";

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "SELECT * FROM patients";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>

    <title>Patient Management</title>

    <link rel="stylesheet" href="design/admin design.css">

    <script>
        function confirmRemove() {
            return confirm("Are you sure you want to remove this patient?");
        }

        function confirmUpdate() {
            return confirm("Are you sure you want to update this patient?");
        }
    </script>

</head>

<body>

<div class="container">

    <h1>Patient Management</h1>

    <h2>Add Patient</h2>

    <form action="../Controller/patientSave.php" method="post">

        <label>Patient Name</label>
        <input type="text" name="patientName" required>

        <label>Phone Number</label>
        <input type="text" name="phoneNo" required>

        <label>Record Task Type</label>
        <input type="text" name="recordTaskType">

        <label>Email</label>
        <input type="email" name="email">

        <label>Address</label>
        <input type="text" name="address">

        <input type="submit" value="Save">

    </form>

    <hr>

    <h2>Patient List</h2>

    <table border="1">

        <tr>
            <th>Patient Serial</th>
            <th>Patient Name</th>
            <th>Phone No</th>
            <th>Record Task Type</th>
            <th>Email</th>
            <th>Address</th>
            <th>Action</th>
        </tr>

        <?php

        while ($row = $result->fetch_assoc()) {

        ?>

        <tr>

            <td><?php echo $row["patient_serial"]; ?></td>

            <td><?php echo $row["patient_name"]; ?></td>

            <td><?php echo $row["phone_no"]; ?></td>

            <td><?php echo $row["record_task_type"]; ?></td>

            <td><?php echo $row["email"]; ?></td>

            <td><?php echo $row["address"]; ?></td>

            <td>

                <form action="../Controller/patientUpdate.php"
                      method="post"
                      onsubmit="return confirmUpdate();">

                    <input type="hidden"
                           name="patient_serial"
                           value="<?php echo $row["patient_serial"]; ?>">

                    <input type="text"
                           name="patientName"
                           value="<?php echo $row["patient_name"]; ?>">

                    <input type="text"
                           name="phoneNo"
                           value="<?php echo $row["phone_no"]; ?>">

                    <input type="text"
                           name="recordTaskType"
                           value="<?php echo $row["record_task_type"]; ?>">

                    <input type="email"
                           name="email"
                           value="<?php echo $row["email"]; ?>">

                    <input type="text"
                           name="address"
                           value="<?php echo $row["address"]; ?>">

                    <input type="submit" value="Update">

                </form>

                <a href="../Controller/patientRemove.php?patient_serial=<?php echo $row["patient_serial"]; ?>"
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