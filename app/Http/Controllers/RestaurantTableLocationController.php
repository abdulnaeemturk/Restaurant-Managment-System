<?php

namespace App\Http\Controllers;

use App\Models\RestaurantTableLocation;
use Illuminate\Http\Request;

use App\RepositoryInterfaces\Setting\RestaurantTableLocationRepositoryInterface;

class RestaurantTableLocationController extends Controller
{
    protected $restauranttablelocationrepository;
    protected $perpage;
    public $mainTitle;
    public $pageTitle;

    public function __construct(RestaurantTableLocationRepositoryInterface $restauranttablelocationrepository)
    {
        $this->restauranttablelocationrepository = $restauranttablelocationrepository;
        $this->perpage = 2;
        $this->mainTitle = 'Setting';
        $this->pageTitle = 'Location';
    }
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $columns = ['*'];
        $relations = [];
        $orderBy = array('name'=>'ASC');
        $data = $this->restauranttablelocationrepository->all($columns , $relations,$orderBy);
        return view('admin.setting.tablelocation.index',[
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
        $data = $request->only($this->restauranttablelocationrepository->fillables());
        $result = $this->restauranttablelocationrepository->create($data);
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
        $result = $this->restauranttablelocationrepository->show($id);
        return $result;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // return response()->json($request);
        $data = $request->only($this->restauranttablelocationrepository->fillables());        
        $result = $this->restauranttablelocationrepository->update($data, $id);
        return response()->json("Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $result = $this->restauranttablelocationrepository->delete($id);
        return response()->json("Deleted");
    }

    public function fetchRecords($per_page = 10, $pagenumber =1 , $fulltableorrecords = 0)
    {
        $conditions = [];
        $columns = ['*'];
        $relations = [];//['Organization','Structure','User'];

        $data = $this->restauranttablelocationrepository->getRecordsByColumnWithPagination("",[],$conditions,$columns,$relations,$per_page, 'page', $pagenumber);
        if (!$data) {
            $result = ['status' => 404,
                       'error'  => 'Post Not Found'
                    ];  
            return $this->errorResponse($result['error'],$result['status']); 
        }
        return response()->json(view('admin.setting.tablelocation.partials.table',[
            'data' => $data
        ])->render());
               
    }

}
