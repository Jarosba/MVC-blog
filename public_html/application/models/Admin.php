<?php
namespace application\models;
use application\core\Model;




class Admin extends Model {


    public $error;

    public function loginValidate($post)
    {
        $config = require 'application/config/admin.php';
        if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
            $this->error = 'Логин или пароль указан неверно';
            return false;
        }
        return true;
    }

        public function postValidate($post, $type){

            $nameLen = iconv_strlen($post['name']);
            $descriptionLen = iconv_strlen($post['description']);
            $textLen = iconv_strlen($post['text']);

            if ($nameLen < 3 or $nameLen > 100) {
                $this->error = 'Название должно содержать от 3 до 20 символов';
                return false;
            }elseif ($descriptionLen < 3 or $descriptionLen > 200) {
                $this->error = 'Аннотация должна содержать от 3 до 200 символов';
                return false;
            }elseif ($textLen < 10 or $textLen > 5000) {
                $this->error = 'Сообщение должно содержать от 10 до 500 символов';
                return false;
            }

            if (empty($_FILES['img']['tmp_name']) and $type )

            if($type=='edit' and $_FILES['img']['tmp_name'])
            {
                if (empty ($_FILES['img']['tmp_name'])){
                    $this->error='Изображение не выбрано';
                    return false;

                }
            }









            return true;

        }

}