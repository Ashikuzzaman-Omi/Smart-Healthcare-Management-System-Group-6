<?php

include "../Model/DatabaseConnection.php";

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "SELECT * FROM inventory";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>

    <title>Medicine Management</title>

    <link rel="stylesheet" href="design/admin design.css">

    <script>
        function confirmRemove() {
            return confirm("Are you sure you want to remove this medicine?");
        }

        function confirmUpdate() {
            return confirm("Are you sure you want to update this medicine?");
        }
    </script>

</head>

<body>

<div class="container">

    <h1>Medicine Management</h1>

    <h2>Add Medicine</h2>

    <form action="../Controller/medicineSave.php" method="post">

        <label>Product Name</label>
        <input type="text" name="productName" required>

        <label>Purchase Date</label>
        <input type="date" name="purchaseDate" required>

        <label>Quantity</label>
        <input type="number" name="quantity" required>

        <label>Category</label>
        <input type="text" name="category">

        <label>Expire Date</label>
        <input type="date" name="expireDate" required>

        <label>Status</label>
        <input type="text" name="status">

        <label>Price</label>
        <input type="number" step="0.01" name="price">

        <input type="submit" value="Save">

    </form>

    <hr>

    <h2>Medicine List</h2>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Purchase Date</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Expire Date</th>
            <th>Status</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        <?php

        while ($row = $result->fetch_assoc()) {

        ?>

        <tr>

            <td><?php echo $row["id"]; ?></td>

            <td><?php echo $row["product_name"]; ?></td>

            <td><?php echo $row["purchase_date"]; ?></td>

            <td><?php echo $row["quantity"]; ?></td>

            <td><?php echo $row["category"]; ?></td>

            <td><?php echo $row["expire_date"]; ?></td>

            <td><?php echo $row["status"]; ?></td>

            <td><?php echo $row["price"]; ?></td>

            <td>

                <form action="../Controller/medicineUpdate.php"
                      method="post"
                      onsubmit="return confirmUpdate();">

                    <input type="hidden"
                           name="id"
                           value="<?php echo $row["id"]; ?>">

                    <input type="text"
                           name="productName"
                           value="<?php echo $row["product_name"]; ?>">

                    <input type="date"
                           name="purchaseDate"
                           value="<?php echo $row["purchase_date"]; ?>">

                    <input type="number"
                           name="quantity"
                           value="<?php echo $row["quantity"]; ?>">

                    <input type="text"
                           name="category"
                           value="<?php echo $row["category"]; ?>">

                    <input type="date"
                           name="expireDate"
                           value="<?php echo $row["expire_date"]; ?>">

                    <input type="text"
                           name="status"
                           value="<?php echo $row["status"]; ?>">

                    <input type="number"
                           step="0.01"
                           name="price"
                           value="<?php echo $row["price"]; ?>">

                    <input type="submit" value="Update">

                </form>

                <a href="../Controller/medicineRemove.php?id=<?php echo $row["id"]; ?>"
                   onclick="return confirmRemove();">
                    Remove
                </a>

            </td>

        </tr>

        <?php

        }

        ?>

    </table>

</div>

</body>
</html>