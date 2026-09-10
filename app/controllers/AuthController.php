<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * AuthController
 * 
 * Controller for managing authentication
 */
class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function login()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        // Redirect if already logged in
        if (!empty($_SESSION['user_id'])) {
            redirect('products');
            return;
        }

        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = trim($_POST['password'] ?? '');

            // Simple authentication (in production, use proper password hashing and database)
            // For demo: accept any non-empty username/password
            if (!empty($username) && !empty($password)) {
                $_SESSION['user_id'] = md5($username);
                $_SESSION['username'] = $username;
                redirect('products');
                return;
            } else {
                $error = 'Invalid username or password';
            }
        }

        $this->call->view('login', ['error' => $error]);
    }

    /**
     * Logout user
     */
    public function logout()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        // Destroy session
        session_destroy();
        redirect('login');
    }
}
