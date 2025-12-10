<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RepositoryInterfaces\RestaurantOrderRepositoryInterface;
use App\RepositoryInterfaces\RestaurantTableRepositoryInterface;
use App\RepositoryInterfaces\RestaurantFoodRepositoryInterface;
use App\RepositoryInterfaces\Setting\RestaurantFoodCategoryRepositoryInterface;

class RestaurantOrderController extends Controller
{
    protected $orderrepository;
    protected $restaurantfoodcategoryrepository;
    protected $restauranttablerepository;
    protected $restaurantfoodrepository;
    protected $perpage;
    public $mainTitle;
    public $pageTitle;

    public function __construct(RestaurantOrderRepositoryInterface $orderrepository, 
    RestaurantFoodCategoryRepositoryInterface $restaurantfoodcategoryrepository, 
    RestaurantTableRepositoryInterface $restauranttablerepository, 
    RestaurantFoodRepositoryInterface $restaurantfoodrepository)
    {
        $this->orderrepository = $orderrepository;
        $this->restaurantfoodcategoryrepository = $restaurantfoodcategoryrepository;
        $this->restauranttablerepository = $restauranttablerepository;
        $this->restaurantfoodrepository = $restaurantfoodrepository;
        $this->perpage = 2;
        $this->mainTitle = 'Order';
        $this->pageTitle = 'Information';
    }
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $relations_category = [];
        $orderBy_category = array('name'=>'ASC');

        $columns = ['*'];
        $relations = ['table.location'];
        $orderBy = array('status'=>'DESC');
        $conditions = [['status','=',0]];
        $data = $this->orderrepository->filter(['*'], $conditions, $relations);
        $table = $this->restauranttablerepository->all($columns , ['location']);
        $food = $this->restaurantfoodrepository->all($columns , ['foodDetail']);

        $category = $this->restaurantfoodcategoryrepository->all($columns , $relations_category,$orderBy_category);

        return view('admin.order.index',[
            'data' => $data,
            'category' => $category,
            'table' => $table,
            'food' => $food,
            'mainTitle'=>$this->mainTitle,
            'pageTitle'=>$this->pageTitle,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource/record in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only($this->orderrepository->fillables());
        $result = $this->orderrepository->create($data);
        return $result;

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $result = $this->orderrepository->show($id);
        return $result;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // return response()->json($request);
        $data = $request->only($this->orderrepository->fillables());        
        $result = $this->orderrepository->update($data, $id);
        return response()->json("Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $result = $this->orderrepository->delete($id);
        return response()->json("Deleted");
    }

    public function fetchRecords($per_page = 10, $pagenumber =1 , $fulltableorrecords = 0)
    {
       
        $conditions = [['status', '=', 0]];
        $columns = ['*'];
        $relations = ['table.location'];;//['Organization','Structure','User'];

        $data = $this->orderrepository->getRecordsByColumnWithPagination("",[],$conditions,$columns,$relations,$per_page, 'page', $pagenumber);
        if (!$data) {
            $result = ['status' => 404,
                       'error'  => 'Post Not Found'
                    ];  
            return $this->errorResponse($result['error'],$result['status']); 
        }
        return response()->json(view('admin.order.partials.table',[
            'data' => $data
        ])->render());
               
    }

    // print Order Slip
    public function printOrder($id)
    {
        $columns = ['*'];
        $relations = ['table.location', 'orderDetail.food'];
        $orderBy = array('status'=>'DESC');
        $data = $this->orderrepository->show($id, $columns , $relations);
        // return $data;
        return view('admin.order.partials.printorder',[
            'data' => $data
        ]);
    }

    public function paid($id)
    {
        $order = $this->restaurantorderrepository->show($id);
        $data['status'] = $order->status+1;
        $result = $this->restaurantorderrepository->update($data, $id);
        return  response()->json("successfull");
    }

}
