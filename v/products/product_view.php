<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Details</title>
  <link rel="stylesheet" type="text/css" href="/v/styles.css">
</head>
<body>
  <header>
    <h1>Product Details</h1>
    <nav>
      <a href="index.php">Back to Home</a>
    </nav>
  </header>
  <main>
    <h2><?php echo $product['name']; ?></h2>
    <div><?php echo $product['description']; ?></div>
    <!-- Display other product details here -->
  </main>
  <footer>
    <p>2023 Ditan System®</p>
  </footer>
</body>
</html>