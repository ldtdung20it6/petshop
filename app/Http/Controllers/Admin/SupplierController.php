<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\SupplierRequest;
use App\Http\Services\Supplier\SupplierService;

class SupplierController extends Controller
{

    protected $supplierService;
    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    public function create()
    {
        return view('admin.supplier.add',[
            'title' => 'Thêm nhà cung cấp'
        ]);
    }

    public function store(SupplierRequest $request)
    {
        $this->supplierService->create($request);

        return redirect()->back();

    }
    public function index()
    {
        return view('admin.supplier.list',[
            'title' => 'Danh Sách Nhà Cung Cấp',
            'suppliers' => $this->supplierService->get()
        ]);
    }
}
