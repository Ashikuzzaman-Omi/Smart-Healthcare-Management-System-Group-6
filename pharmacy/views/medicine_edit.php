<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Medicine</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Edit Medicine</h2>

    <form method="POST" action="medicine_controller.php?action=edit&id=<?php echo (int) $row['id']; ?>">
        <?php echo csrf_field(); ?>

        <label>Medicine Name</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>

        <label>Category</label>
        <input type="text" name="category" value="<?php echo htmlspecialchars($row['category']); ?>">

        <label>Price (Tk)</label>
        <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($row['price']); ?>" required>

        <label>Quantity</label>
        <input type="number" name="quantity" value="<?php echo (int) $row['quantity']; ?>" required>

        <label>Expiry Date</label>
        <input type="date" name="expiry_date" value="<?php echo htmlspecialchars($row['expiry_date']); ?>">

        <label>Supplier</label>
        <input type="text" name="supplier" value="<?php echo htmlspecialchars($row['supplier']); ?>">

        <button type="submit" class="btn btn-edit">Update Medicine</button>
        <a href="medicine_controller.php?action=list" class="btn btn-search">Cancel</a>
    </form>
</div>
</body>
</html>