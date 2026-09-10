<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * ProductModel
 * 
 * Model for managing products data
 */
class ProductModel extends Model
{
    /**
     * Table associated with the model
     * 
     * @var string
     */
    protected $table = 'products';

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
        'product_name',
        'description',
        'price',
        'quantity'
    ];
}
