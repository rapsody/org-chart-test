<?php

  class Staff {

    public static $list = array();

    public function __construct() {

    }

    public static function all() {
      //get all the staff 

      $temp = [];
      $db = Db::getInstance();

      $req = $db->query('SELECT * FROM staff ORDER BY ParentID ASC');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $staff) {

        $data['id'] = $staff['ID'];
        $data['name'] = $staff['Firstname'].' '.$staff['Surname'];
        $data['title'] = $staff['Title'];
        $data['parentID'] = $staff['ParentID'];
        $data['base'] = $staff['baseID'];

        array_push($temp,$data);
      }

      self::reorderOrg($temp );

      return self::$list;
    }

    public static function update($postdata = NULL) {
      //update staff table with new position

      $list = [];
      $db = Db::getInstance();

      $userId = str_replace("parentID_", "", $postdata['userId']);//get the User ID
      $targetId = str_replace("contentID_", "", $postdata['targetId']);//get the Target ID

      if($userId !=NULL && $targetId !=NULL){

        $query = sprintf("SELECT * FROM staff  WHERE `ID` = '%d'", $userId);

        $req = $db->query( $query); //make sure its not the base user
        
        foreach($req->fetchAll() as $staff) { $base = $staff['baseID']; }

        if($base !=1){

          $query = sprintf("UPDATE `staff` SET `ParentID` = '%d' 
                 WHERE `ID` = '%d'",
                 $targetId,
                $userId);

          //update staff DB
          $req = $db->query($query );
        }
        return   array("sucess"=>true) ;

      }else return array("sucess"=>false) ;

    }

    private static function reorderOrg($array, $parent = 0, $depth = 0){
          //reorganise org 

        if($depth > count($array)) return ''; // just in case error occurs

        for($i=0, $ni=count($array); $i < $ni; $i++){
            //check if parent ID same as ID
            if($array[$i]['parentID'] == $parent){
       
                array_push(self::$list ,$array[$i]);

                self::reorderOrg($array, $array[$i]['id'], $depth+1);

            }
        }

        return $list;
      }

  }
?>