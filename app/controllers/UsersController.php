<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * UsersController
 * 
 * Controller for managing users
 */
class UsersController extends Controller
{
    /**
     * Display all users
     * 
     * Retrieve all users from the database and display them
     */
    public function index()
    {
        // Retrieve all users from the database using the model
        $users = $this->UsersModel->all();
        
        // Pass the users data to the view
        $this->call->view('users_list', ['users' => $users]);
    }
}
