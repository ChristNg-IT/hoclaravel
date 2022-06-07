<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function getAllUsers(){
        $users = DB::select('SELECT * FROM users order by created_at desc');

        return $users;
    }

    public function addUser($data){
        DB::insert('INSERT INTO users (name, email,created_at) VALUES (?, ?,?)',$data);
    }

    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ? ',[$id]);
    }

    public function updateUser($data,$id){
        $data [] = $id;
        return DB::update('UPDATE '.$this->table.' SET name = ?, email = ?, update_at = ? where id = ?',$data);
    }

    public function deleteUser($id){
        return DB::delete('DELETE FROM '.$this->table.' WHERE id = ? ',[$id]);
    }

    public function statementUser($sql){
        return DB::statement($sql);
    }
}
