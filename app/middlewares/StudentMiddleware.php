<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentMiddleware
{
    public function handle($next)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (empty($_SESSION['student_access'])) {
            redirect('student');
            return;
        }

        return $next();
    }
}