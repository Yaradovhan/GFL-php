<?php

class Controller
{
		private $model;
		private $view;

		public function __construct()
		{		
		    $this->model = new Model();
			$this->view = new View(TEMPLATE);	
				
			if(isset($_POST['query']))
			{	
				$this->pageResult();
			}
			else
			{
				$this->pageDefault();	
			}
			
			$this->view->templateRender();			
	    }	
		
		private function pageResult()
		{
			if($this->model->checkForm() === true)
			{
				$this->model->sendQuery($_POST['query']);
			}
			$mArray = $this->model->getArray();		
	        $this->view->addToReplace($mArray);	
		}	
			    
		private function pageDefault()
		{   
		   $mArray = $this->model->getArray();		
	       $this->view->addToReplace($mArray);			   
		}				
}
