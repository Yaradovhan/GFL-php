<?php

class View
{
	private $forRender;
	private $file;

	public function __construct($template)
	{       
		  $this->file = file_get_contents($template);
	}

	public function addToReplace($mArray)
	{
	  foreach($mArray as $key=>$val)
	   {
			$this->forRender[$key] = $val;
	   }
	}

	public function templateRender()
	{
		foreach($this->forRender as $key=>$val)
		{
			$this->file = str_replace($key, $val, $this->file);
		}													
		echo $this->file;
    }
    
    public static function makeList($data)
	{	
    $arr['%OUT%'] = '';
    foreach ($data as $row) {
        $arr['%OUT%'] .= '<div class="row" style="background: #d5ecf4; border-radius:6px" >'
            . '<div class="col-md-1" style="background: #d5ecf4; border-radius:6px; " ><p>'
            . '<a href = ' . $row['link'] . '>' . $row['linkText'] . '</a></p>'
            . '<p>' . $row['link'] . '</p>'
            . '<p>' . $row['details'] . '</p></div></div>';
    }
    return $arr['%OUT%'];
	}
    
}
