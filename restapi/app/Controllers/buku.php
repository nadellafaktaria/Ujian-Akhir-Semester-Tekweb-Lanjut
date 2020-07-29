<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\aplikasibukuModel;
 
class buku extends ResourceController
{
    use ResponseTrait;
    // get all product
    public function index()
    {
        $model = new aplikasibukuModel();
        $data = $model->findAll();
        return $this->respond($data);
    }
 
    // get single product
    public function show($id = null)
    {
        $model = new aplikasibukuModel();
        $data = $model->getWhere(['id' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }
 
    // create a product
    public function create()
    {
        $model = new aplikasibukuModel();
        $data = [
            'nama_buku' => $this->request->getVar('nama_buku'),
            'penulis_buku' => $this->request->getVar('penulis_buku'),
            'desbuku' => $this->request->getVar('desbuku'),
            
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];
        return $this->respondCreated($response);
    }
 
    // update product
    public function update($id = 'nama', $data = null)
    {
        $model = new aplikasibukuModel();
        $input = $this->request->getRawInput();
        $data = [
            'nama' => $input['nama'],
            'merek' => $input['merek'],
            'kode_produk' => $input['kode_produk'],
            'harga' => $input['harga'],
            'tgl_kadaluarsa' => $input['tgl_kadaluarsa'],
            'deskripsi' => $input['deskripsi'],
        ];
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respond($response);
    }
 
    // delete product
    public function delete($id = 'nama')
    {
        $model = new aplikasibukuModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Deleted'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
         
    }
 
}