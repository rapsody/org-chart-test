<?php

//namespace controllers;

//use controllers as Controller;
//use application\models as Model;

  class StaffController {

    protected $module = "staff";

    public function __construct()
    {
        //include the staff Model
        require_once(MODEL_PATH.$this->module.'.php');

       // $StaffModel = new Staff();
    }
    public function index() {

        // we store all the posts in a variable
        $staff = Staff::all();
        //$staff = $StaffModel->all();
        header('Content-Type: application/json');
        echo json_encode($staff);
      
    }
    
    public function update() {
      //update the staff data   

        $response = ($_POST) ? Staff::update($_POST) :  NULL;

        header('Content-Type: application/json'); 
        echo json_encode($response);
        
    }

    public function updateData() {
      //update the staff data   
   
        $response = ($_POST) ? Staff::updateData($_POST) :  NULL;

        header('Content-Type: application/json'); 
        echo json_encode($response);
        
    }
    public function show() {
      //show HTML template

        $template = VIEW_PATH.$this->module.'.html';

        require_once(VIEW_PATH.'layout.html');

    }
  }
