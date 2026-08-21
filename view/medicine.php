<html>

<head>

    <title>Medicine Management</title>

    <link rel="stylesheet" type="text/css" href="adminDesign.css">

    <script>

        function saveMedicine() {

            let confirmSave = confirm("Are you sure you want to save this medicine?");

            if (confirmSave) {

                alert("Medicine saved successfully");

            }

            return false;

        }


        function editMedicine() {

            let confirmEdit = confirm("Are you sure you want to edit this medicine?");

            if (confirmEdit) {

                alert("Medicine edit option selected");

            }

            return false;

        }


        function removeMedicine() {

            let confirmRemove = confirm("Are you sure you want to remove this medicine?");

            if (confirmRemove) {

                alert("Medicine removed successfully");

            }

            return false;

        }

    </script>

</head>

<body>

    <div class="container">

        <h1>Medicine Management</h1>

        <p>

            <a href="adminPage.php">Back to Dashboard</a>

        </p>

        <fieldset>

            <legend>Add Medicine</legend>

            <form onsubmit="return saveMedicine();">

                <table>

                    <tr>

                        <td><b>Medicine Name:</b></td>

                        <td>
                            <input type="text" name="medicineName">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Quantity:</b></td>

                        <td>
                            <input type="number" name="quantity">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Price:</b></td>

                        <td>
                            <input type="number" name="price">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Expiry Date:</b></td>

                        <td>
                            <input type="date" name="expiryDate">
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

        <h2>Medicine List</h2>

        <table border="1">

            <tr>

                <th>ID</th>

                <th>Medicine Name</th>

                <th>Quantity</th>

                <th>Price</th>

                <th>Expiry Date</th>

                <th>Action</th>

            </tr>

            <tr>

                <td>1</td>

                <td>Paracetamol</td>

                <td>100</td>

                <td>2</td>

                <td>2027-01-01</td>

                <td>

                    <button type="button" onclick="editMedicine()">
                        Edit
                    </button>

                    <button type="button" onclick="removeMedicine()">
                        Remove
                    </button>

                </td>

            </tr>

        </table>

    </div>

</body>

</html>