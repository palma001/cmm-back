<?php

namespace App\Http\Controllers;

use App\Helpers\RoleAcronym;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      * @OA\Get(
      *     path="/orders",
      *     operationId="getOrder",
      *     tags={"Order"},
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
      *       name="sortBy",
      *       in="query",
      *       description="turno resource name",
      *       required=false,
      *       @OA\Schema(
      *           type="string",
      *           example="id",
      *           description="The unique identifier of a turno resource"
      *       )
      *     ),
      *     @OA\Parameter(
      *       name="sortOrder",
      *       in="query",
      *       description="turno resource name",
      *       required=false,
      *       @OA\Schema(
      *           type="string",
      *           example="desc",
      *           description="The unique identifier of a turno resource"
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
      *           description="The unique identifier of a curso resource"
      *       )
      *      ),
      *     @OA\Parameter(
      *       name="dataSearch",
      *       in="query",
      *       description="turno resource name",
      *       required=false,
      *       @OA\Schema(
      *           type="string",
      *           description="Search data"
      *       )
      *      ),
      *     @OA\Parameter(
      *       name="dataFilter",
      *       in="query",
      *       description="turno resource name",
      *       required=false,
      *       @OA\Schema(
      *           type="string",
      *           description="The unique identifier of a turno resource"
      *       )
      *     ),
      *     @OA\Response(
      *         response=200,
      *         description="Show Orders all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
      */
    public function index(Request $request)
    {
        $orders = Order::filters($request->all())->search($request->all());
        return response()->json($orders, 200);
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
      * @param  \App\Http\Requests\StoreOrderRequest  $request
      * @return \Illuminate\Http\Response
      * @OA\Post(
      *   path="/orders",
      *   summary="Creates a new Order",
      *   description="Creates a new Order",
      *   tags={"Order"},
      *   security={{"passport": {"*"}}},
      *   @OA\RequestBody(
      *       @OA\MediaType(
      *           mediaType="application/json",
      *           @OA\Schema(ref="#/components/schemas/Order")
      *       )
      *   ),
      *   @OA\Response(
      *       @OA\MediaType(mediaType="application/json"),
      *       response=200,
      *       description="The Order resource created",
      *   ),
      *   @OA\Response(
      *       @OA\MediaType(mediaType="application/json"),
      *       response=401,
      *       description="Unauthenticated."
      *   ),
      *   @OA\Response(
      *       @OA\MediaType(mediaType="application/json"),
      *       response="default",
      *       description="an ""unexpected"" error",
      *   )
      * )
     */
    public function store(StoreOrderRequest $request)
    {
        $responsable = new Order();
        $responsable->organization_id = $request->organization_id;
        $responsable->egress_type_id = $request->egress_type_id;
        $responsable->field_id = $request->field_id;
        $responsable->beneficiary_id = $request->beneficiary_id;
        $responsable->responsable_id = $request->responsable_id;
        $responsable->contract = $request->contract;
        $responsable->user_created_id = $request->user_created_id;
        $responsable->save();
        return response()->json($responsable, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $responsable
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *   path="/orders/{id}",
     *   operationId="getOrderById",
     *   tags={"Order"},
     *   summary="Get Order information",
     *   description="Returns Order data",
     *   @OA\Parameter(
     *      name="id",
     *      description="Order id",
     *      required=true,
     *      in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Order")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *   )
     */
    public function show(Order $responsable)
    {
        return response($responsable, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $responsable
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $responsable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $responsable
     * @return \Illuminate\Http\Response
     * @OA\Put(
     *  path="/orders/{id}",
     *  operationId="updateOrder",
     *  tags={"Order"},
     *  summary="Update existing Order",
     *  description="Returns updated Order data",
     *  @OA\Parameter(
     *      name="id",
     *      description="Order id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Order")
     *   ),
     *   @OA\Response(
     *      response=202,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/Order")
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauthenticated",
     *   ),
     *   @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="Resource Not Found"
     *   )
     * )
     */
    public function update(UpdateOrderRequest $request, Order $responsable)
    {
        $responsable->organization_id = $request->organization_id;
        $responsable->egress_type_id = $request->egress_type_id;
        $responsable->field_id = $request->field_id;
        $responsable->beneficiary_id = $request->beneficiary_id;
        $responsable->responsable_id = $request->responsable_id;
        $responsable->contract = $request->contract;
        $responsable->user_created_id = $request->user_created_id;
        $responsable->update();
        return response()->json($responsable, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $responsable
     * @return \Illuminate\Http\Response
     * @OA\Delete(
     *  path="/orders/{id}",
     *  operationId="deleteOrder",
     *  tags={"Order"},
     *  summary="Delete existing Order",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="Order id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\Response(
     *      response=204,
     *      description="Successful operation",
     *      @OA\JsonContent()
     *  ),
     *  @OA\Response(
     *      response=401,
     *      description="Unauthenticated",
     *  ),
     *  @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Resource Not Found"
     *  )
     * )
     */
    public function destroy(Order $responsable)
    {
        $responsable->delete();
        return response('the data was deleted successfully', 200);
    }
}
