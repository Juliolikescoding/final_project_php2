<?php

use Phalcon\Mvc\Controller;

class HomeController extends Controller
{
	public function indexAction()
	{
		$posts = Posts::find();

		// load configs
		$configs = $this->di->get('config');

		// load the session
		$username = $this->session->get("username");

		// send data to the view
		$this->view->posts = $posts;
		$this->view->appname = $configs->app->name;
		$this->view->fcolor = $configs->interface->fcolor;
		$this->view->bcolor = $configs->interface->bcolor;
	}

	public function editAction()
	{	
		// get ID to edit
		$id = $this->request->get('id');

		// get the user from the database
		$posts = Posts::findFirst($id);
	
		// send data to the view
		$this->view->post = $posts;
	}

	public function editsubAction()
	{
		// get variables from POST
		$id = $this->request->get('id');
		$title = $this->request->get('title');
		$content = $this->request->get('content');

		// validate no fields are empty
		if(empty($id) || empty($title) || empty($content)) {
			die("You need to fill of the required fields");
		}

		// update the user in the DB
		$post = Posts::findFirst($id);
		$post->title = $title;
		$post->content = $content;
		$post->save();

		// redirect to user list
		$this->response->redirect('/home');
	}
	public function deleteAction()
	{
		// get variables from POST
		$id = $this->request->get('id');

		// validate no fields are empty
		if(empty($id)) {
			die("The stamp selected does not exist");
		}

		// delete the user from the DB
		$post = Posts::findFirst($id);
		$post->delete();

		// redirect to user list
		$this->response->redirect('/home');
	}
}
