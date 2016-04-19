<?php

  class Staff {

    public function __construct() {
   //   $this->id      = $id;
    }

    public static function all() {
      //get all the staff 

      $list = [];
      $db = Db::getInstance();

      $req = $db->query('SELECT * FROM staff');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $staff) {

        $data['id'] = $staff['ID'];
        $data['name'] = $staff['Firstname'].' '.$staff['Surname'];
        $data['title'] = $staff['Title'];
        $data['parentID'] = $staff['ParentID'];
        $data['base'] = $staff['baseID'];//should change name in database

        array_push($list,$data);
      }

      return $list;
    }

    public static function update($postdata = NULL) {
      //update staff table with new position

      $list = [];
      $db = Db::getInstance();

      $userId = str_replace("parentID_", "", $postdata['userId']);//get the User ID
      $targetId = str_replace("contentID_", "", $postdata['targetId']);//get the Target ID

      if($userId !=NULL && $targetId !=NULL){

        // Make a safe query
        $query = sprintf("UPDATE `staff` SET `ParentID` = '%d' 
               WHERE `ID` = '%d'",
               $targetId,
              $userId);


        //update staff DB
        $req = $db->query($query );

        return   array("sucess"=>true) ;

      }else return array("sucess"=>false) ;
    }


  }
?>