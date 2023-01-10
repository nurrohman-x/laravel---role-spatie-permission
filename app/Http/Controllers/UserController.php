<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function data()
    {
        return Datatables::of(
            User::query()
        )->addColumn('role', function ($model) {
            return implode(' - ', $model->getRoleNames()->toArray());
        })->addColumn('status', function ($model) {
            if ($model->status() == 1) {
                $status = 'checked';
            } else {
                $status = '';
            }
            return '<div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" onclick="updateStatus(`' . route('user.status', $model->id) . '`)" ' . $status . '> 
                    </div>';
        })->addColumn('action', function ($model) {
            return ' <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0);"> 
                                <i class="bx bx-show-alt me-2"></i> 
                                Show
                            </a>
                            <a class="dropdown-item" href="javascript:void(0);">
                                <i class="bx bx-edit-alt me-2"></i> 
                                Edit
                            </a>
                            <a class="dropdown-item" href="javascript:void(0);">
                                <i class="bx bx-trash me-2"></i> 
                                Delete
                            </a>
                        </div>
                    </div>';
        })->rawColumns(['action', 'status'])->make(true);
    }
    public function status($id)
    {
        $user = User::find($id);


        $user->update([
            'status' => $user->status === 0 ? 1 : 0
        ]);

        return response()->json(['berhasil ubah data'], 201);
    }
}
