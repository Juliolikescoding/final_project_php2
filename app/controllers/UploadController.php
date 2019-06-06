<?php

use Phalcon\Mvc\Controller;

class UploadController extends Controller
{
    public function indexAction()
    {
    }

    public function uploadAction()
    {
       // get the info from DB
        $image = $_FILES["image"]["name"];
        $title = $this->request->get('title');
        $content= $this->request->get('content');
        $inserted = $this->request->get('inserted');

		// copy the picture to the images directory
		copy($_FILES["image"]["tmp_name"], "images/$image");

		// add a new stamp to the database
		$imgUp = new Posts();
        $imgUp->image = $image;
        $imgUp->title = $title;
        $imgUp->content = $content;
        $imgUp->inserted = $inserted;
        $imgUp->save();

        $this->response->redirect('home');
    }
}
