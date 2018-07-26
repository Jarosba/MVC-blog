<?php

namespace application\models;

use application\core\Model;
use Imagick;

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

		/*if (empty($_FILES['img']['tmp_name']) and $type == 'add') {
			$this->error = 'Изображение не выбрано';
			return false;
		}*/  //we dont need image
		return true;
	}

	public function postAdd($post) {
		$params = [
			'article_id' => '',
			'name' => $post['name'],
			'description' => $post['description'],
			'text' => $post['text'],
		];
		$this->db->query('INSERT INTO posts VALUES (:article_id, :name, :description, :text)', $params);
		return $this->db->lastInsertId();
	}

	public function postEdit($post, $article_id)
    {
		$params = [
			'article_id' => $article_id,
			'name' => $post['name'],
			'description' => $post['description'],
			'text' => $post['text'],
		];
		$this->db->query('UPDATE posts SET name = :name, description = :description, text = :text WHERE article_id = :article_id', $params);
	}



	public function isPostExists($article_id)
    {
		$params = [
			'article_id' => $article_id,
		];
		return $this->db->column('SELECT article_id FROM posts WHERE article_id = :article_id', $params);
	}

	public function postDelete($article_id)
    {
		$params = [
			'article_id' => $article_id,
		];
		$this->db->query('DELETE FROM posts WHERE article_id= :article_id', $params);

	}

	public function postData($article_id)
    {
		$params = [
			'article_id' => $article_id,
		];
		return $this->db->row('SELECT * FROM posts WHERE article_id = :article_id', $params);
	}

}