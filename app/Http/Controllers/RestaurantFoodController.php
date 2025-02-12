<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RepositoryInterfaces\RestaurantFoodRepositoryInterface;
use App\RepositoryInterfaces\Setting\RestaurantFoodCategoryRepositoryInterface;

use App\Models\Attachable;

class RestaurantFoodController extends Controller
{
    protected $restaurantfoodrepository;
    protected $perpage;
    public $mainTitle;
    public $pageTitle;

    public function __construct(RestaurantFoodRepositoryInterface $restaurantfoodrepository, RestaurantFoodCategoryRepositoryInterface $restaurantfoodcategoryrepository)
    {
        $this->restaurantfoodrepository = $restaurantfoodrepository;
        $this->restaurantfoodcategoryrepository = $restaurantfoodcategoryrepository;
        $this->perpage = 2;
        $this->mainTitle = 'Food';
        $this->pageTitle = 'Information';
    }
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $columns = ['*'];
        $relations = [];
        $orderBy = array('name'=>'ASC');
        $data = $this->restaurantfoodrepository->all($columns , ['category', 'foodDetail'],$orderBy);
        $foodcategory = $this->restaurantfoodcategoryrepository->all($columns , $relations,$orderBy);
        // return $data;
        return view('admin.food.index',[
            'foodcategory' => $foodcategory,
            'data' => $data,
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
        $data = $request->only($this->restaurantfoodrepository->fillables());
        $result = $this->restaurantfoodrepository->create($data);
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
        $result = $this->restaurantfoodrepository->show($id);
        return $result;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // return response()->json($request);
        $data = $request->only($this->restaurantfoodrepository->fillables());        
        $result = $this->restaurantfoodrepository->update($data, $id);
        return response()->json("Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $result = $this->restaurantfoodrepository->delete($id);
        return response()->json("Deleted");
    }

    public function fetchRecords($per_page = 10, $pagenumber =1 , $fulltableorrecords = 0)
    {
        $conditions = [];
        $columns = ['*'];
        $relations = [];//['Organization','Structure','User'];

        $data = $this->restaurantfoodrepository->getRecordsByColumnWithPagination("",[],$conditions,$columns,$relations,$per_page, 'page', $pagenumber);
        if (!$data) {
            $result = ['status' => 404,
                       'error'  => 'Post Not Found'
                    ];  
            return $this->errorResponse($result['error'],$result['status']); 
        }
        return response()->json(view('admin.food.partials.food',[
            'data' => $data
        ])->render());
               
    }



}
