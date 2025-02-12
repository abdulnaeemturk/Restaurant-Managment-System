<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RepositoryInterfaces\Setting\RestaurantFoodCategoryRepositoryInterface;

class RestaurantFoodCategoryController extends Controller
{
    protected $restaurantfoodcategoryrepository;
    protected $perpage;
    public $mainTitle;
    public $pageTitle;

    public function __construct(RestaurantFoodCategoryRepositoryInterface $restaurantfoodcategoryrepository)
    {
        $this->restaurantfoodcategoryrepository = $restaurantfoodcategoryrepository;
        $this->perpage = 2;
        $this->mainTitle = 'Setting';
        $this->pageTitle = 'Food Category';
    }
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $columns = ['*'];
        $relations = [];
        $orderBy = array('name'=>'ASC');
        $data = $this->restaurantfoodcategoryrepository->all($columns , $relations,$orderBy);
        return view('admin.setting.foodcategory.index',[
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
        $data = $request->only($this->restaurantfoodcategoryrepository->fillables());
        $result = $this->restaurantfoodcategoryrepository->create($data);
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
        $result = $this->restaurantfoodcategoryrepository->show($id);
        return $result;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // return response()->json($request);
        $data = $request->only($this->restaurantfoodcategoryrepository->fillables());        
        $result = $this->restaurantfoodcategoryrepository->update($data, $id);
        return response()->json("Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $result = $this->restaurantfoodcategoryrepository->delete($id);
        return response()->json("Deleted");
    }

    public function fetchRecords($per_page = 50, $pagenumber =1 , $fulltableorrecords = 0)
    {
        $conditions = [];
        $columns = ['*'];
        $relations = [];//['Organization','Structure','User'];

        $data = $this->restaurantfoodcategoryrepository->getRecordsByColumnWithPagination("",[],$conditions,$columns,$relations,$per_page, 'page', $pagenumber);
        if (!$data) {
            $result = ['status' => 404,
                       'error'  => 'Post Not Found'
                    ];  
            return $this->errorResponse($result['error'],$result['status']); 
        }
        return response()->json(view('admin.setting.foodcategory.partials.table',[
            'data' => $data
        ])->render());
               
    }

}
