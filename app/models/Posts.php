<?php

use Phalcon\Mvc\Model;

class Posts extends Model
{
	public $id;
	public $title;
	public $image;
	public $inserted;
	public $content;
}