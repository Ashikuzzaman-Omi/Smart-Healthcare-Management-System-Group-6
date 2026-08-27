<?php

include "../Model/DatabaseConnection.php";

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "SELECT * FROM inventory";

$result = $connection->query($sql);

?>

<html>

<head>

    <title>Medicine Management</title>

    <link rel="stylesheet" type="text/css" href="design/adminDesign.css">

    <script>

        function saveMedicine() {

            let confirmSave = confirm("Are you sure you want to save this medicine?");

            return confirmSave;

        }


        function editMedicine(id, medicine_name, quantity, price, expiry_date) {

            let confirmEdit = confirm("Are you sure you want to edit this medicine?");

            if (confirmEdit) {

                let newName = prompt("Medicine Name:", medicine_name);

                if (newName == null) {
                    return;
                }

                let newQuantity = prompt("Quantity:", quantity);

                if (newQuantity == null) {
                    return;
                }

                let newPrice = prompt("Price:", price);

                if (newPrice == null) {
                    return;
                }

                let newExpiry = prompt("Expiry Date:", expiry_date);

                if (newExpiry == null) {
                    return;
                }

                let form = document.createElement("form");

                form.method = "post";
                form.action = "../Controller/medicineUpdate.php";

                form.innerHTML =

                    '<input type="hidden" name="id" value="' + id + '">' +

                    '<input type="hidden" name="medicineName" value="' + newName + '">' +

                    '<input type="hidden" name="quantity" value="' + newQuantity + '">' +

                    '<input type="hidden" name="price" value="' + newPrice + '">' +

                    '<input type="hidden" name="expiryDate" value="' + newExpiry + '">';

                document.body.appendChild(form);

                form.submit();

            }

        }


        function removeMedicine(id) {

            let confirmRemove = confirm("Are you sure you want to remove this medicine?");

            if (confirmRemove) {

                window.location.href =
                    "../Controller/medicineRemove.php?id=" + id;

            }

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

            <form action="../Controller/medicineSave.php"
                  method="post"
                  onsubmit="return saveMedicine();">

                <table>

                    <tr>

                        <td><b>Medicine Name:</b></td>

                        <td>
                            <input type="text" name="medicineName" required>
                        </td>

                    </tr>

                    <tr>

                        <td><b>Quantity:</b></td>

                        <td>
                            <input type="number" name="quantity" required>
                        </td>

                    </tr>

                    <tr>

                        <td><b>Price:</b></td>

                        <td>
                            <input type="number" step="0.01" name="price" required>
                        </td>

                    </tr>

                    <tr>

                        <td><b>Expiry Date:</b></td>

                        <td>
                            <input type="date" name="expiryDate" required>
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

                <th>Type</th>

                <th>Quantity</th>

                <th>Price</th>

                <th>Expiry Date</th>

                <th>Action</th>

            </tr>

            <?php while ($row = $result->fetch_assoc()) { ?>

            <tr>

                <td><?php echo $row["id"]; ?></td>

                <td><?php echo $row["product_name"]; ?></td>

                <td><?php echo $row["category"]; ?></td>

                <td><?php echo $row["quantity"]; ?></td>

                <td><?php echo $row["price"]; ?></td>

                <td><?php echo $row["expire_date"]; ?></td>

                <td>

                    <button type="button"
                        onclick='editMedicine(
                            <?php echo $row["id"]; ?>,
                            <?php echo json_encode($row["product_name"]); ?>,
                            <?php echo json_encode($row["quantity"]); ?>,
                            <?php echo json_encode($row["price"]); ?>,
                            <?php echo json_encode($row["expire_date"]); ?>
                        )'>

                        Edit

                    </button>

                    <button type="button"
                        onclick="removeMedicine(<?php echo $row["id"]; ?>)">

                        Remove

                    </button>

                </td>

            </tr>

            <?php } ?>

        </table>

    </div>

</body>

</html>