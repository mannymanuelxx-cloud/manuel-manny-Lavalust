<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Product Management System</title>
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
            max-width: 600px;
            margin: 0 auto;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 1.5em;
        }

        .logout-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.3s ease;
            font-size: 0.9em;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .form-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 0.95em;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            font-size: 1em;
            font-family: inherit;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            outline: none;
            border-color: #667eea;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .button-group {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
        }

        button,
        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: transform 0.2s ease;
            display: inline-block;
        }

        .submit-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .submit-btn:hover {
            transform: scale(1.05);
        }

        .cancel-btn {
            background-color: #e0e0e0;
            color: #333;
        }

        .cancel-btn:hover {
            background-color: #d0d0d0;
            transform: scale(1.05);
        }

        .breadcrumb {
            margin-bottom: 20px;
            color: #666;
            font-size: 0.9em;
        }

        .breadcrumb a {
            color: #667eea;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>➕ Add New Product</h1>
            <a href="<?php echo base_url('logout'); ?>" class="logout-btn">Logout</a>
        </div>

        <div class="breadcrumb">
            <a href="<?php echo base_url('products'); ?>">← Back to Products</a>
        </div>

        <div class="form-container">
            <form method="POST" action="<?php echo base_url('products/store'); ?>">
                <div class="form-group">
                    <label for="product_name">Product Name <span style="color: #f44336;">*</span></label>
                    <input 
                        type="text" 
                        id="product_name" 
                        name="product_name" 
                        required 
                        placeholder="Enter product name"
                    >
                </div>

                <div class="form-group">
                    <label for="description">Description <span style="color: #f44336;">*</span></label>
                    <textarea 
                        id="description" 
                        name="description" 
                        required 
                        placeholder="Enter product description"
                    ></textarea>
                </div>

                <div class="form-group">
                    <label for="price">Price ($) <span style="color: #f44336;">*</span></label>
                    <input 
                        type="number" 
                        id="price" 
                        name="price" 
                        step="0.01" 
                        min="0" 
                        required 
                        placeholder="0.00"
                    >
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity <span style="color: #f44336;">*</span></label>
                    <input 
                        type="number" 
                        id="quantity" 
                        name="quantity" 
                        min="0" 
                        required 
                        placeholder="0"
                    >
                </div>

                <div class="button-group">
                    <a href="<?php echo base_url('products'); ?>" class="btn cancel-btn">Cancel</a>
                    <button type="submit" class="submit-btn">Create Product</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
