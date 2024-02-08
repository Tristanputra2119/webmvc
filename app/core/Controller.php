<?php
    class Controller{
        //setup views
        public function view($view, $data=[]){
            require_once '../app/views/' .$view. '.php';
        }

    public function model($model){
         //model setup
        require_once '../app/models/' .$model. '.php';
        return new $model;
        
    }
    }
    