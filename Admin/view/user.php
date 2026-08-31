<?php

include "../Model/DatabaseConnection.php";

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "SELECT * FROM users";

$result = $connection->query($sql);

?>

<html>

<head>

    <title>User Management</title>

    <link rel="stylesheet" type="text/css" href="design/adminDesign.css">

    <script>

        function saveUser() {

            let confirmSave = confirm("Are you sure you want to save this user?");

            return confirmSave;

        }


        function editUser(username, full_name, nid, email, address, password, phone_no, role) {

            let confirmEdit = confirm("Are you sure you want to edit this user?");

            if (confirmEdit) {

                let newFullName = prompt("Full Name:", full_name);

                if (newFullName == null) {
                    return;
                }

                let newNid = prompt("NID:", nid);

                if (newNid == null) {
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

                let newPassword = prompt("Password:", password);

                if (newPassword == null) {
                    return;
                }

                let newPhone = prompt("Phone:", phone_no);

                if (newPhone == null) {
                    return;
                }

                let newRole = prompt("Role:", role);

                if (newRole == null) {
                    return;
                }

                let form = document.createElement("form");

                form.method = "post";
                form.action = "../Controller/userUpdate.php";

                form.innerHTML =

                    '<input type="hidden" name="username" value="' + username + '">' +

                    '<input type="hidden" name="fullName" value="' + newFullName + '">' +

                    '<input type="hidden" name="nid" value="' + newNid + '">' +

                    '<input type="hidden" name="email" value="' + newEmail + '">' +

                    '<input type="hidden" name="address" value="' + newAddress + '">' +

                    '<input type="hidden" name="password" value="' + newPassword + '">' +

                    '<input type="hidden" name="phoneNo" value="' + newPhone + '">' +

                    '<input type="hidden" name="role" value="' + newRole + '">';

                document.body.appendChild(form);

                form.submit();

            }

        }


        function removeUser(username) {

            let confirmRemove = confirm("Are you sure you want to remove this user?");

            if (confirmRemove) {

                window.location.href =
                    "../Controller/userRemove.php?username=" + encodeURIComponent(username);

            }

        }

    </script>

</head>

<body>

    <div class="container">

        <h1>User Management</h1>

        <p>
            <a href="adminPage.php">Back to Dashboard</a>
        </p>

        <fieldset>

            <legend>Add User</legend>

            <form action="../Controller/userSave.php"
                  method="post"
                  onsubmit="return saveUser();">

                <table>

                    <tr>

                        <td><b>Username:</b></td>

                        <td>
                            <input type="text" name="username" required>
                        </td>

                    </tr>

                    <tr>

                        <td><b>Full Name:</b></td>

                        <td>
                            <input type="text" name="fullName" required>
                        </td>

                    </tr>

                    <tr>

                        <td><b>NID:</b></td>

                        <td>
                            <input type="text" name="nid" required>
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

                        <td><b>Password:</b></td>

                        <td>
                            <input type="password" name="password" required>
                        </td>

                    </tr>

                    <tr>

                        <td><b>Phone:</b></td>

                        <td>
                            <input type="text" name="phoneNo" required>
                        </td>

                    </tr>

                    <tr>

                        <td><b>Role:</b></td>

                        <td>

                            <select name="role" required>

                                <option value="">Select Role</option>

                                <option value="Admin">Admin</option>

                                <option value="Doctor">Doctor</option>

                                <option value="Patient">Patient</option>

                                <option value="Staff">Staff</option>

                            </select>

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

        <h2>User List</h2>

        <table border="1">

            <tr>

                <th>Username</th>

                <th>Full Name</th>

                <th>Email</th>

                <th>Phone</th>

                <th>Role</th>

                <th>Action</th>

            </tr>

            <?php while ($row = $result->fetch_assoc()) { ?>

            <tr>

                <td><?php echo $row["username"]; ?></td>

                <td><?php echo $row["full_name"]; ?></td>

                <td><?php echo $row["email"]; ?></td>

                <td><?php echo $row["phone_no"]; ?></td>

                <td><?php echo $row["role"]; ?></td>

                <td>

                    <button type="button"
                        onclick='editUser(
                            <?php echo json_encode($row["username"]); ?>,
                            <?php echo json_encode($row["full_name"]); ?>,
                            <?php echo json_encode($row["nid"]); ?>,
                            <?php echo json_encode($row["email"]); ?>,
                            <?php echo json_encode($row["address"]); ?>,
                            <?php echo json_encode($row["password"]); ?>,
                            <?php echo json_encode($row["phone_no"]); ?>,
                            <?php echo json_encode($row["role"]); ?>
                        )'>

                        Edit

                    </button>

                    <button type="button"
                        onclick='removeUser(<?php echo json_encode($row["username"]); ?>)'>

                        Remove

                    </button>

                </td>

            </tr>

            <?php } ?>

        </table>

    </div>

</body>

</html>