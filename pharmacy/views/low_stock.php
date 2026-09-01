<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Low Stock Medicines</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Low Stock Medicines (Quantity &lt; 20)</h2>

    <div class="topbar">
        <a href="medicine_controller.php?action=list" class="btn btn-search">← Back to All Medicines</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Quantity Left</th>
            <th>Supplier</th>
            <th>Action</th>
        </tr>

        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr class='low-stock'>";
                echo "<td>" . (int) $row['id'] . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                echo "<td><b>" . (int) $row['quantity'] . "</b></td>";
                echo "<td>" . htmlspecialchars($row['supplier']) . "</td>";
                echo "<td><a href='medicine_controller.php?action=edit&id=" . (int) $row['id'] . "' class='btn btn-edit'>Restock (Edit)</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6' style='text-align:center;'>All medicines are sufficiently stocked.</td></tr>";
        }
        ?>
    </table>
</div>
</body>
</html>