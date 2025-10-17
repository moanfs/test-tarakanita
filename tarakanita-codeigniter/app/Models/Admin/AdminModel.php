<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'admins';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['role_id', 'username', 'email', 'password'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function findAllAdmins($currentUserId)
    {
        return $this->select('admins.*, roles.name as role_name, roles.description')
            ->join('roles', 'roles.id = admins.role_id')
            // ->where('roles.name !=', 'superadmin') 
            ->where('admins.id !=', $currentUserId)
            ->findAll();
    }

    public function findAdminWithRole(string $email): ?array
    {
        return $this->select('admins.*, roles.name as role_name')
            ->join('roles', 'roles.id = admins.role_id')
            ->where('admins.email', $email)
            ->first();
    }
}
