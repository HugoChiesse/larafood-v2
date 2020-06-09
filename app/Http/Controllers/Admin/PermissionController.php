<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private $repository;

    public function __construct(Permission $permission)
    {
        $this->repository = $permission;
        $this->middleware('can:permissões');
    }

    public function index()
    {
        $permissions = $this->repository->latest()->paginate();
        return view('admin.pages.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.pages.permissions.create');
    }

    public function store(PermissionRequest $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('permissions.index');
    }

    public function show($id)
    {
        $permission = $this->repository->find($id);
        if (!$permission) {
            return redirect()->back();
        }
        return view('admin.pages.permissions.show', compact('permission'));
    }

    public function edit($id)
    {
        $permission = $this->repository->find($id);
        if (!$permission) {
            return redirect()->back();
        }
        return view('admin.pages.permissions.edit', compact('permission'));
    }

    public function update(PermissionRequest $request, $id)
    {
        $permission = $this->repository->find($id);
        if (!$permission) {
            return redirect()->back();
        }
        $permission->update($request->all());
        return redirect()->route('permissions.index');
    }

    public function destroy($id)
    {
        $permission = $this->repository->find($id);
        if (!$permission) {
            return redirect()->back();
        }
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'Permissão deletada com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $permissions = $this->repository->search($request->filter);
        return view('admin.pages.permissions.index', compact('permissions', 'filters'));
    }
}
