<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Medicine</title>
     <link rel="stylesheet" href="css/style.css">      
</head>
<body>
<div class="container">
    <h2>Search Medicine</h2>

    <div class="topbar">
        <form method="GET" action="medicine_controller.php" style="display:flex; gap:8px;">
            <input type="hidden" name="action" value="search">
            <input type="text" name="search" placeholder="Enter medicine name, category, or supplier..."
                   value="<?php echo htmlspecialchars($keyword); ?>" style="margin:0; width:300px;" autofocus>
            <button type="submit" class="btn btn-search">Search</button>
        </form>

        <a href="medicine_controller.php?action=list" class="btn btn-add">← All Medicines</a>
    </div>

    <?php if (!$searched): ?>
        <p style="color:#777; text-align:center; margin-top:30px;">
            Enter a medicine name, category, or supplier in the search bar. <br>
            Example: "Paracetamol", "Tablet", "ABC Pharma" etc.
        </p>
    <?php else: ?>

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
                echo "<tr><td colspan='8' style='text-align:center;'>No medicine found matching '" . htmlspecialchars($keyword) . "'.</td></tr>";
            }
            ?>
        </table>

    <?php endif; ?>
</div>
</body>
</html>