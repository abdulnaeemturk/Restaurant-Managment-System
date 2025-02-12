<?php namespace App\RepositoryInterfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
/**
 * Main or Base Repository Interface to make repository abstract
 * these are the abstrat of main or base class methods which are inherited in all of the other classes
 */
interface BaseRepositoryInterface
{
    /**
    * @param $query (Model)
    * @param array $sort
    * @return ?Model
    */
    public function setSort($query, array $sort = []);
    /**
    * @param array $columns
    * @param array $relations
    * @return collections
    */
    public function all(array $columns = ['*'], array $relations = [],array $orderBy = []): Collection;
    /**
    * @param $data array
    * @return Illuminate\Database\Eloquent\Model
    */
    public function create(array $data): Model;

    /**
    * @param 1. data array 2. record id
    * @return Bolean (true/false)
    */
    public function update(array $data, $id): Model;

    /**
    * @param $id (record id)
    * @return boolean
    */
    public function delete($id);
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
    ): ?Model;
    /**
    * @param null
    * @return model
    */
    public function getModel();
     /**
    * @param model
    * @return $this
    */
    public function setModel(Model $model);
    /**
    * @param relation names,$id
    * @return models with relations
    */
    public function with($relations,$id);
    /**
    * @param null
    * @return attributes (model attributes)
    */
    public function fillables();
    /**
     * insert batch data
     * @param: $data Array
     * @return: Mix 
     */
    public function batchInsert($data = array());

    /**
    * @param $column
    * @param array $values
    * @param array $relations
    * @param array $columns
    * @param array $relations
    * @return collections
    */
    public function getRecordsByColumn(
        $column = 'NA',
        array $values = [],
        array $conditions = [],
        array $columns = ['*'], 
        array $relations = [], 
        array $orderBy = [], 
        array $groupBy = [], 
        array $rawCondition = [],
        array $whereHas = []): Collection;
    
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
    public function deleteData($field_name,$field_value): bool;

    
    /**
    * @param $column
    * @param array $values
    * @param array $conditions [['field','=','value'],['field2','=','value2']]
    * @param array $relations
    * @param array $columns
    * @param array $per_page (default 10)
    * @param string $pageName
    * @param integer $page
    * @return \Illuminate\Pagination\Paginator 
    */
    public function getRecordsByColumnWithPagination($column,array $values = [],
                            array $conditions = [],array $columns = ['*'], array $relations = [],$per_page = 10, $pageName, $page);

    /**
     * @summary filter model
     * @param array $columns
     * @param array $orderBy
     * @param array $conditions [['field','=','value'],['field2','=','value2']]
     * @param array $relations
     */
    public function filter(array $columns = ['*'], array $conditions = [], array $relations = [], array $orderBy = []);

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

    public function fetchRecordsBetweenByPagination(array $columns = ['*'], 
        array $conditions = [],
        string $date_between_condition_column_name = "", 
        string $start_date = "", 
        string $end_date = "" ,
        array $relations = [],
        $per_page = 10, 
        $pageName , 
        $page);
        

    /**
     * check record exist based on condition
     */
    public function isExist(array $conditions = []);

    /**
     * Get Pdf object
     */

    public function getPdfObject();

}