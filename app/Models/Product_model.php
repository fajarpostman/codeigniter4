<?php namespace App\Models;

use CodeIgniter\Model;

class Product_Model extends Model 
{
    protected $table = "product";

    public function get_product($id = false)
    {
        if ($id === false)
        {
            return $this->table('product')
                        ->get()
                        ->getResultArray();
        }
        else
        {
            return $this->table('product')
                        ->where('product_id', $id)
                        ->get()
                        ->getRowArray();
        }
    }

    public function insert_product($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
}