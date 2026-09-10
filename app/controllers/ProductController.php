<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * ProductController
 * 
 * Controller for managing products
 */
class ProductController extends Controller
{
    /**
     * Ensure a fresh deployment has the table required by this feature.
     * The statement is idempotent, so it is safe after the table exists.
     */
    public function before_action()
    {
        $this->db->raw(
            'CREATE TABLE IF NOT EXISTS products (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                product_name VARCHAR(255) NOT NULL,
                description TEXT NULL,
                price DECIMAL(10,2) NOT NULL,
                quantity INT UNSIGNED NOT NULL DEFAULT 0,
                created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
            )'
        );
    }

    /**
     * Display all products (READ)
     */
    public function index()
    {
        // Retrieve all products from the database
        $products = $this->ProductModel->all();
        
        // Get current user info from session
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $username = $_SESSION['username'] ?? 'User';
        
        // Pass the products data to the view
        $this->call->view('products_list', [
            'products' => $products,
            'username' => $username
        ]);
    }

    /**
     * Show create product form
     */
    public function create()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $username = $_SESSION['username'] ?? 'User';
        
        $this->call->view('create_product', ['username' => $username]);
    }

    /**
     * Store product in database (CREATE)
     */
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('products');
            return;
        }

        // Validate input
        $product_name = trim($_POST['product_name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $price = floatval($_POST['price'] ?? 0);
        $quantity = intval($_POST['quantity'] ?? 0);

        if (empty($product_name) || empty($description) || $price <= 0 || $quantity < 0) {
            redirect('products/create');
            return;
        }

        // Insert product into database
        $data = [
            'product_name' => $product_name,
            'description' => $description,
            'price' => $price,
            'quantity' => $quantity,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->ProductModel->insert($data);
        redirect('products');
    }

    /**
     * Show edit product form
     */
    public function edit($id = null)
    {
        if ($id === null) {
            redirect('products');
            return;
        }

        // Find product by ID
        $product = $this->ProductModel->find($id);

        if (!$product) {
            redirect('products');
            return;
        }

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $username = $_SESSION['username'] ?? 'User';

        // Convert to array if needed
        if (is_object($product)) {
            $product = (array) $product;
        }

        $this->call->view('edit_product', [
            'product' => $product,
            'username' => $username
        ]);
    }

    /**
     * Update product in database (UPDATE)
     */
    public function update($id = null)
    {
        if ($id === null || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('products');
            return;
        }

        // Validate input
        $product_name = trim($_POST['product_name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $price = floatval($_POST['price'] ?? 0);
        $quantity = intval($_POST['quantity'] ?? 0);

        if (empty($product_name) || empty($description) || $price <= 0 || $quantity < 0) {
            redirect('products/edit/' . $id);
            return;
        }

        // Update product
        $data = [
            'product_name' => $product_name,
            'description' => $description,
            'price' => $price,
            'quantity' => $quantity
        ];

        $this->ProductModel->update($id, $data);
        redirect('products');
    }

    /**
     * Delete product from database (DELETE)
     */
    public function delete($id = null)
    {
        if ($id === null) {
            redirect('products');
            return;
        }

        // Delete product
        $this->ProductModel->delete($id);
        redirect('products');
    }
}
