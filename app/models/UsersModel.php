<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * UsersModel
 * 
 * Model for managing users data
 */
class UsersModel extends Model
{
    /**
     * Table associated with the model
     * 
     * @var string
     */
    protected $table = 'users';

    /**
     * Primary key of the table
     * 
     * @var string
     */
    protected $primary_key = 'id';

    /**
     * Fillable attributes for mass assignment
     * 
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'username'
    ];
}
