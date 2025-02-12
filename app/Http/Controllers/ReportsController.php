<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\RepositoryInterfaces\RestaurantOrderRepositoryInterface;

class ReportsController extends Controller
{
    protected $orderrepository;
    protected $perpage;
    public $mainTitle;
    public $pageTitle;

    public function __construct(RestaurantOrderRepositoryInterface $orderrepository)
    {
        $this->orderrepository = $orderrepository;
        $this->perpage = 2;
        $this->mainTitle = 'Reports';
        $this->pageTitle = 'Information';
    }

    public function index()
    {
        
        $this->pageTitle = 'Dashboard';
        return view('admin.reports.dashboard',[
            'mainTitle'=>$this->mainTitle,
            'pageTitle'=>$this->pageTitle,
        ]);

    }

    //this function is used to fetched the completed orders from in between two dates
    public function completedOrder($_start_date = 'start', $_end_date = 'end', $per_page = 10, $pagenumber =1 , $fulltableorrecords = 0)
    {
        
        $columns = ['*'];
        $conditions = [['status','=',3]]; //status 3 is completed orders
        $date_between_condition_column_name = "created_at";
        // $start_date = "".Carbon::now()->format('Y-m-d')." 00:00:00";
        // $end_date_date = "".Carbon::now()->format('Y-m-d')." 23:59:59";
       
        if (strtotime($_start_date) == false)
        {
            return "Please Select date";
        }

        if (strtotime($_end_date) == false)
        {
            return "Please Select date";
        }

        $_start_date .= " 00:00:00";
        $_end_date .= " 23:59:59";

        // return response()->json([
        //     'start_date'=>$_start_date,
        //     'end_date_date'=>$_end_date,
        // ]);
        $relations = ['table.location', 'orderDetail'];


       $data =  $this->orderrepository->fetchRecordsBetweenByPagination(
            $columns, 
            $conditions, 
            $date_between_condition_column_name, 
            $_start_date, 
            $_end_date, 
            $relations ,$per_page, 'page', $pagenumber
        );

        if (!$data) {
            $result = ['status' => 404,
                       'error'  => 'Post Not Found'
                    ];  
            return $this->errorResponse($result['error'],$result['status']); 
        }
        return response()->json(view('admin.reports.partials.completedorders',[
            'data' => $data, 
            'mainTitle'=>"Completed Order",
            'pageTitle'=>$this->pageTitle,
        ])->render());

      

    }
}
