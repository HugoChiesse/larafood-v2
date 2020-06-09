<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableRequest;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{

    private $repository;

    public function __construct(Table $table)
    {
        $this->repository = $table;
        $this->middleware('can:tables');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = $this->repository->latest()->paginate();
        return view('admin.pages.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Illuminate\Foundation\Http\FormRequest\TableRequest  $request
     * @return Illuminate\Foundation\Http\FormRequest\TableRequest
     */
    public function store(TableRequest $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('tables.index')->with('success', 'Identificação da mesa criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$table = $this->repository->find($id)) {
            return redirect()->back();
        }
        return view('admin.pages.tables.show', compact('table'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$table = $this->repository->find($id)) {
            return redirect()->back();
        }
        return view('admin.pages.tables.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Foundation\Http\FormRequest\TableRequest  $request
     * @param  int  $id
     * @return Illuminate\Foundation\Http\FormRequest\TableRequest
     */
    public function update(TableRequest $request, $id)
    {
        if (!$table = $this->repository->find($id)) {
            return redirect()->back();
        }
        $table->update($request->all());
        return redirect()->route('tables.index')->with('success', 'Identificação da mesa atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$table = $this->repository->find($id)) {
            return redirect()->back();
        }
        $table->delete();
        return redirect()->route('tables.index')->with('success', 'Identificação da mesa deletada com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $tables = $this->repository->search($request->filter);
        return view('admin.pages.tables.index', compact('tables'));
    }
}
