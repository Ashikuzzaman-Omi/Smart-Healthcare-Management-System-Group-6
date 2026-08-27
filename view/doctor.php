<?php

include "../Model/DatabaseConnection.php";

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "SELECT * FROM doctors";

$result = $connection->query($sql);

?>

<html>

<head>

    <title>Doctor Management</title>

    <link rel="stylesheet" type="text/css" href="design/adminDesign.css">

    <script>

        function saveDoctor() {

            let confirmSave = confirm("Are you sure you want to save this doctor?");

            return confirmSave;

        }


        function editDoctor(doctor_id, doctor_name, specialization, email, phone_no) {

            let confirmEdit = confirm("Are you sure you want to edit this doctor?");

            if (confirmEdit) {

                let newName = prompt("Doctor Name:", doctor_name);

                if (newName == null) {
                    return;
                }

                let newSpecialization = prompt("Specialization:", specialization);

                if (newSpecialization == null) {
                    return;
                }

                let newEmail = prompt("Email:", email);

                if (newEmail == null) {
                    return;
                }

                let newPhone = prompt("Phone:", phone_no);

                if (newPhone == null) {
                    return;
                }

                let form = document.createElement("form");

                form.method = "post";
                form.action = "../Controller/doctorUpdate.php";

                form.innerHTML =

                    '<input type="hidden" name="doctor_id" value="' + doctor_id + '">' +

                    '<input type="hidden" name="doctorName" value="' + newName + '">' +

                    '<input type="hidden" name="specialization" value="' + newSpecialization + '">' +

                    '<input type="hidden" name="email" value="' + newEmail + '">' +

                    '<input type="hidden" name="doctorPhone" value="' + newPhone + '">';

                document.body.appendChild(form);

                form.submit();

            }

        }


        function removeDoctor(doctor_id) {

            let confirmRemove = confirm("Are you sure you want to remove this doctor?");

            if (confirmRemove) {

                window.location.href =
                    "../Controller/doctorRemove.php?doctor_id=" + doctor_id;

            }

        }

    </script>

</head>

<body>

    <div class="container">

        <h1>Doctor Management</h1>

        <p>
            <a href="adminPage.php">Back to Dashboard</a>
        </p>

        <fieldset>

            <legend>Add Doctor</legend>

            <form action="../Controller/doctorSave.php"
                  method="post"
                  onsubmit="return saveDoctor();">

                <table>

                    <tr>

                        <td><b>Doctor Name:</b></td>

                        <td>
                            <input type="text" name="doctorName" required>
                        </td>

                    </tr>

                    <tr>

                        <td><b>Email:</b></td>

                        <td>
                            <input type="text" name="email" required>
                        </td>

                    </tr>

                    <tr>

                        <td><b>Phone:</b></td>

                        <td>
                            <input type="text" name="doctorPhone" required>
                        </td>

                    </tr>

                    <tr>

                        <td><b>Specialization:</b></td>

                        <td>
                            <input type="text" name="specialization" required>
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

        <h2>Doctor List</h2>

        <table border="1">

            <tr>

                <th>ID</th>

                <th>Name</th>

                <th>Email</th>

                <th>Phone</th>

                <th>Specialization</th>

                <th>Action</th>

            </tr>

            <?php while ($row = $result->fetch_assoc()) { ?>

            <tr>

                <td><?php echo $row["doctor_id"]; ?></td>

                <td><?php echo $row["doctor_name"]; ?></td>

                <td><?php echo $row["email"]; ?></td>

                <td><?php echo $row["phone_no"]; ?></td>

                <td><?php echo $row["specialization"]; ?></td>

                <td>

                    <button type="button"
                        onclick='editDoctor(
                            <?php echo $row["doctor_id"]; ?>,
                            <?php echo json_encode($row["doctor_name"]); ?>,
                            <?php echo json_encode($row["specialization"]); ?>,
                            <?php echo json_encode($row["email"]); ?>,
                            <?php echo json_encode($row["phone_no"]); ?>
                        )'>

                        Edit

                    </button>

                    <button type="button"
                        onclick="removeDoctor(<?php echo $row["doctor_id"]; ?>)">

                        Remove

                    </button>

                </td>

            </tr>

            <?php } ?>

        </table>

    </div>

</body>

</html>