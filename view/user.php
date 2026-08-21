<html>

<head>

    <title>User Management</title>

    <link rel="stylesheet" type="text/css" href="design/adminDesign.css">

    <script>

        function saveUser() {

            let confirmSave = confirm("Are you sure you want to save this user?");

            if (confirmSave) {

                alert("User saved successfully");

            }

            return false;

        }

        function editUser() {

            let confirmEdit = confirm("Are you sure you want to edit this user?");

            if (confirmEdit) {

                alert("User edit option selected");

            }

            return false;

        }

        function removeUser() {

            let confirmRemove = confirm("Are you sure you want to remove this user?");

            if (confirmRemove) {

                alert("User removed successfully");

            }

            return false;

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

            <form onsubmit="return saveUser();">

                <table>

                    <tr>

                        <td><b>Username:</b></td>

                        <td>
                            <input type="text" name="username">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Full Name:</b></td>

                        <td>
                            <input type="text" name="fullname">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Email:</b></td>

                        <td>
                            <input type="text" name="email">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Phone:</b></td>

                        <td>
                            <input type="text" name="phone">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Role:</b></td>

                        <td>

                            <select name="role">

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

                <th>ID</th>

                <th>Username</th>

                <th>Full Name</th>

                <th>Email</th>

                <th>Phone</th>

                <th>Role</th>

                <th>Action</th>

            </tr>

            <tr>

                <td>1</td>

                <td>admin</td>

                <td>Admin User</td>

                <td>admin@gmail.com</td>

                <td>01700000000</td>

                <td>Admin</td>

                <td>

                    <button type="button" onclick="editUser()">
                        Edit
                    </button>

                    <button type="button" onclick="removeUser()">
                        Remove
                    </button>

                </td>

            </tr>

        </table>

    </div>

</body>

</html>