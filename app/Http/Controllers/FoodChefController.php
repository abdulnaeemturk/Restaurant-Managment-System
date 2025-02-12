<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RepositoryInterfaces\RestaurantOrderRepositoryInterface;

class FoodChefController extends Controller
{
    protected $restaurantfoodcategoryrepository;
    protected $temporaryorderrepository;
    public function __construct(
    RestaurantOrderRepositoryInterface $restaurantorderrepository)
    {

        $this->restaurantorderrepository = $restaurantorderrepository;
        $this->perpage = 2;
        $this->mainTitle = 'FoodChef';
        $this->pageTitle = 'Information';
    }
    //
    public function index()
    {
        $columns = ['*'];
        $relations = ['table.location', 'orderDetail.food.foodDetail'];
        $orderBy = array('status'=>'DESC');
        $conditions = [['status','=',1]];
        $data = $this->restaurantorderrepository->filter(['*'], $conditions, $relations);
        // return $data;
        return view('admin.foodchef.index',[
            'data' => $data,
            'status' => 1,
            'mainTitle'=>$this->mainTitle,
            'pageTitle'=>$this->pageTitle,
        ]);
    }
    
    public function getkitchenBySatus($status = 1)
    {
        $columns = ['*'];
        $relations = ['table.location', 'orderDetail.food.foodDetail'];
        $orderBy = array('status'=>'DESC');
        $conditions = [['status','=',$status]];
        $data = $this->restaurantorderrepository->filter(['*'], $conditions, $relations);
        return response()->json(
            view('admin.foodchef.partials.table',[
            'data' => $data,
            'status' => $status
        ])->render());

    }

    public function updateOrderStatus($id)
    {
        // $status[0] = 'Pending';
        // $status[1] = 'Paid';
        // $status[2] = 'Kitchen';
        // $status[3] = 'Competed';
        $order = $this->restaurantorderrepository->show($id);
        $data['status'] = $order->status+1;
        $result = $this->restaurantorderrepository->update($data, $id);
        return  response()->json("successfull");

    }

   public function printOrder($id)
    {
        $columns = ['*'];
        $relations = ['table.location', 'orderDetail.food.foodDetail'];
        $data = $this->restaurantorderrepository->show($id, $columns, $relations);
        return view('admin.foodchef.partials.orderdetails',[
            'data' => $data,
            'status' => 1,
            'mainTitle'=>$this->mainTitle,
            'pageTitle'=>$this->pageTitle,
        ]);

    }
}
