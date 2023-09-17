window.onload = function() {
  // Fetch categories and products
  fetchCategories();

  // Populate products list
  var select = document.getElementById('categories');
  select.addEventListener('change', function() {
    fetchProducts(this.value);
  });
}

function fetchCategories() {
  fetch('index.php?controller=Category&action=allCategoriesJson')
    .then(response => response.json())
    .then(categories => populateCategories(categories))
    .catch(error => console.error('Error:', error));
}

function populateCategories(categories) {
  const select = document.getElementById('categories');
  categories.forEach(category => {
    const option = document.createElement('option');
    option.value = category.id;
    option.textContent = category.name;
    select.appendChild(option);
  });
}

function fetchProducts(categoryId) {
  fetch(`index.php?controller=Product&action=productsByCategoryJson&categoryId=${categoryId}`)
    .then(response => response.json())
    .then(products => populateProducts(products))
    .catch(error => console.error('Error:', error));
}

function populateProducts(products) {
  var ul = document.getElementById('products');
  ul.innerHTML = '';
  products.forEach(product => {
    var li = document.createElement('li');
    var a = document.createElement('a');
    a.href = `index.php?controller=Product&action=view&id=${product.id}`;
    a.textContent = product.name;
    li.appendChild(a);
    ul.appendChild(li);
  });
}