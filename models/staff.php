<?php
  class Staff {
 //   public $id;
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
        //$list[] = new Post($post['id'], $post['author'], $post['content']);
        $data['id'] = $staff['ID'];
        $data['name'] = $staff['Firstname'].' '.$staff['Surname'];
        $data['title'] = $staff['Title'];
        $data['parentID'] = $staff['ParentID'];
        $data['base'] = $staff['baseID'];//shoudl change name in database

        array_push($list,$data);
      }

      return $list;
    }

    public static function update($postdata = NULL) {
      //update staff table with new position

      $list = [];
      $db = Db::getInstance();

       $userId = str_replace("parentID_", "", $postdata['targetId']);
      $targetId = str_replace("parentID_", "", $postdata['userId']);

      if($userId !=NULL && $userId !=NULL){

        // Make a safe query
        $query = sprintf("UPDATE `staff` SET `ParentID` = '%d' 
               WHERE `ID` = '%d'",
              $userId, 
              $targetId);

        $req = $db->query($query );

        return  true ;

      }else return json_encode("error") ;
    }


  }
?>