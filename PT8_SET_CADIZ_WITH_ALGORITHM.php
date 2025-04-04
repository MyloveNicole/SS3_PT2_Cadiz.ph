<?php
function getFoodMenu() {
    return [
        'Burgers' => [
            ['name' => 'Big Mac', 'price' => 5.99, 'description' => 'Double patty with special sauce'],
            ['name' => 'Quarter Pounder', 'price' => 5.49, 'description' => 'Quarter pound beef patty'],
            ['name' => 'Cheeseburger', 'price' => 3.99, 'description' => 'Classic cheese and beef']
        ],
        'Sides' => [
            ['name' => 'French Fries', 'price' => 2.99, 'description' => 'Golden crispy fries'],
            ['name' => 'Apple Slices', 'price' => 1.99, 'description' => 'Fresh cut apple slices'],
            ['name' => 'Side Salad', 'price' => 2.49, 'description' => 'Fresh garden salad']
        ],
        'Drinks' => [
            ['name' => 'Coca-Cola', 'price' => 1.99, 'description' => 'Ice-cold classic coke'],
            ['name' => 'Sprite', 'price' => 1.99, 'description' => 'Lemon-lime sparkle'],
            ['name' => 'Milkshake', 'price' => 3.49, 'description' => 'Creamy vanilla shake']
        ]
    ];
}
$menuItems = getFoodMenu();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>McDonald's Drive-Thru</title> 

   <style>

    body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
    background-image: linear-gradient(red, yellow);
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

header {
    background: #DA291C;
    color: white;
    padding: 20px;
    text-align: center;
    border-radius: 10px;
    margin-bottom: 20px;
}

h1 {
    margin: 0;
}

main {
    display: grid;
    grid-template-columns: 7fr 3fr;
    gap: 20px;
}

.category {
    background: white;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
}

.category h2 {
    color: #DA291C;
    margin-top: 0;
}

.items {
    display: grid;
    gap: 15px;
}

.menu-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
    border: 1px solid #eee;
    border-radius: 8px;
}

.item-info {
    flex: 1;
}

.item-info h3 {
    margin: 0;
    color: #333;
}

.description {
    color: #666;
    font-size: 0.9em;
    margin: 5px 0;
}

.price {
    color: #DA291C;
    font-weight: bold;
    margin: 5px 0;
}

button {
    background: #FFC72C;
    color: #292929;
    border: none;
    padding: 8px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
}

button:hover {
    background: #FFB700;
}

.order-section {
    background: white;
    padding: 20px;
    border-radius: 10px;
    position: sticky;
    top: 20px;
    height: fit-content;
}

.order-section h2 {
    margin-top: 0;
    color: #DA291C;
}

#order-items {
    margin-bottom: 20px;
}

.order-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px solid #eee;
}

.order-total {
    border-top: 2px solid #eee;
    padding-top: 15px;
}

#total {
    font-size: 1.2em;
    font-weight: bold;
}

#checkout-btn {
    width: 100%;
    background: #DA291C;
    color: white;
    padding: 12px;
    margin-top: 10px;
}

#checkout-btn:hover {
    background: #B71C1C;
}
</style>
</head>
<body>
    <div class="container">
        <header>
            <h1>McDonald's Drive-Thru</h1>
        </header>
        <main>
            <div class="menu-section">
                <?php foreach ($menuItems as $category => $items): ?>
                    <div class="category">
                        <h2><?php echo $category; ?></h2>
                        <div class="items">
                            <?php foreach ($items as $item): ?>
                                <div class="menu-item">
                                    <div class="item-info">
                                        <h3><?php echo $item['name']; ?></h3>
                                        <p class="description"><?php echo $item['description']; ?></p>
                                        <p class="price">$<?php echo number_format($item['price'], 2); ?></p>
                                    </div>
                                    <button onclick="addToOrder('<?php echo $item['name']; ?>', <?php echo $item['price']; ?>)">Add</button>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="order-section">
                <h2>Your Order</h2>
                <div id="order-items"></div>
                <div class="order-total">
                    <p id="total">Total: $0.00</p>
                    <button id="checkout-btn" onclick="submitOrder()">Place Order</button>
                </div>
            </div>
        </main>
    </div>
    <script src="script.js"></script>
</body>
</html>
