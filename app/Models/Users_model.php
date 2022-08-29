<?php

namespace App\Models;

use CodeIgniter\Model;

class Users_model extends Model
{
    protected $table = 'users';

    public function get($id = false)
    {
        return ! $id ? $this->findAll() : $this->find($id);
    }

    public function create($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function modify($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function destroy($id)
    {
        return $this->delete($id);
    }
}