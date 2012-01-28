<?php
namespace vespora\models;
use hydrogen\model\Model;
use hydrogen\database\Query;
use vespora\models\sqlBeans\TypeBean;
use vespora\models\sqlBeans\TypeAvailableStatsBean;
use vespora\models\sqlBeans\TypeAvailableSkillsBean;

class TypeModel extends Model
{
    protected static $modelID = "type";

    /**
     * @param $id ID of the Type
     * @return bool Returns false, or the type with the passed ID
     */
    public function getType($id){
        $query = new Query ( "SELECT" );
        $query->where ( "id = ?", $id );
        $type = TypeBean::select ( $query );
        if (! $type) {
            return false;
        }
        return $type[0];
    }

    /**
     * Gets all the types currently stored.
     * @return array|bool
     */
    public function getTypeList(){
        $query = new Query ( "SELECT" );

        $type = TypeBean::select ( $query );
        if (! $type) {
            return false;
        }
        return $type;
    }

    /**
     * Gets the available Stats for the selected type.
     * @param $id
     * @return array|bool
     */
    public function getStatList($id, $stat = false){
        $query = new Query ( "SELECT" );
        $query->where ( "type_id = ?", $id );

        if($stat)
            $query->where ( "id = ?", $stat);

        $type = TypeAvailableStatsBean::select ( $query );
        if (! $type) {
            return false;
        }
        return $type;
    }

    /**
     * Gets the available skills for the selected type.
     * @param $id
     * @return array|bool
     */
    public function getSkillList($id, $skill = false){
        $query = new Query ( "SELECT" );
        $query->where ( "type_id = ?", $id );
        if($skill)
            $query->where ( "id = ?", $skill);

        $type = TypeAvailableSkillsBean::select ( $query );
        if (! $type) {
            return false;
        }
        return $type;
    }
}   
?>