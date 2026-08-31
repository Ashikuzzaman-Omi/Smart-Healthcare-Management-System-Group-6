<?php

include "../Model/DatabaseConnection.php";

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "SELECT * FROM payments";

$result = $connection->query($sql);

?>

<html>

<head>

    <title>Payment Management</title>

    <link rel="stylesheet" type="text/css" href="design/adminDesign.css">

    <script>

        function savePayment() {

            let confirmSave = confirm("Are you sure you want to save this payment?");

            return confirmSave;

        }


        function editPayment(payment_id, patient_name, phone_no, amount, patient_serial, payment_date, status) {

            let confirmEdit = confirm("Are you sure you want to edit this payment?");

            if (confirmEdit) {

                let newPatient = prompt("Patient Name:", patient_name);

                if (newPatient == null) {
                    return;
                }

                let newPhone = prompt("Phone No:", phone_no);

                if (newPhone == null) {
                    return;
                }

                let newAmount = prompt("Amount:", amount);

                if (newAmount == null) {
                    return;
                }

                let newSerial = prompt("Patient Serial:", patient_serial);

                if (newSerial == null) {
                    return;
                }

                let newDate = prompt("Payment Date:", payment_date);

                if (newDate == null) {
                    return;
                }

                let newStatus = prompt("Status:", status);

                if (newStatus == null) {
                    return;
                }

                let form = document.createElement("form");

                form.method = "post";
                form.action = "../Controller/paymentUpdate.php";

                form.innerHTML =

                    '<input type="hidden" name="payment_id" value="' + payment_id + '">' +

                    '<input type="hidden" name="patientName" value="' + newPatient + '">' +

                    '<input type="hidden" name="phoneNo" value="' + newPhone + '">' +

                    '<input type="hidden" name="amount" value="' + newAmount + '">' +

                    '<input type="hidden" name="patientSerial" value="' + newSerial + '">' +

                    '<input type="hidden" name="paymentDate" value="' + newDate + '">' +

                    '<input type="hidden" name="status" value="' + newStatus + '">';

                document.body.appendChild(form);

                form.submit();

            }

        }


        function removePayment(payment_id) {

            let confirmRemove = confirm("Are you sure you want to remove this payment?");

            if (confirmRemove) {

                window.location.href =
                    "../Controller/paymentRemove.php?payment_id=" + payment_id;

            }

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

            <form action="../Controller/paymentSave.php"
                  method="post"
                  onsubmit="return savePayment();">

                <table>

                    <tr>

                        <td><b>Patient Name:</b></td>

                        <td>
                            <input type="text" name="patientName" required>
                        </td>

                    </tr>

                    <tr>

                        <td><b>Phone No:</b></td>

                        <td>
                            <input type="text" name="phoneNo" required>
                        </td>

                    </tr>

                    <tr>

                        <td><b>Amount:</b></td>

                        <td>
                            <input type="number" step="0.01" name="amount" required>
                        </td>

                    </tr>

                    <tr>

                        <td><b>Patient Serial:</b></td>

                        <td>
                            <input type="number" name="patientSerial">
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

                            <select name="status">

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

                <th>Phone No</th>

                <th>Amount</th>

                <th>Patient Serial</th>

                <th>Payment Date</th>

                <th>Status</th>

                <th>Action</th>

            </tr>

            <?php while ($row = $result->fetch_assoc()) { ?>

            <tr>

                <td><?php echo $row["payment_id"]; ?></td>

                <td><?php echo $row["patient_name"]; ?></td>

                <td><?php echo $row["phone_no"]; ?></td>

                <td><?php echo $row["amount"]; ?></td>

                <td><?php echo $row["patient_serial"]; ?></td>

                <td><?php echo $row["payment_date"]; ?></td>

                <td><?php echo $row["status"]; ?></td>

                <td>

                    <button type="button"
                        onclick='editPayment(
                            <?php echo $row["payment_id"]; ?>,
                            <?php echo json_encode($row["patient_name"]); ?>,
                            <?php echo json_encode($row["phone_no"]); ?>,
                            <?php echo json_encode($row["amount"]); ?>,
                            <?php echo json_encode($row["patient_serial"]); ?>,
                            <?php echo json_encode($row["payment_date"]); ?>,
                            <?php echo json_encode($row["status"]); ?>
                        )'>

                        Edit

                    </button>

                    <button type="button"
                        onclick="removePayment(<?php echo $row["payment_id"]; ?>)">

                        Remove

                    </button>

                </td>

            </tr>

            <?php } ?>

        </table>

    </div>

</body>

</html>