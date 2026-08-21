<html>

<head>

    <title>Patient Management</title>

    <link rel="stylesheet" type="text/css" href="design/adminDesign.css">

    <script>

        function savePatient() {

            let confirmSave = confirm("Are you sure you want to save this patient?");

            if (confirmSave) {

                alert("Patient saved successfully");

            }

            return false;

        }

        function editPatient() {

            let confirmEdit = confirm("Are you sure you want to edit this patient?");

            if (confirmEdit) {

                alert("Patient edit option selected");

            }

            return false;

        }

        function removePatient() {

            let confirmRemove = confirm("Are you sure you want to remove this patient?");

            if (confirmRemove) {

                alert("Patient removed successfully");

            }

            return false;

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

            <form onsubmit="return savePatient();">

                <table>

                    <tr>

                        <td><b>Patient Name:</b></td>

                        <td>
                            <input type="text" name="patientName">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Email:</b></td>

                        <td>
                            <input type="text" name="patientEmail">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Phone:</b></td>

                        <td>
                            <input type="text" name="patientPhone">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Address:</b></td>

                        <td>
                            <input type="text" name="patientAddress">
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
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>

            </tr>

            <tr>

                <td>1</td>
                <td>Patient Name</td>
                <td>patient@gmail.com</td>
                <td>01800000000</td>
                <td>Dhaka</td>

                <td>

                    <button type="button" onclick="editPatient()">
                        Edit
                    </button>

                    <button type="button" onclick="removePatient()">
                        Remove
                    </button>

                </td>

            </tr>

        </table>

    </div>

</body>

</html>