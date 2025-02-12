<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RepositoryInterfaces\RestaurantTableRepositoryInterface;
use App\RepositoryInterfaces\Setting\RestaurantTableLocationRepositoryInterface;

class RestaurantTableController extends Controller
{
    protected $restauranttablerepository;
    protected $restauranttablelocationrepository;
    protected $perpage;
    public $mainTitle;
    public $pageTitle;

    public function __construct(RestaurantTableRepositoryInterface $restauranttablerepository, RestaurantTableLocationRepositoryInterface $restauranttablelocationrepository)
    {
        $this->restauranttablerepository = $restauranttablerepository;
        $this->restauranttablelocationrepository = $restauranttablelocationrepository;
        $this->perpage = 2;
        $this->mainTitle = 'Table';
        $this->pageTitle = 'Information';
    }
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $columns = ['*'];
        $relations = [];
        $orderBy = array('location_id'=>'ASC');
        $tablelocation = $this->restauranttablelocationrepository->all($columns , $relations);
        $data = $this->restauranttablerepository->all($columns , ['location'],$orderBy);
       
        return view('admin.table.index',[
            'data' => $data,
            'tablelocation' => $tablelocation,
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
        $data = $request->only($this->restauranttablerepository->fillables());
        $result = $this->restauranttablerepository->create($data);
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
        $result = $this->restauranttablerepository->show($id);
        return $result;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // return response()->json($request);
        $data = $request->only($this->restauranttablerepository->fillables());        
        $result = $this->restauranttablerepository->update($data, $id);
        return response()->json("Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $result = $this->restauranttablerepository->delete($id);
        return response()->json("Deleted");
    }

    public function fetchRecords($per_page = 10, $pagenumber =1 , $fulltableorrecords = 0)
    {
        $conditions = [];
        $columns = ['*'];
        $relations = [];//['Organization','Structure','User'];

        $data = $this->restauranttablerepository->getRecordsByColumnWithPagination("",[],$conditions,$columns,$relations,$per_page, 'page', $pagenumber);
        if (!$data) {
            $result = ['status' => 404,
                       'error'  => 'Post Not Found'
                    ];  
            return $this->errorResponse($result['error'],$result['status']); 
        }
        return response()->json(view('admin.table.partials.table',[
            'data' => $data
        ])->render());
               
    }

}
