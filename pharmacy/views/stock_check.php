<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stock Check</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Stock Check</h2>

    <div class="topbar">
        <a href="medicine_controller.php?action=list" class="btn btn-search">← Back to All Medicines</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Stock Status</th>
        </tr>

        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                if ($row['quantity'] == 0) {
                    $status = "Out of Stock";
                    $badgeColor = "#e74c3c";
                } elseif ($row['quantity'] < 20) {
                    $status = "Low Stock";
                    $badgeColor = "#f39c12";
                } else {
                    $status = "In Stock";
                    $badgeColor = "#27ae60";
                }

                echo "<tr>";
                echo "<td>" . (int) $row['id'] . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                echo "<td>" . (int) $row['quantity'] . "</td>";
                echo "<td><span style='background:$badgeColor; color:white; padding:4px 10px; border-radius:4px; font-size:12px;'>$status</span></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' style='text-align:center;'>No medicines found.</td></tr>";
        }
        ?>
    </table>
</div>
</body>
</html>