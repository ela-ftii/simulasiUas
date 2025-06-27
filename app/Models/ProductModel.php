<?php 
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
	protected $table = 'product'; //menyimpan nama table.
	protected $primaryKey = 'id'; //menyimpan field yang menjadi primary key.
	protected $allowedFields = [ // berisi daftar nama field yang diperbolehkan untuk dimanipulasi oleh project.
		'nama','harga','jumlah','foto','created_at','updated_at'
	];  
}