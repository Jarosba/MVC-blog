<?php

namespace application\models;

use application\core\Model;


class Account extends Model
{

    public function accountvalidate($input, $post)
    {
        $rules = [
            'email'    => [
                'pattern' => '#^/^(|(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6})$/i$#',
                'message' => 'E-mail адрес указан неверно',
            ],
            'login'    => [
                'pattern' => '#^[a-z0-9]{3,15}$#',
                'message' => 'Логин указан неверно ',
            ],
            'password' => [
                'pattern' => '#^[a-z0-9]{10,30}$#',
                'message' => 'Пароль указан неверно ',
            ],
        ];

        foreach ($input as $val) {


            if (!isset($post[$val]) or empty($post[$val]
                    and !preg_match($rules[$val]['pattern'], $post[$val]))
            ) {
                $this->error = $rules[$val]['message'];

                return false;
            }
        }

        return true;
    }

    public function checkEmailExists($email)
    {
        $params = ['email' => $email,];

        return $this->db->column('SELECT author_id FROM authors WHERE email = :email',
            $params);
    }


    public function checkLoginExists($login)
    {
        $params = [
            'login' => $login,
        ];
        if ($this->db->column('SELECT author_id FROM authors WHERE login = :login',
            $params)
        ) {
            $this->error = 'Этот логин уже используется';

            return false;
        }

        return true;
    }


    public function CreateAccount($post)
    {
        $params = [
            'author_id' => '',
            'email'     => $post['email'],
            'login'     => $post['login'],
            'password'  => $post['password'],
            'resume'    =>''
        ];

        $this->db->query('INSERT INTO authors VALUES (:author_id, :email, :login,:password,:resume)',
            $params);


    }

    // password_hash($post['password'], PASSWORD_BCRYPT)


    public function checkData($login, $password)
    {
        $params = ['login' => $login,];
        $hash = $this->db->column('SELECT password FROM authors WHERE login = :login', $params);

        if ($hash != $password) {
            return false;
        }

        return true;
    }


    public function postValidate($post, $type)
    {
        $nameLen = iconv_strlen($post['name']);
        $descriptionLen = iconv_strlen($post['description']);
        $textLen = iconv_strlen($post['text']);
        if ($nameLen < 3 or $nameLen > 100) {
            $this->error = 'Название должно содержать от 3 до 100 символов';

            return false;
        } elseif ($descriptionLen < 3 or $descriptionLen > 100) {
            $this->error = 'Описание должно содержать от 3 до 100 символов';

            return false;
        } elseif ($textLen < 10 or $textLen > 5000) {
            $this->error = 'Текст должнен содержать от 10 до 5000 символов';

            return false;
        }


        return true;
    }


    public function postAdd($post, $login)
    {
        $params = [
            'article_id'  => '',
            'name'        => $post['name'],
            'description' => $post['description'],
            'text'        => $post['text'],
            'login'       => $login,
        ];
        $this->db->query('INSERT INTO posts VALUES (:article_id, :name, :description, :text,:login)',
            $params);

        return $this->db->lastInsertId();
    }

    public function postEdit($post, $article_id)
    {
        $params = [
            'article_id'  => $article_id,
            'name'        => $post['name'],
            'description' => $post['description'],
            'text'        => $post['text'],
        ];
        $this->db->query('UPDATE posts SET name = :name, description = :description, text = :text WHERE article_id = :article_id',
            $params);
    }

    public function profileEdit($post)
    {


    }


}