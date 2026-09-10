<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * AuthMiddleware
 * 
 * Middleware to check if user is authenticated
 */
class AuthMiddleware
{
    public function handle($next)
    {
        // Start session if not already started
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        // Log for debugging
        error_log("AuthMiddleware: user_id=" . ($_SESSION['user_id'] ?? 'empty') . ", username=" . ($_SESSION['username'] ?? 'empty'));

        // Check if user is authenticated
        if (empty($_SESSION['user_id']) || empty($_SESSION['username'])) {
            error_log("AuthMiddleware: Redirecting to login");
            redirect('login');
            return;
        }

        error_log("AuthMiddleware: User authenticated, proceeding");
        return $next();
    }
}

