<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailPlanRequest;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    private $repository, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($urlPlan)
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }
        $details = $plan->details()->paginate();
        return view('admin.pages.plans.details.index', compact('plan', 'details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($urlPlan)
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }
        return view('admin.pages.plans.details.create', compact('urlPlan', 'plan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($urlPlan, DetailPlanRequest $request)
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }
        $plan->details()->create($request->all());
        return redirect()->route('details_plan.index', $plan->url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($urlPlan, $id)
    {
        $plan = $this->plan->where('url', 'plano-de-teste')->first();
        $detail = $this->repository->find($id);
        if (!$plan || !$detail) {
            return redirect()->back();
        }
        return view('admin.pages.plans.details.show', compact('plan', 'detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($urlPlan, $id)
    {
        $plan = $this->plan->where('url', 'plano-de-teste')->first();
        $detail = $this->repository->find($id);
        if (!$plan || !$detail) {
            return redirect()->back();
        }
        return view('admin.pages.plans.details.edit', compact('plan', 'detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DetailPlanRequest $request, $urlPlan, $id)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($id);
        if(!$plan || !$detail){
            return redirect()->back();
        }
        $detail->update($request->all());
        return redirect()->route('details_plan.index', $plan->url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($urlPlan, $id)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($id);
        if(!$plan || !$detail){
            return redirect()->back();
        }
        $detail->delete();
        return redirect()->route('details_plan.index', $plan->url)->withSuccess('Registro deletado com sucesso!');
    }
}
