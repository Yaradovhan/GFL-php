<?php

class Controller
{
		private $model;
		private $view;

		public function __construct()
		{		
		    $this->model = new Model();
			$this->view = new View(TEMPLATE);	
				
			if(isset($_POST['request']) && !empty($_POST['request']))
            {
                $this->pageSendQuery();
			}
			else
			{
				$this->pageDefault();	
			}
			
			$this->view->templateRender();			
	    }	
		
		private function pageSendQuery()
		{
			if($this->model->checkForm() === true)
			{
                $out = $this->model->sendQuery($_POST['request']);
				$mArray = $this->model->getArray($out);
			}
			
    	    $this->view->addToReplace($mArray);
		}	
			    
		private function pageDefault()
		{   
		   $mArray = $this->model->getArray();		
	       $this->view->addToReplace($mArray);			   
		}				
}
