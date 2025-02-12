<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RepositoryInterfaces\RestaurantFoodDetailRepositoryInterface;
use App\RepositoryInterfaces\RestaurantFoodRepositoryInterface;


use App\Models\Attachable;

class RestaurantFoodDetailController extends Controller
{
    protected $restaurantfoodrepository;
    protected $restaurantfooddetailrepository;
    protected $perpage;
    public $mainTitle;
    public $pageTitle;

    public function __construct(RestaurantFoodDetailRepositoryInterface $restaurantfooddetailrepository, RestaurantFoodRepositoryInterface $restaurantfoodrepository)
    {
        $this->restaurantfoodrepository = $restaurantfoodrepository;
        $this->restaurantfooddetailrepository = $restaurantfooddetailrepository;
        $this->perpage = 2;
        $this->mainTitle = 'Food Detail';
        $this->pageTitle = 'Information';
    }
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $columns = ['*'];
        $relations = [];
        $orderBy = array('name'=>'ASC');
        $food = $this->restaurantfoodrepository->show($id, $columns);
        $data = $this->restaurantfooddetailrepository->getRecordsByColumn('',[],[['food_id','=', $id]],['*'], []);
        // return $data;
        return view('admin.fooddetail.index',[
            'data' => $data,
            'mainTitle'=>$this->mainTitle,
            'pageTitle'=>$this->pageTitle,
            'food_id'=>$id,
            'food'=>$food,
        ]);
        //
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
        $data = $request->only($this->restaurantfooddetailrepository->fillables());
        $result = $this->restaurantfooddetailrepository->create($data);
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
        $result = $this->restaurantfooddetailrepository->show($id);
        return $result;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // return response()->json($request);
        $data = $request->only($this->restaurantfooddetailrepository->fillables());        
        $result = $this->restaurantfooddetailrepository->update($data, $id);
        return response()->json("Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $result = $this->restaurantfooddetailrepository->delete($id);
        return response()->json("Deleted");
    }


    public function fetchRecords($food_id, $per_page = 10, $pagenumber =1 , $fulltableorrecords = 0)
    {
        $conditions = [['food_id', '=', $food_id]];
        $columns = ['*'];
        $relations = [];//['Organization','Structure','User'];

        $data = $this->restaurantfooddetailrepository->getRecordsByColumnWithPagination("",[],$conditions,$columns,$relations,$per_page, 'page', $pagenumber);
        if (!$data) {
            $result = ['status' => 404,
                       'error'  => 'Post Not Found'
                    ];  
            return $this->errorResponse($result['error'],$result['status']); 
        }
        return response()->json(view('admin.fooddetail.partials.fooddetail',[
            'data' => $data
        ])->render());
               
    }


    // start of image upload functionality
    public function uploadImage(Request $request)
    {
        if ($request->hasfile('image')) {
            $document = $request->file('image');
            $extension = $document->getRealPath();
            $filename = $document->getClientOriginalName();
            $orignalextension = $document->getClientOriginalExtension();
            $size = $document->getSize();
            $type = $document->getMimeType();
            $user_id = "1";

            $columns = ['*'];
            $relations = [];
            $result = $this->restaurantfoodrepository->show($request['attachable_id'], $columns, $relations);
            // return $result;
            $newfilename = date('YmdHis')."-".$user_id."-".$result->name;
            $destinationpath = public_path('uploads/'.$result->name."/");
            $document->move($destinationpath, $newfilename.".".$orignalextension);

            $sizeKB = number_format($size / 1024, 2);
            $attach = new Attachable;

            $result->attachable()->attach($attach, 
                                                    [
                                                    'name' => "uploads/".$result->name."/".$newfilename.".".$orignalextension,
                                                    'datatype' => $type,
                                                    'datasizeKB' => $sizeKB
                                                    ]);
            
          
            return response()->json([
                "extension"=>$extension,
                "orignalextension"=>$orignalextension,
                "filename"=>$filename,
                "newfilename"=>$newfilename,
                "size"=>$size,
                "type"=>$type,
            ]);
        }


        dd("Comming here");//$data = $this->restaurantfoodrepository->show($id);
    }

}
