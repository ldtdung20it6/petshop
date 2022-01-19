<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Role\RoleService;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Role\RoleRequest;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function create()
    {
        return view('admin.role.add', [
            'title' => 'Phân Quyền',
            'roles' => $this->roleService->getUser()
        ]);
    }

    public function store(RoleRequest $request)
    {
        $this->roleService->create($request);

        return redirect()->back();

    }

    public function index()
    {
        return view('admin.role.list', [
            'title' => 'Danh Sách Nhân Viên',
            'roles' => $this->roleService->getAll(),
            'users' => $this->roleService->getAll()
        ]);
    }

    public function show(User $user)
    {
        return view('admin.role.edit', [
            'title' => 'Chỉnh Sửa Phân Quyền: ' . $user->fullname,
            'user' => $user,
            'users' => $this->roleService->getUser()
        ]);
    }

    public function update(User $user, Request $request)
    {
        $this->roleService->update($request, $user);

        return redirect('/admin/roles/list');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->roleService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
    public function showSidebar(User $user){
        return view('admin.sidebar',[
            'user' => $user,
            'users' => $this->roleService->getUser()
        ]);
    }
}
