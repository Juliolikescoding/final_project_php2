<?php

use Phalcon\Mvc\Controller;

class CartController extends Controller
{
	public function indexAction()
	{
		//get the list of items in your cart
		$cart = Cart::find();
	
		// send data to the view
		$this->view->cart = $cart;
	}

	public function submitAction()
	{
		$text= $this->request->get('text');



	}
}