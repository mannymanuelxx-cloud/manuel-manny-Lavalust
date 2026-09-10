<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Product Management System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .header h1 {
            font-size: 2em;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logout-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .add-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1em;
            font-weight: 600;
            transition: transform 0.2s ease;
        }

        .add-btn:hover {
            transform: scale(1.05);
        }

        .search-box {
            padding: 10px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            width: 200px;
            font-size: 0.95em;
        }

        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        tbody tr:hover {
            background-color: #f9f9f9;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.9em;
            font-weight: 600;
            transition: transform 0.2s ease;
        }

        .edit-btn {
            background-color: #4CAF50;
            color: white;
        }

        .edit-btn:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
        }

        .delete-btn:hover {
            background-color: #da190b;
            transform: scale(1.05);
        }

        .no-products {
            background: white;
            padding: 40px;
            text-align: center;
            border-radius: 10px;
            color: #666;
        }

        .price {
            color: #667eea;
            font-weight: 600;
        }

        .quantity {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: 600;
        }

        .quantity.low {
            background-color: #fee;
            color: #c33;
        }

        .quantity.medium {
            background-color: #ffd700;
            color: #333;
        }

        .quantity.high {
            background-color: #d4edda;
            color: #155724;
        }

        .description {
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📦 Product Management</h1>
            <div class="user-info">
                <span>Welcome, <strong><?php echo htmlspecialchars($username ?? 'User'); ?></strong></span>
                <a href="<?php echo base_url('logout'); ?>" class="logout-btn">Logout</a>
            </div>
        </div>

        <div class="action-bar">
            <a href="<?php echo base_url('products/create'); ?>" class="add-btn">+ Add New Product</a>
            <input type="text" class="search-box" id="searchBox" placeholder="Search products...">
        </div>

        <?php if (!empty($products) && is_array($products)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php foreach ($products as $product): ?>
                        <?php 
                            $id = $product['id'] ?? $product->id ?? '';
                            $name = $product['product_name'] ?? $product->product_name ?? '';
                            $desc = $product['description'] ?? $product->description ?? '';
                            $price = $product['price'] ?? $product->price ?? 0;
                            $qty = $product['quantity'] ?? $product->quantity ?? 0;
                            $created = $product['created_at'] ?? $product->created_at ?? '';
                            
                            // Determine quantity status
                            if ($qty <= 5) {
                                $qty_class = 'low';
                            } elseif ($qty <= 20) {
                                $qty_class = 'medium';
                            } else {
                                $qty_class = 'high';
                            }
                        ?>
                        <tr class="product-row" data-product-name="<?php echo htmlspecialchars(strtolower($name)); ?>">
                            <td><?php echo htmlspecialchars($id); ?></td>
                            <td><strong><?php echo htmlspecialchars($name); ?></strong></td>
                            <td class="description"><?php echo htmlspecialchars($desc); ?></td>
                            <td class="price">$<?php echo number_format($price, 2); ?></td>
                            <td>
                                <span class="quantity <?php echo $qty_class; ?>">
                                    <?php echo $qty; ?> units
                                </span>
                            </td>
                            <td><?php echo htmlspecialchars($created); ?></td>
                            <td>
                                <div class="action-buttons">
                                    <a href="<?php echo base_url('products/edit/' . $id); ?>" class="btn edit-btn">Edit</a>
                                    <a href="<?php echo base_url('products/delete/' . $id); ?>" class="btn delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-products">
                <h2>No products found</h2>
                <p>Get started by <a href="<?php echo base_url('products/create'); ?>">adding your first product</a></p>
            </div>
        <?php endif; ?>
    </div>

    <script>
        // Search functionality
        document.getElementById('searchBox').addEventListener('keyup', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('.product-row');
            
            rows.forEach(row => {
                const productName = row.dataset.productName;
                if (productName.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
