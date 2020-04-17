<?php

namespace Ci4adminrbac\Controllers\Admin\User;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use Ci4adminrbac\Controllers\Admin\AdminController;

use Ci4adminrbac\Libraries\Datatable;
use Ci4adminrbac\Models\MHelper;

class User extends AdminController
{

    protected $selectedModule = 2;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->adminlte->setPageTitle('Pengguna');
        $this->adminlte->setContentTitle('Daftar Pengguna');
    }

    public function index()
    {

        $mHelper = new MHelper();
        $userGroups = $mHelper->resultArray('tbl_user_groups');
        $userGroupsDs = populateDsDropdown($userGroups, 'id', 'group_name');
        $this->vars['userGroupsDs'] = json_encode($userGroupsDs);
        $this->adminlte->setContentView('user/user/main');

        parent::render();
    }

    public function getdata()
    {
        $dataTable = new Datatable('v_administrators');
        $dataTable->addDtNumberHandler();
        $dataTable->addDtDb(1, 'username', true, true);
        $dataTable->addDtDb(2, 'fullname', true, true);
        $dataTable->addDtDb(3, 'email', true, true);
        $dataTable->addDtDb(4, 'id', false, false);
        return parent::responeDataTable($dataTable);
    }

    public function delete()
    {
        $hasDeletePrivilege = $this->auth->hasDeletePrivilege($this->selectedModule);
        if ($hasDeletePrivilege) {
            return parent::deleteData('tbl_users', 'v_administrators');
        } else {
            $message = 'Tidak memiliki hak untuk menghapus!';
            return $this->failUnauthorized($message);
        }
    }

    public function find()
    {
        $mHelper = new MHelper();

        $status = 'warning';
        $message = 'Data tidak ada!';
        if ($this->request->getGet(null)) {
            $id = $this->request->getGet('id');
            $findData = $mHelper->rowArray('v_administrators', ['username, fullname, user_group_id'], ['id' => $id]);
            if ($findData) {
                $status = 'success';
                $message = 'Data ditemukan!';
                $record = array(
                    'username' => $findData['username'],
                    'fullname' => $findData['fullname'],
                    'user_group' => $findData['user_group_id'],
                );
                $this->vars['record'] = $record;
            }
        }
        return parent::outputJson($status, $message);
    }

    public function store()
    {
        $hasAddOrEditPrivileges = $this->auth->hasAddOrEditPrivileges($this->selectedModule);
        if ($hasAddOrEditPrivileges) {
            $mHelper = new MHelper();
            $status = 'error';
            $message = 'Data gagal tersimpan!';
            if ($postData = $this->request->getPost(null)) {
                $id = $this->request->getPost('id');
                if ($this->validation($id)) {
                    $userId = $this->auth->getUserData('id');
                    $fillData = $this->fillData($id);
                    try {
                        $mHelper->updateOrInsert($id, 'tbl_users', $fillData, $userId);
                        $status = 'success';
                        $message = "Data berhasil tersimpan !";
                    } catch (\Throwable $th) {
                        $message = $th->getMessage();
                    }
                } else {
                    $message = $this->validator->listErrors('alert');
                }
            }

            return parent::outputJson($status, $message);
        } else {
            $message = 'Tidak memiliki hak untuk tambah atau ubah data!';
            return $this->failUnauthorized($message);
        }
    }
    private function fillData($id)
    {
        $postData = $this->request->getPost(null);
        $fillData = array(
            'username' => $postData['username'],
            'fullname' => $postData['fullname'],
            'user_group_id' => ($postData['user_group']) > 0 ? $postData['user_group'] : 1,
        );

        if (!isParamId($id)) {
            $fillData['password'] = $this->auth->encrptPassword($postData['password']);
        }

        return $fillData;
    }

    private function validation($id)
    {
        $rules = [
            'username' => [
                'label'  => 'Username',
                'rules'  => 'required|alpha_dash'
            ],
            'fullname' => [
                'label'  => 'Nama Lengkap',
                'rules'  => 'required'
            ],
            'user_group' => [
                'label'  => 'Grup Pengguna',
                'rules'  => 'required'
            ],
        ];

        if (!isParamId($id)) {
            $rules['password'] = [
                'label'  => 'Password',
                'rules'  => 'required'
            ];
        }
        return $this->validate($rules);
    }
}
