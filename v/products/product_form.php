<form method="post" action="index.php?controller=Product&action=insert">
    <!-- Product Fields -->
    <input type="text" name="product[name]" placeholder="Name">
    <input type="number" step="0.01" name="product[price]" placeholder="Price">
    <input type="number" name="product[quantity]" placeholder="Quantity">
    <textarea name="product[description]" placeholder="Description"></textarea>

    <!-- Product Details Fields -->
    <input type="number" step="0.01" name="details[weight]" placeholder="Weight">
    <input type="text" name="details[color]" placeholder="Color">
    <input type="text" name="details[size]" placeholder="Size">
    <input type="text" name="details[material]" placeholder="Material">

    <!-- Product Status Fields -->
    <input type="text" name="status[status]" placeholder="Status">

    <!-- Product Options Fields -->
    <input type="text" name="options[option_name]" placeholder="Option Name">
    <input type="checkbox" name="options[option_value]" value="1"> Option Value

    <!-- Product Images Fields -->
    <input type="text" name="images[image_url]" placeholder="Image URL">
    <input type="checkbox" name="images[is_primary]" value="1"> Is Primary

    <select multiple name="categories[]">
        <!-- Option values should be category IDs -->
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>">
                <?php echo $category['name']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <input type="submit" name="submit" value="Submit">
</form>