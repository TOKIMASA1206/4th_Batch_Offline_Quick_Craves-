<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;


class UserController extends Controller
{
    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.users.index');
    }


    public function edit(User $user)
    {

        try {
            // $user->onlyTrashed()->findOrFail($id)->restore();
            $user->onlyTrashed()->restore();
            return  response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'something went wrong']);
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return  response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'something went wrong']);
        }
    }

    public function activate($id) {

        try {
            $this->user->onlyTrashed()->findOrFail($id)->restore();
            return  response(['status' => 'success', 'message' => 'Activate Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'something went wrong']);
        }

    }

}
