<?php 

require_once 'View.php';
require_once 'MyCurl.php';

class Model
{ 
   public function __construct()
   {

   }
   	
	public function getArray($out=null)
   {	    
		return array('%TITLE%'=>'TASK 8', '%OUT%'=> $out['%OUT%']);
   }
	
	public function checkForm()
	{
		return true;			
	}
   
	public function sendQuery($query)
	{
		$ch = new myCurl($query);
		$data = $ch->getCurl();
		$dom = new DOMDocument();
		@$dom->loadHTML($data);

		$nodes = $dom->getElementsByTagName('div');
		$dataArr = [];
		$i = 0;
		foreach ($nodes as $node) {

		    if ($node->getAttribute('class') == 'rc' && $node->childNodes->item(1)->firstChild->childNodes->item(1)) {
		        $dataArr[$i]['link'] = $node->firstChild->firstChild->getAttribute('href');
		        $dataArr[$i]['linkText'] = $node->firstChild->firstChild->nodeValue;
		        $dataArr[$i]['details'] = $node->childNodes->item(1)->firstChild->childNodes->item(1)->nodeValue;
		        $i++;
		    }
		}

		if (!empty($dataArr)) {
		    $output['%OUT%'] = View::makeList($dataArr);
		}
		return $output;
	}		
}
