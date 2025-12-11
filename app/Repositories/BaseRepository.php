<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\RepositoryInterfaces\BaseRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


/**
 * Main or Base Repository method definations
 * these are the methods of main or base class methods which are inherited in all of the other classes and used as based functionality in all other classes
 */

class BaseRepository implements BaseRepositoryInterface
{
    // model property on class instances
    protected $model;

    /**
     * @desc: injecting model to base repository
     * @param eloquent $model
     * 
     * here we assign model of a table with respoect to the the assinged model
     */

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
    * @param null
    * @return collections
    * this method will return all records from the model requested with order of latest LCFS (last come first serve algorithm)
    */
    public function all(array $columns = ['*'], array $relations = [],array $orderBy = []): Collection
    {
        $result = "";
        $query =  $this->model->with($relations);
        if(is_array($orderBy) && count($orderBy)>0)
            $query = $this->setSort($query,$orderBy);
        $result = $query->get($columns);
        return $result;
    }

    /**
    * @param $data array
    * @return model
    */
    public function create(array $data): Model
    {
        $model = $this->model->create($data);
        return $model->fresh();
    }

    /**
    * @param 1. data array 2. record id
    * @return Model
    */
    public function update(array $data, $id): Model
    {
        $record = $this->model->find($id);
        $record->update($data);
        return $record; 
    }

    /**
    * @param $id (record id)
    * @return boolean
    */
    public function delete($id): bool
    {
        return $this->model->destroy($id);
    }

    /**
    * @param record $id
    * @param array $columns
    * @param array $relations
    * @param: array $appends
    * @return Model
    */
    public function show(
        $id,
        array $columns = ['*'],
        array $relations = []
    ): ?Model
    {
        return $this->model->select($columns)->with($relations)->find($id);
    }

    /**
    * @param null
    * @return model
    */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
    * @param model
    * @return $this
    */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
    * @param relation names, $id
    * @return models with relations
    */
    public function with($relations,$id): Model
    {
        return $this->model->with($relations)->find($id);
    }
    /**
    * @param null
    * @return attributes (model attributes)
    */
    public function fillables()
    {
        return $this->model->getFillables();
    }
    public function batchInsert($data = array())
    {
        return $this->model->insert($data);
    }

 /**
    * @param $column
    * @param array $values
    * @param array $conditions [['field','=','value'],['field2','=','value2']]
    * @param array $relations
    * @param array $columns
    * @param array $relations
    * @param array $order
    * @param array $rawCondition ['field 1', 'condition operation', field 2] example ["LEFT(sub_organization,3)",'=', $ministry];
    * @return collections
    * updated_at April-03-2021
    * Note added rawCondition and whereHas
    */
    public function getRecordsByColumn($column = 'NA',array $values = [],
                        array $conditions = [],array $columns = ['*'], array $relations = [], array $orderBy = [], array $groupBy = [], array $rawCondition = [], array $whereHas = []): Collection
    {
       // DB::connection()->enableQueryLog();
        $query = $this->model->select($columns);
                if($column !='NA' && count($values) > 0 )
                    $query = $query->whereIn($column,$values);
                if(is_array($conditions) && count($conditions)>0)
                    $query = $query->where($conditions);
                if(is_array($orderBy) && count($orderBy)>0)
                    $query = $this->setSort($query,$orderBy);
                if(is_array($groupBy) && count($groupBy)>0)
                    $query = $query->groupBy($groupBy);
                if(is_array($rawCondition) && count($rawCondition)>0 )
                    $query = $query->where(DB::raw($rawCondition[0]),$rawCondition[1],$rawCondition[2]);
                if(is_array($whereHas) && count($whereHas)> 0)
                    $query = $query->whereHas($whereHas[0],$whereHas[1]);

                    $query = $query->with($relations)->get();

                    //dd(DB::getQueryLog());
                return $query;
    }

    /**
    * @summary: delete all data of a table by the given field name and value
    * @param: $field_name
    * @param: $field_value ($id)
    * @return: boolean (true/false)
    * @author: Gulzade
    * @date February 1 2021
    * @last_updated_By 
    * @last_updated_Date
    */  
    public function deleteData($field_name,$field_value): bool
    {
        return $this->model->where($field_name,$field_value)->delete();
    }

    /**
    * @param $column
    * @param array $values
    * @param array $conditions [['field','=','value'],['field2','=','value2']]
    * @param array $relations
    * @param array $columns
    * @param array $relations
    * @param array $per_page (default 10)
    * @param string $pageName
    * @param integer $page
    * @return \Illuminate\Pagination\Paginator 
    */

    public function getRecordsByColumnWithPagination($column,array $values = [],
                            array $conditions = [],array $columns = ['*'], array $relations = [],$per_page = 10, $pageName , $page)
    {
        // DB::connection()->enableQueryLog();
        $query = $this->model;//->whereIn($column,$values);
        
                if(is_string($column) && $column !== '')
                $query = $query->whereIn($column,$values);

                if(is_array($conditions) && count($conditions)>0)
                    $query = $query->where($conditions);
            $query = $query->with($relations)->paginate($per_page,$columns,$pageName , $page);     
        // dd(DB::getQueryLog());
        return $query;
    }

    /**
     * @summary filter model
     * @param array $columns
     * @param array $conditions [['field','=','value'],['field2','=','value2']]
     * @param array $relations
     * @param array $orderby
     */
    public function filter(array $columns = ['*'], array $conditions = [], array $relations = [], array $orderBy = []) {
         //DB::connection()->enableQueryLog();
       $query = $this->model->select($columns);
        if(is_array($orderBy) && count($orderBy)>0)
            $query = $this->setSort($query,$orderBy);

        if(is_array($conditions) && count($conditions)>0)
            $query = $query->where($conditions);

        $query = $query->with($relations)->get();
         //dd(DB::getQueryLog());
        return $query;
    }

   
        /**
        * @param array $columns
        * @param array $conditions [['field','=','value'],['field2','=','value2']]
        * @param string $date_between_condition_column_name ('created_at')
        * @param string $start_date ("2024-08-15 00:00:00")
        * @param string $end_date ("2024-08-15 23:59:59")
        * @param array $relations
        * @param array $per_page (default 10)
        * @param string $pageName
        * @param integer $page
        * @return \Illuminate\Pagination\Paginator 
        */

    public function fetchRecordsBetweenByPagination(
        array $columns = ['*'],
        array $conditions = [], 
        string $date_between_condition_column_name = "", 
        string $start_date = "", 
        string $end_date = "" , 
        array $relations = [],
        $per_page = 10, 
        $pageName , 
        $page)
    {
        // DB::connection()->enableQueryLog();
        $query = $this->model;
        
        if(is_array($conditions) && count($conditions)>0)
        $query = $query->where($conditions);

        if(strlen($date_between_condition_column_name)>0)
        $query = $query->whereBetween($date_between_condition_column_name,[ $start_date, $end_date]);

        $query = $query->with($relations)->paginate($per_page,$columns,$pageName , $page);     
        // dd(DB::getQueryLog());
        return $query;
    }


    public function isExist(array $conditions = []) {
        $query = $this->model->where($conditions);

        return $query->firstOrFail();
        //return $query->exists();
    }

    public function getPdfObject() {
        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 10,
            'margin_header' => 10,
            'margin_footer' => 10,
            'mode'         => 'utf-8',
            'format'       => 'A4-L',
            //'default_font' => 'xbriyaz',
            'orientation' => 'L',

        ]);
        $mpdf->autoScriptToLang = true;
        $mpdf->baseScript = 1;
        $mpdf->autoVietnamese = true;
        $mpdf->autoArabic = true;
        $mpdf->autoLangToFont = true;
        $mpdf->defaultfooterline = 0;

        return $mpdf;
    }


    /**
    * @param $query (Model)
    * @param array $sort
    * @return ?Model
    */
    public function setSort($query, array $sort = [])
    {
        foreach ($sort as $column => $direction) {
            $query->orderBy($column, $direction);
        }
        return $query;
    }
    
}