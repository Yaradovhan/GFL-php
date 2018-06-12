<?php

class HtmlHelper
{

	public static function selectMulti($name, $array, $class=null)
	{
		$select = '<select multiple '.$class.' name="'.$name.'">';
		foreach ($array as $val)
		{
				$select .= '<option value='.$val.'>'.$val.'</option>';
		}
		$select .= '</select>';
		return $select;
	}

	public static function table($array, $class=null)
	{
		$table = '<table '.$class.'>';
			$table .= '<thead>';
			$table .= '<tr><th>'. implode('</th><th>', array_keys(current($array))).'</th></tr>';
			$table .= '</thead>';
			$table .= '<tbody>';
			foreach ($array as $row)
			{
				array_map('htmlentities', $row);
				$table .= '<tr>';
				$table .= '<td>'.implode('</td><td>', $row).'</td>';
				$table .= '</tr>';
			}
			$table .= '</tbody>';
		$table .= '</table>';
		return $table;
	}	

	public static function ulol($array, $class=null)
	{
		$result = '<ol>';
		foreach ($array as $val)
		{
			$result .= '<li>'.$val.'</li>';
		}
		$result .= '</ol>';
		return $result;
	}

	public static function radioButGroup($name, $array, $class=null)
	{
		$result = '';
		foreach ($array as $k=>$val)
		{
			  $result .= '<input type="radio" name="'.$name.'" value="'.$k.'">'.$val.'<br>';
		}
		$result .= '';
		return $result;
	}

	public static function checkbox($array, $class=null)
	{
		$result = '';
		foreach ($array as $k=>$val)
		{
			    $result .= '<input type="checkbox" id="'.$val.'" name="'.$k.'" value="'.$val.'">
				<label for="'.$val.'">'.$val.'</label><br>';
		}
		$result .= '';
		return $result;
	}

}
