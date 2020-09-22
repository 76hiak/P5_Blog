<?php

use \Blog\Controller;

class ControllerHome extends Controller
{
	public function index() 
	{
		$this->generateView(array('title'=>'Titre de ma page'));
    }
}
