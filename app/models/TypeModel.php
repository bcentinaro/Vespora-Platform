<?php
namespace vespora\models;
use hydrogen\model\Model;
use hydrogen\database\Query;
use vespora\models\sqlBeans\TypeBean;
use vespora\models\sqlBeans\TypeAvailableStatsBean;

class TypeModel extends Model
{
    protected static $modelID = "type";

    public function getType($id){
        $query = new Query ( "SELECT" );
        $query->where ( "id = ?", $id );
        $type = TypeBean::select ( $query );
        if (! $type) {
            return false;
        }
        return $type[0];
    }

    public function getTypeList(){
        $query = new Query ( "SELECT" );

        $type = TypeBean::select ( $query );
        if (! $type) {
            return false;
        }
        return $type;
    }

    public function getStatList($id){
        $query = new Query ( "SELECT" );
        $query->where ( "type_id = ?", $id );

        $type = TypeAvailableStatsBean::select ( $query );
        if (! $type) {
            return false;
        }
        return $type;
    }
}   
?>