<html>

<head>

    <title>Payment Management</title>

    <link rel="stylesheet" type="text/css" href="adminDesign.css">

    <script>

        function savePayment() {

            let confirmSave = confirm("Are you sure you want to save this payment?");

            if (confirmSave) {

                alert("Payment saved successfully");

            }

            return false;

        }


        function editPayment() {

            let confirmEdit = confirm("Are you sure you want to edit this payment?");

            if (confirmEdit) {

                alert("Payment edit option selected");

            }

            return false;

        }


        function removePayment() {

            let confirmRemove = confirm("Are you sure you want to remove this payment?");

            if (confirmRemove) {

                alert("Payment removed successfully");

            }

            return false;

        }

    </script>

</head>

<body>

    <div class="container">

        <h1>Payment Management</h1>

        <p>

            <a href="adminPage.php">Back to Dashboard</a>

        </p>

        <fieldset>

            <legend>Add Payment</legend>

            <form onsubmit="return savePayment();">

                <table>

                    <tr>

                        <td><b>Patient Name:</b></td>

                        <td>
                            <input type="text" name="patientName">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Amount:</b></td>

                        <td>
                            <input type="number" name="amount">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Payment Date:</b></td>

                        <td>
                            <input type="date" name="paymentDate">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Payment Status:</b></td>

                        <td>

                            <select name="paymentStatus">

                                <option value="">Select Status</option>

                                <option value="Paid">Paid</option>

                                <option value="Pending">Pending</option>

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

        <h2>Payment List</h2>

        <table border="1">

            <tr>

                <th>ID</th>

                <th>Patient Name</th>

                <th>Amount</th>

                <th>Payment Date</th>

                <th>Status</th>

                <th>Action</th>

            </tr>

            <tr>

                <td>1</td>

                <td>Patient Name</td>

                <td>500</td>

                <td>2026-08-20</td>

                <td>Paid</td>

                <td>

                    <button type="button" onclick="editPayment()">
                        Edit
                    </button>

                    <button type="button" onclick="removePayment()">
                        Remove
                    </button>

                </td>

            </tr>

        </table>

    </div>

</body>

</html>