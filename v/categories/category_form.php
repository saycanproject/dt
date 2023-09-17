<?php
    $action = isset($category) ? "updateCategory" : "insertCategory";
    $categoryName = isset($category) ? $category['name'] : "";
    $parentId = isset($category) ? $category['parent_id'] : "";
?>

<form method="POST" action="index.php?controller=Category&action=<?= $action ?>">
    <?php if (isset($category)): ?>
        <input type="hidden" name="id" value="<?= $category['id'] ?>">
    <?php endif; ?>
    <label>Category Name</label>
    <input type="text" name="category[name]" value="<?= $categoryName ?>">
    <label>Parent ID</label>
    <input type="number" name="category[parent_id]" value="<?= $parentId ?>" min="1" step="1">
    <input type="submit" value="Save">
</form>