<?php

use Phalcon\Mvc\Controller;

class CollaborateController extends Controller
{
	public function indexAction()
	{
        $field = Field::find();

		// send data to the view
		$this->view->field = $field;
    }

    public function saveAction()
	{
        // get variables from POST
        $text = $this->request->get('text');

		// save the new user in the DB
        $field = new field();
        $field->ip = $_SERVER['REMOTE_ADDR'];
		$field->content = $text;
        $field->save();

		// redirect to user list
	    $this->response->redirect('/colab');
	}
}