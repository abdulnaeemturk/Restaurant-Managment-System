<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RepositoryInterfaces\Setting\RestaurantLinkTableUserRepositoryInterface;
use App\RepositoryInterfaces\UserRepositoryInterface;
use App\RepositoryInterfaces\RestaurantTableRepositoryInterface;

class RestaurantLinkTableUserController extends Controller
{
    protected $restaurantlinktableuserrepository;
    protected $userRepository;
    protected $restauranttablerepository;
    protected $perpage;
    public $mainTitle;
    public $pageTitle;

    public function __construct(
        RestaurantLinkTableUserRepositoryInterface $restaurantlinktableuserrepository,
        UserRepositoryInterface $userRepository,
        RestaurantTableRepositoryInterface $restauranttablerepository,
        )
    {
        $this->restaurantlinktableuserrepository = $restaurantlinktableuserrepository;
        $this->userRepository = $userRepository;
        $this->restauranttablerepository = $restauranttablerepository;
        $this->perpage = 2;
        $this->mainTitle = 'Setting';
        $this->pageTitle = 'Link';
    }
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $columns_user = ['id', 'name', 'email'];
        $columns = ['*'];
        $relations = [];
        $orderBy = array('id'=>'DESC');
        $relations_data = ['table','user'];

        $users = $this->userRepository->all($columns_user , $relations);
        $tables = $this->restauranttablerepository->all($columns , $relations);
        $data = $this->restaurantlinktableuserrepository->all($columns , $relations_data,$orderBy);

        return view('admin.setting.linktableuser.index',[
            'data' => $data,
            'users'=> $users,
            'tables'=> $tables,
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
        $data = $request->only($this->restaurantlinktableuserrepository->fillables());
        $result = $this->restaurantlinktableuserrepository->create($data);
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
        $result = $this->restaurantlinktableuserrepository->show($id);
        return $result;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // return response()->json($request);
        $data = $request->only($this->restaurantlinktableuserrepository->fillables());        
        $result = $this->restaurantlinktableuserrepository->update($data, $id);
        return response()->json("Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $result = $this->restaurantlinktableuserrepository->delete($id);
        return response()->json("Deleted");
    }

    public function fetchRecords($per_page = 10, $pagenumber =1 , $fulltableorrecords = 0)
    {
        $conditions = [];
        $columns = ['*'];
        $relations = ['table','user'];//['Organization','Structure','User'];

        $data = $this->restaurantlinktableuserrepository->getRecordsByColumnWithPagination("",[],$conditions,$columns,$relations,$per_page, 'page', $pagenumber);
        if (!$data) {
            $result = ['status' => 404,
                       'error'  => 'Post Not Found'
                    ];  
            return $this->errorResponse($result['error'],$result['status']); 
        }
        return response()->json(view('admin.setting.linktableuser.partials.table',[
            'data' => $data
        ])->render());
               
    }

}
