<?php namespace App\Controllers;

use App\Models\Product_model;

class Product extends BaseController
{
    public function __construct()
    {
        $this->product = new Product_model();
    }

    public function create()
    {
        return view('product/create');
    }

    public function index()
    {
        $data['product'] = $this->product->get_product();
        return view('product/index', $data);
    }

    public function store()
    {
        $name = $this->request->getPost('product_name');
        $desc = $this->request->getPost('product_description');

        $data = [
            'product_name' => $name,
            'product_description' => $desc
        ];

        $save = $this->product->insert_product($data);

        if ($save)
        {
            session()->setFlashdata('success', 'Product Berhasil Dibuat');
            return redirect()->to('/product');
        }
        else
        {
            session()->setFlashdata('error', 'Product gagal dibuat');
            return redirect()->to('/product');
        }
    }

    public function show($id)
    {
        $data['product'] = $this->product->get_product($id);
        return view('product/show', $data);
    }
}