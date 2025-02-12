<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RepositoryInterfaces\Setting\RestaurantFoodCategoryRepositoryInterface;
use App\RepositoryInterfaces\Guest\TemporaryOrderRepositoryInterface;

use App\RepositoryInterfaces\RestaurantOrderRepositoryInterface;
use App\RepositoryInterfaces\RestaurantOrderDetailRepositoryInterface;


class GuestController extends Controller
{
    protected $restaurantfoodcategoryrepository;
    protected $temporaryorderrepository;
    protected $restaurantorderrepository;
    protected $restaurantorderdetailrepository;
    public function __construct(RestaurantFoodCategoryRepositoryInterface $restaurantfoodcategoryrepository,
    TemporaryOrderRepositoryInterface $temporaryorderrepository, 
    RestaurantOrderRepositoryInterface $restaurantorderrepository, 
    RestaurantOrderDetailRepositoryInterface $restaurantorderdetailrepository)
    {
        $this->restaurantfoodcategoryrepository = $restaurantfoodcategoryrepository;
        $this->temporaryorderrepository = $temporaryorderrepository;
        $this->restaurantorderrepository = $restaurantorderrepository;
        $this->restaurantorderdetailrepository = $restaurantorderdetailrepository;
        $this->perpage = 2;
        $this->mainTitle = 'Order';
        $this->pageTitle = 'Information';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $columns = ['*'];
        $relations_foodcategory = ['foods.foodDetail', 'foods.attachment'];
        $orderBy = array('name'=>'ASC');
        $data = $this->restaurantfoodcategoryrepository->all($columns , $relations_foodcategory,$orderBy);

        $user_id = 1;

        $conditions = [['user_id','=',$user_id], ['status','=',0]];
        $relations_order = ['food.foodDetail', 'food.attachment'];
        $orders = $this->temporaryorderrepository->filter(['*'], $conditions, $relations_order);
        //  return $orders;
        return view('customer.dashboard',[
            'data' => $data,
            'orders' => $orders,
            'mainTitle'=>$this->mainTitle,
            'pageTitle'=>$this->pageTitle,
        ]);
        //
    }

    public function addFoodToOrder($food_id)
    {
        $result = "";
        $user_id = 1;
        $data = $this->temporaryorderrepository->getRecordsByColumn('',[],[['food_id','=', $food_id],['user_id','=', $user_id], ['status','=', 0]],['*'], []);
        // return $data;
        if(count($data) == 0)
        {
            $fillables['food_id']=$food_id;
            $fillables['user_id']=$user_id;
            $fillables['status']=0;
            $fillables['piece']=1;
            $result = $this->temporaryorderrepository->create($fillables);
        }else{
            $data = $data[0];
            // return $data;
            $result = $this->increaseOrDecreseQuantity($data->id, $data->piece, 'increase');
            
        }
        return $result;
    }

    public function increaseOrDecreseQuantity($id, $piece, $increase='increase')
    {
        $data['piece'] = $piece;
        if($increase == 'increase')
        {
            $data['piece'] = $data['piece'] + 1;        
        }else{
            $data['piece'] = $data['piece'] - 1;        
        }
        if($data['piece'] == 0)
        {
            $this->temporaryorderrepository->delete($id);
        }else{
            $result = $this->temporaryorderrepository->update($data, $id);
        }
        return response()->json("Updated");
    }
   

    public function fetchFoodOrderDetail()
    {
        $user_id = 1;
        $conditions = [['user_id','=',$user_id], ['status','=',0]];
        $relations =  ['food.foodDetail', 'food.attachment'];
        $orders = $this->temporaryorderrepository->filter(['*'], $conditions,$relations);
        return view('customer.partials.myorderdetail',[
            'orders' => $orders,
        ]);
    }
    
    public function deleteIt($id)
    {
        $this->temporaryorderrepository->delete($id);
        return response()->json("successfull");
    }

    public function completeTheOrderPayment()
    {
        $user_id = 1;
        $conditions = [['user_id','=',$user_id]];
        $relations =  [];
        $temporary_order = $this->temporaryorderrepository->filter(['*'], $conditions,$relations);
        if($temporary_order->count() > 0)
        {
            $order['customer']='Selfonlineservice';
            $order['status']=1;
            $order['paid_by']='card';
            $result = $this->restaurantorderrepository->create($order);
            $order_detail = $this->pushDataToArray($temporary_order, 'order_id', $result->id);
            $deleteTemporaryOrder = $this->temporaryorderrepository->deleteData('user_id',$user_id);
            $redirectUrl = "printorder/".$result->id;
            return redirect("/".$redirectUrl);
            return 'Completed';
        }

        return 'Please Check Order Again';
    }


    private function pushDataToArray($array, $key, $value)
    {
        foreach($array as $item)
        {   
            $item[$key] = $value;
            $batch_insert = $this->restaurantorderdetailrepository->create($item->only($this->restaurantorderdetailrepository->fillables()));
        }
        return "done";
    }


}
