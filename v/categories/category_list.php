<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Parent Id</th>
        <th>Actions</th>
    </tr>
    <?php foreach($categories as $category): ?>
        <tr>
            <td><?= $category['id'] ?></td>
            <td><?= $category['name'] ?></td>
            <td><?= $category['parent_id'] ?></td>
            <td>
                <a href="index.php?controller=Category&action=updateCategory&id=<?= $category['id'] ?>">Edit</a>
                <a href="index.php?controller=Category&action=deleteCategory&id=<?= $category['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>