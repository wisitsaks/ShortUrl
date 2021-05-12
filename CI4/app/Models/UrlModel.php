<?php

namespace App\Models;

use CodeIgniter\Model;

class UrlModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'tbl_urls';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		"original_url",
		"short_url",
		"short_code",
		"created_at"
	];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];


    function urlList($count)
    {
        $builder = $this->db->table('tbl_urls');
        $builder->orderBy('created_at', 'DESC');
        $query = $builder->get($count,0);
      
        return $query->getResult();
    }
}