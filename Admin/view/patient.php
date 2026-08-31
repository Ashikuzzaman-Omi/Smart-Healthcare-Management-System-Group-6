<?php

include "../Model/DatabaseConnection.php";

$database = new DatabaseConnection();

$connection = $database->openConnection();

$sql = "SELECT * FROM patients";

$result = $connection->query($sql);

?>

<html>

<head>

    <title>Patient Management</title>

    <link rel="stylesheet" type="text/css" href="design/adminDesign.css">

    <script>

        function savePatient() {

            let confirmSave = confirm("Are you sure you want to save this patient?");

            return confirmSave;

        }


        function editPatient(patient_serial, patient_name, phone_no, record_task_type, email, address) {

            let confirmEdit = confirm("Are you sure you want to edit this patient?");

            if (confirmEdit) {

                let newName = prompt("Patient Name:", patient_name);

                if (newName == null) {
                    return;
                }

                let newPhone = prompt("Phone:", phone_no);

                if (newPhone == null) {
                    return;
                }

                let newTask = prompt("Record Task Type:", record_task_type);

                if (newTask == null) {
                    return;
                }

                let newEmail = prompt("Email:", email);

                if (newEmail == null) {
                    return;
                }

                let newAddress = prompt("Address:", address);

                if (newAddress == null) {
                    return;
                }

                let form = document.createElement("form");

                form.method = "post";

                form.action = "../Controller/patientUpdate.php";

                form.innerHTML =

                    '<input type="hidden" name="patient_serial" value="' + patient_serial + '">' +

                    '<input type="hidden" name="patientName" value="' + newName + '">' +

                    '<input type="hidden" name="phoneNo" value="' + newPhone + '">' +

                    '<input type="hidden" name="recordTaskType" value="' + newTask + '">' +

                    '<input type="hidden" name="email" value="' + newEmail + '">' +

                    '<input type="hidden" name="address" value="' + newAddress + '">';

                document.body.appendChild(form);

                form.submit();

            }

        }


        function removePatient(patient_serial) {

            let confirmRemove = confirm("Are you sure you want to remove this patient?");

            if (confirmRemove) {

                window.location.href =
                    "../Controller/patientRemove.php?patient_serial=" + patient_serial;

            }

        }

    </script>

</head>

<body>

    <div class="container">

        <h1>Patient Management</h1>

        <p>

            <a href="adminPage.php">Back to Dashboard</a>

        </p>

        <fieldset>

            <legend>Add Patient</legend>

            <form action="../Controller/patientSave.php"
                  method="post"
                  onsubmit="return savePatient();">

                <table>

                    <tr>

                        <td><b>Patient Name:</b></td>

                        <td>

                            <input type="text" name="patientName" required>

                        </td>

                    </tr>

                    <tr>

                        <td><b>Phone:</b></td>

                        <td>

                            <input type="text" name="phoneNo" required>

                        </td>

                    </tr>

                    <tr>

                        <td><b>Record Task Type:</b></td>

                        <td>

                            <input type="text" name="recordTaskType" value="Registration">

                        </td>

                    </tr>

                    <tr>

                        <td><b>Email:</b></td>

                        <td>

                            <input type="text" name="email" required>

                        </td>

                    </tr>

                    <tr>

                        <td><b>Address:</b></td>

                        <td>

                            <input type="text" name="address" required>

                        </td>

                    </tr>

                    <tr>

                        <td></td>

                        <td>

                            <button type="submit">Save</button>

                        </td>

                    </tr>

                </table>

            </form>

        </fieldset>

        <br>

        <h2>Patient List</h2>

        <table border="1">

            <tr>

                <th>ID</th>

                <th>Name</th>

                <th>Phone</th>

                <th>Task Type</th>

                <th>Email</th>

                <th>Address</th>

                <th>Action</th>

            </tr>

            <?php while ($row = $result->fetch_assoc()) { ?>

            <tr>

                <td><?php echo $row["patient_serial"]; ?></td>

                <td><?php echo $row["patient_name"]; ?></td>

                <td><?php echo $row["phone_no"]; ?></td>

                <td><?php echo $row["record_task_type"]; ?></td>

                <td><?php echo $row["email"]; ?></td>

                <td><?php echo $row["address"]; ?></td>

                <td>

                    <button type="button"

                        onclick='editPatient(

                            <?php echo $row["patient_serial"]; ?>,

                            <?php echo json_encode($row["patient_name"]); ?>,

                            <?php echo json_encode($row["phone_no"]); ?>,

                            <?php echo json_encode($row["record_task_type"]); ?>,

                            <?php echo json_encode($row["email"]); ?>,

                            <?php echo json_encode($row["address"]); ?>

                        )'>

                        Edit

                    </button>

                    <button type="button"

                        onclick="removePatient(<?php echo $row["patient_serial"]; ?>)">

                        Remove

                    </button>

                </td>

            </tr>

            <?php } ?>

        </table>

    </div>

</body>

</html>