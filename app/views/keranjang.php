<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keranjang Saya</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
body {
  font-family: 'Arial', sans-serif;
  background-color: #f8dede;
  margin: 0;
  padding: 0;
}

.cart-container {
  padding: 20px;
  max-width: 500px;
  margin: 0 auto;
}

.cart-container a {
  text-decoration: none;
  color: black;
}

header {
  display: flex;
  align-items: center;
  gap: 10px;
}

header i {
  font-size: 18px;
}

h2 {
  margin: 0;
}

hr {
  border: 1px solid #000;
  margin: 10px 0 20px;
}

.cart-item {
  display: flex;
  align-items: center;
  background-color: #f8dede;
  padding: 10px;
  margin-bottom: 10px;
  gap: 10px;
}

.cart-item img {
  width: 60px;
  height: 60px;
  border-radius: 10px;
}

.item-info h3 {
  font-size: 16px;
  margin: 0 0 5px;
  font-weight: bold;
}

.price {
  background-color: white;
  padding: 4px 8px;
  border-radius: 8px;
  font-weight: bold;
}

.cart-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: white;
  padding: 15px;
  border-radius: 15px;
  position: sticky;
  bottom: 0;
  margin-top: 20px;
}

.checkout-btn {
  background-color: #e48b8b;
  color: white;
  border: none;
  border-radius: 12px;
  padding: 10px 20px;
  font-weight: bold;
}

.checkout-btn:hover {
  background-color: #d77a7a;        
}

  </style>
</head>
<body>
  <div class="cart-container">
    <header>
      <a href="#"><i class="fa fa-arrow-left"></i></a>
      <h2>Keranjang Saya</h2>
    </header>
    <hr>

    <div class="cart-item">
      <input type="checkbox">
      <img src="assets/img/keranjang.jpg" alt="dessert">
      <div class="item-info">
        <h3>[Ready Stock ] dessert</h3>
        <span class="price">Rp. 60.000</span>
      </div>
    </div>

    <div class="cart-item">
      <input type="checkbox">
      <img src="assets/img/keranjang.jpg" alt="dessert">
      <div class="item-info">
        <h3>[Ready Stock ] dessert</h3>
        <span class="price">Rp. 60.000</span>
      </div>
    </div>

    <div class="cart-item">
      <input type="checkbox">
      <img src="assets/img/keranjang.jpg" alt="dessert">
      <div class="item-info">
        <h3>[Ready Stock ] dessert</h3>
        <span class="price">Rp. 60.000</span>
      </div>
    </div>

    <footer class="cart-footer">
      <label><input type="checkbox"> Semua</label>
      <span>Total <strong>Rp0</strong></span>
      <a href=""><button class="checkout-btn">CheckOut (0)</button></a>
    </footer>
  </div>
</body>
</html>