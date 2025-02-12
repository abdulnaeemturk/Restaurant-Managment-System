<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RepositoryInterfaces\RestaurantOrderDetailRepositoryInterface;
use App\RepositoryInterfaces\RestaurantOrderRepositoryInterface;

class RestaurantOrderDetailController extends Controller
{
    protected $restaurantorderdetailrepository;
    protected $restaurantorderrepository;
    protected $perpage;
    public $mainTitle;
    public $pageTitle;

    public function __construct(RestaurantOrderDetailRepositoryInterface $restaurantorderdetailrepository, 
    RestaurantOrderRepositoryInterface $restaurantorderrepository)
    {
        $this->restaurantorderdetailrepository = $restaurantorderdetailrepository;
        $this->restaurantorderrepository = $restaurantorderrepository;
        $this->perpage = 2;
        $this->mainTitle = 'Order Detail';
        $this->pageTitle = 'Information';
    }
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        $columns = ['*'];
        $relations = ['orderDetail.food.foodDetail','orderDetail.food.attachment', 'table.location'];
        $data = $this->restaurantorderrepository->show($id, $columns, $relations);
        // return $data;
        return view('admin.order.partials.orderdetail',[
            'data' => $data,
            'mainTitle'=>$this->mainTitle,
            'pageTitle'=>$this->pageTitle,
        ]);
    }

   
    public function addFoodToOrder($food_id, $order_id)
    {
        $result = "";
        $data = $this->restaurantorderdetailrepository->getRecordsByColumn('',[],[['food_id','=', $food_id],['order_id','=', $order_id]],['*'], []);
        // return $data;
        if(count($data) == 0)
        {
            $fillables['food_id']=$food_id;
            $fillables['order_id']=$order_id;
            $fillables['piece']=1;
            $result = $this->restaurantorderdetailrepository->create($fillables);
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
            $this->restaurantorderdetailrepository->delete($id);
        }else{
            $result = $this->restaurantorderdetailrepository->update($data, $id);
        }
        return response()->json("Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $result = $this->restaurantorderdetailrepository->delete($id);
        return response()->json("Deleted");
    }

}
