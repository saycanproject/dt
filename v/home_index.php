<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ditan System</title>
  <link rel="stylesheet" type="text/css" href="/v/styles.css">
</head>
<body>
  <header>
    <h1>Ditan System</h1>
    <select id="categories">
      <option value="">Select a category</option>
    </select>
    <!-- Add a link to the product form here -->
    <nav>
      <a href="index.php?controller=Category&action=insertCategory">Add Category</a>
    </nav>
    <nav>
      <a href="index.php?controller=Product&action=insert">Add Product</a>
    </nav>
  </header>
  <main>
    <ul id="products"></ul>
  </main>
  <footer>
    <p>2023 Ditan System®</p>
  </footer>
  <script src="v/script.js"></script>
</body>
</html>