<?php

namespace application\controllers;
use application\core\Controller;




class MainController extends Controller {

    public function indexAction() {


        $this->view->render('Главная страница');
    }

    public function aboutAction() {

        $this->view->render('Обо мне');
    }

    public function contactAction() {

        if(!empty($_POST))
        {
            if (!$this->model->contactValidate($_POST))
            {
                $this->view->message('error','error');
            }

          $transh= mail('yzwl92@gmail.com','Message from blog from',$_POST['name'].'/'.$_POST['email'].'/'.$_POST['text']);

           if  ($transh==true)
           {
               $this->view->message('success', 'this message was send to administrator');

           }else{

               $this->view->message('fail', 'this message was not send to administrator');
           }


        }

        $this->view->render('Контакты');
    }

    public function PostAction() {

        $this->view->render('Пост');
    }




}