<?php

namespace App\Http\Controllers;

use App\Models\AccountingPlan;
use Illuminate\Http\Request;

class AccountingPlanController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/accounting-plans",
     *     summary="Show AccountingPlan",
     *     tags={"AccountingPlan"},
     *     @OA\Parameter(
     *       name="paginate",
     *       in="query",
     *       description="paginate",
     *       required=false,
     *       @OA\Schema(
     *           title="Paginate",
     *           example="true",
     *           type="boolean",
     *           description="The Paginate data"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="sortField",
     *       in="query",
     *       description="AccountingPlan resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="id",
     *           description="The unique identifier of a AccountingPlan resource"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="sortOrder",
     *       in="query",
     *       description="AccountingPlan resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="desc",
     *           description="The unique identifier of a AccountingPlan resource"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="perPage",
     *       in="query",
     *       description="Sort order field",
     *       @OA\Schema(
     *           title="perPage",
     *           type="number",
     *           default="10",
     *           description="The unique identifier of a AccountingPlan resource"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataSearch",
     *       in="query",
     *       description="AccountingPlan resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="Search data"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataFilter",
     *       in="query",
     *       description="AccountingPlan resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="The unique identifier of a AccountingPlan resource"
     *       )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Show AccountingPlan all."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="error."
     *     )
     *  )
    */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $accountingPlans = AccountingPlan::filters($request->all())->search($request->all());
        return response()->json($accountingPlans, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccountingPlan  $accountingPlan
     * @return \Illuminate\Http\Response
     */
    public function show(AccountingPlan $accountingPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccountingPlan  $accountingPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountingPlan $accountingPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountingPlan  $accountingPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountingPlan $accountingPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountingPlan  $accountingPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountingPlan $accountingPlan)
    {
        //
    }
}
