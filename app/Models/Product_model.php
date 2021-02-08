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

    public function update_product($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['product_id' => $id]);
    }

    public function delete_product($id)
    {
        return $this->db->table($this->table)->delete(['product_id' => $id]);
    }
}