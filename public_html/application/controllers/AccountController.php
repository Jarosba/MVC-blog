<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;
use application\models\Main;

use application\models\Account;

class AccountController extends Controller
{

    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'account';
    }


    public function signinAction()
    {

        if (isset($_SESSION['account'])) {
            $this->view->redirect('account/add');
        } else {
            if (!empty($_POST)) {
                if (!$this->model->checkData($_POST['login'],$_POST['password'])) {

                    $this->view->message('error',
                        'Логин или пароль указан неверно');
                }
                $_SESSION['account'] = $_POST['login'];
                $this->view->redirect('account/add');

                $this->view->message('Success', 'Login is done');


            }
        }


        $this->view->BuildScreen('signin');

    }


    public function signupAction()
    {
        if (!empty($_POST)) {
            if (!$this->model->accountvalidate(['email', 'login', 'password'],
                $_POST)
            ) {
                $this->view->message('error', $this->model->error);
            } elseif ($this->model->checkEmailExists($_POST['email'])) {
                $this->view->message('error', 'This E-mail is already used');
            } elseif (!$this->model->checkLoginExists($_POST['login'])) {
                $this->view->message('error', $this->model->error);
            }
            $this->model->CreateAccount($_POST);
            $this->view->message('success',
                'Registration is done , confirm your email');
        }
        $this->view->BuildScreen('Registration');
    }


    public function addAction()
    {
        if (!empty($_POST)) {
            if (!$this->model->postValidate($_POST, 'add')) {
                $this->view->message('error', $this->model->error);
            }



            $id = $this->model->postAdd($_POST,$_SESSION['account']);

            if (!$id) {
                $this->view->message('success', 'Ошибка обработки запроса');
            }


            $this->view->message('success', 'Пост добавлен');
        }
        $vars=['account'=>$_SESSION['account']];

        $this->view->BuildScreen('Добавить пост',$vars);
    }


    public function logoutAction() {
        unset($_SESSION['account']);
        $this->view->redirect('account/signin');
    }

        public function postsAction()
        {   $your_account=new Main;

        $vars=['list'=>$your_account->postsList($_SESSION['account']),];
            $this->view->BuildScreen('Посты', $vars);


        }


        public function profileAction()
        {


            $vars=['login'=>'SUN','resume'=>'RESUME'];

            $this->view->BuildScreen('My profile ', $vars);
        }






}