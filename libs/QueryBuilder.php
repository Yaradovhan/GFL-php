<?php

require_once 'DBConnect.php';

class QueryBuilder
{
	
	public function __construct(DBConnect $connection)
	{
		$this->_connection=$connection;
		
	}
	
	public function select($columns='*', $option='')
	{
		if(is_string($columns) && strpos($columns,'(')!==false)
			$this->_query['select']=$columns;
		else
		{
			if(!is_array($columns))
				$columns=preg_split('/\s*,\s*/',trim($columns),-1,PREG_SPLIT_NO_EMPTY);
			foreach($columns as $i=>$column)
			{
				if(is_object($column))
					$columns[$i]=(string)$column;
				elseif(strpos($column,'(')===false)
				{
					if(preg_match('/^(.*?)(?i:\s+as\s+|\s+)(.*)$/',$column,$matches))
						$columns[$i]=$this->_connection->quoteColumnName($matches[1]).' AS '.$this->_connection->quoteColumnName($matches[2]);
					else
						$columns[$i]=$this->_connection->quoteColumnName($column);
				}
			}
			$this->_query['select']=implode(', ',$columns);
		}
		if($option!='')
			$this->_query['select']=$option.' '.$this->_query['select'];
		return $this;
	}
	
	public function update($table, $columns, $conditions='', $params=array())
	{
		$lines=array();
		foreach($columns as $name=>$value)
		{
			if($value instanceof CDbExpression)
			{
				$lines[]=$this->_connection->quoteColumnName($name) . '=' . $value->expression;
				foreach($value->params as $n => $v)
					$params[$n] = $v;
			}
			else
			{
				$lines[]=$this->_connection->quoteColumnName($name) . '=:' . $name;
				$params[':' . $name]=$value;
			}
		}
		$sql='UPDATE ' . $this->_connection->quoteTableName($table) . ' SET ' . implode(', ', $lines);
		if(($where=$this->processConditions($conditions))!='')
			$sql.=' WHERE '.$where;
		return $this->setText($sql)->execute($params);
	}
	
	public function from($tables)
	{
		if(is_string($tables) && strpos($tables,'(')!==false)
			$this->_query['from']=$tables;
		else
		{
			if(!is_array($tables))
				$tables=preg_split('/\s*,\s*/',trim($tables),-1,PREG_SPLIT_NO_EMPTY);
			foreach($tables as $i=>$table)
			{
				if(strpos($table,'(')===false)
				{
					if(preg_match('/^(.*?)(?i:\s+as|)\s+([^ ]+)$/',$table,$matches))  // with alias
						$tables[$i]=$this->_connection->quoteTableName($matches[1]).' '.$this->_connection->quoteTableName($matches[2]);
					else
						$tables[$i]=$this->_connection->quoteTableName($table);
				}
			}
			$this->_query['from']=implode(', ',$tables);
		}
		return $this;
	}
	
	public function delete($table, $conditions='', $params=array())
	{
		$sql='DELETE FROM ' . $this->_connection->quoteTableName($table);
		if(($where=$this->processConditions($conditions))!='')
			$sql.=' WHERE '.$where;
		return $this->setText($sql)->execute($params);
	}
	
	public function insert($table, $columns)
	{
		$params=array();
		$names=array();
		$placeholders=array();
		foreach($columns as $name=>$value)
		{
			$names[]=$this->_connection->quoteColumnName($name);
			if($value instanceof CDbExpression)
			{
				$placeholders[] = $value->expression;
				foreach($value->params as $n => $v)
					$params[$n] = $v;
			}
			else
			{
				$placeholders[] = ':' . $name;
				$params[':' . $name] = $value;
			}
		}
		$sql='INSERT INTO ' . $this->_connection->quoteTableName($table)
			. ' (' . implode(', ',$names) . ') VALUES ('
			. implode(', ', $placeholders) . ')';
		return $this->setText($sql)->execute($params);
	}
	
	public function where($conditions, $params=array())
	{
		$this->_query['where']=$this->processConditions($conditions);
		foreach($params as $name=>$value)
			$this->params[$name]=$value;
		return $this;
	}
	
	public function join($table, $conditions, $params=array())
	{
		return $this->joinInternal('join', $table, $conditions, $params);
	}
	
	public function leftJoin($table, $conditions, $params=array())
	{
		return $this->joinInternal('left join', $table, $conditions, $params);
	}
	
	public function rightJoin($table, $conditions, $params=array())
	{
		return $this->joinInternal('right join', $table, $conditions, $params);
	}
	
	public function crossJoin($table)
	{
		return $this->joinInternal('cross join', $table);
	}
	
	public function naturalJoin($table)
	{
		return $this->joinInternal('natural join', $table);
	}
	
	private function joinInternal($type, $table, $conditions='', $params=array())
	{
		if(strpos($table,'(')===false)
		{
			if(preg_match('/^(.*?)(?i:\s+as|)\s+([^ ]+)$/',$table,$matches))  // with alias
				$table=$this->_connection->quoteTableName($matches[1]).' '.$this->_connection->quoteTableName($matches[2]);
			else
				$table=$this->_connection->quoteTableName($table);
		}
		$conditions=$this->processConditions($conditions);
		if($conditions!='')
			$conditions=' ON '.$conditions;
		if(isset($this->_query['join']) && is_string($this->_query['join']))
			$this->_query['join']=array($this->_query['join']);
		$this->_query['join'][]=strtoupper($type) . ' ' . $table . $conditions;
		foreach($params as $name=>$value)
			$this->params[$name]=$value;
		return $this;
	}
	
	public function queryRow($fetchAssociative=true,$params=array())
	{
		return $this->queryInternal('fetch',$fetchAssociative ? $this->_fetchMode : PDO::FETCH_NUM, $params);
	}
	
	public function queryAll($fetchAssociative=true,$params=array())
	{
		return $this->queryInternal('fetchAll',$fetchAssociative ? $this->_fetchMode : PDO::FETCH_NUM, $params);
	}
	
	public function query($params=array())
	{
		return $this->queryInternal('',0,$params);
	}
	
}