<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Medicine List - Pharmacy</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <div class="topbar">
        <h2 style="border:none;margin:0;">Medicine Inventory</h2>
        <span>Logged in &nbsp;|&nbsp; <a href="logout.php">Logout</a></span>
    </div>

    <?php if ($message != ''): ?>
        <div class="alert"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>

    <div class="topbar">
        <form method="GET" action="medicine_controller.php" style="display:flex; gap:8px;">
            <input type="hidden" name="action" value="search">
            <input type="text" name="search" placeholder="Search by name or category..." style="margin:0; width:250px;">
            <button type="submit" class="btn btn-search">Search</button>
        </form>

        <div>
            <a href="medicine_controller.php?action=stock" class="btn btn-edit">Stock Check</a>
            <a href="medicine_controller.php?action=add" class="btn btn-add">+ Add Medicine</a>
            <a href="medicine_controller.php?action=search" class="btn btn-search">Advanced Search</a>
            <a href="medicine_controller.php?action=low_stock" class="btn btn-delete">Low Stock</a>
        </div>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Expiry Date</th>
            <th>Supplier</th>
            <th>Action</th>
        </tr>

        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rowClass = ($row['quantity'] < 20) ? "low-stock" : "";
                echo "<tr class='$rowClass'>";
                echo "<td>" . (int) $row['id'] . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                echo "<td>" . htmlspecialchars($row['price']) . " Tk</td>";
                echo "<td>" . (int) $row['quantity'] . "</td>";
                echo "<td>" . htmlspecialchars($row['expiry_date']) . "</td>";
                echo "<td>" . htmlspecialchars($row['supplier']) . "</td>";
                echo "<td>
                        <a href='medicine_controller.php?action=edit&id=" . (int) $row['id'] . "' class='btn btn-edit'>Edit</a>
                        <form method='POST' action='medicine_controller.php?action=delete' style='display:inline;'
                              onsubmit=\"return confirm('Are you sure you want to delete this medicine?');\">
                            " . csrf_field() . "
                            <input type='hidden' name='id' value='" . (int) $row['id'] . "'>
                            <button type='submit' class='btn btn-delete'>Delete</button>
                        </form>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8' style='text-align:center;'>No medicines found.</td></tr>";
        }
        ?>
    </table>
</div>
</body>
</html>