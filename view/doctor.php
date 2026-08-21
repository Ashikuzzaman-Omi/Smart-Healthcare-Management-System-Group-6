<html>

<head>

    <title>Doctor Management</title>

    <link rel="stylesheet" type="text/css" href="design/adminDesign.css">

    <script>

        function saveDoctor() {

            let confirmSave = confirm("Are you sure you want to save this doctor?");

            if (confirmSave) {

                alert("Doctor saved successfully");

            }

            return false;

        }

        function editDoctor() {

            let confirmEdit = confirm("Are you sure you want to edit this doctor?");

            if (confirmEdit) {

                alert("Doctor edit option selected");

            }

            return false;

        }

        function removeDoctor() {

            let confirmRemove = confirm("Are you sure you want to remove this doctor?");

            if (confirmRemove) {

                alert("Doctor removed successfully");

            }

            return false;

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

            <form onsubmit="return saveDoctor();">

                <table>

                    <tr>

                        <td><b>Doctor Name:</b></td>

                        <td>
                            <input type="text" name="doctorName">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Email:</b></td>

                        <td>
                            <input type="text" name="doctorEmail">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Phone:</b></td>

                        <td>
                            <input type="text" name="doctorPhone">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Specialization:</b></td>

                        <td>
                            <input type="text" name="specialization">
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

            <tr>

                <td>1</td>

                <td>Dr. Rahman</td>

                <td>doctor@gmail.com</td>

                <td>01900000000</td>

                <td>Medicine</td>

                <td>

                    <button type="button" onclick="editDoctor()">
                        Edit
                    </button>

                    <button type="button" onclick="removeDoctor()">
                        Remove
                    </button>

                </td>

            </tr>

        </table>

    </div>

</body>

</html>