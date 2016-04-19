<?php

//namespace controllers;

//use controllers as Controller;
//use application\models as Model;

  class StaffController {

    protected $module = "staff";
    public function __construct()
    {


        require_once(MODEL_PATH.$this->module.'.php');

       // $Staff = new \model\login();
    }
    public function index() {

        // we store all the posts in a variable
        $staff = Staff::all();

        header('Content-Type: application/json');
        echo json_encode($staff);
      
    }
    
    public function update() {
        
        $response = ($_POST) ? Staff::update($_POST) :  NULL;

        header('Content-Type: application/json'); 
        echo json_encode($response);
        
    }
    public function show() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      //if (!isset($_GET['id']))
       // return call('pages', 'error');

      // we use the given id to get the right post
     // $post = Post::find($_GET['id']);

        $template = VIEW_PATH.$this->module.'.html';

        require_once(VIEW_PATH.'layout.html');

    }
  }
