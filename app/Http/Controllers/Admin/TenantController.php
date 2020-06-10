<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TenantRequest;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{

    protected $repository;

    public function __construct(Tenant $tenant)
    {
        $this->repository = $tenant;

        $this->middleware('can:empresas');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = $this->repository->latest()->paginate();
        return view('admin.pages.tenants.index', compact('tenants'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$tenant = $this->repository->find($id)) {
            return redirect()->back();
        }
        return view('admin.pages.tenants.show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$tenant = $this->repository->find($id)) {
            return redirect()->back();
        }
        return view('admin.pages.tenants.edit', compact('tenant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\TenantRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\TenantRequest
     */
    public function update(TenantRequest $request, $id)
    {
        if (!$tenant = $this->repository->find($id)) {
            return redirect()->back();
        }
        $data = $request->all();

        if ($request->hasFile('logo') && $request->logo->isValid()) {
            if (Storage::exists($tenant->logo)) {
                Storage::delete($tenant->logo);
            }
            $data['logo'] = $request->logo->store("tenants/{$tenant->uuid}");
        }

        $tenant->update($data);
        return redirect()->route('tenants.index')->with('success', 'Dados da empresa atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$tenant = $this->repository->find($id)) {
            return redirect()->back();
        }
        $tenant->delete();
        return redirect()->route('tenants.index')->with('success', 'Empresa deletada com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $tenants = $this->repository->search($request->filter);
        return view('admin.pages.tenants.index', compact('filters', 'tenants'));
    }
}
