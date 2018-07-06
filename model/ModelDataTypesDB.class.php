<?php

class ModelDataTypesDB
{
	public $column;
	public $schema;
	public $modelManage;

	function __construct (&$types, &$column, $modelManage)
	{
		$this->schema = &$types;
		$this->column = &$column;
		$this->modelManage = $modelManage;
	}

	/**
	 * Null available value in column
	 */
	public function notNull()
	{
		$this->schema[$this->modelManage][$this->column]['null'] = false;
	}

	/**
	 * Primary key column type
	 */
	public function primaryKey()
	{
		$this->schema[$this->modelManage][$this->column]['primaryKey'] = true;
	}

	/**
	 * Auto increment column property
	 */
	public function autoIncrement()
	{
		$this->schema[$this->modelManage][$this->column]['autoIncrement'] = true;
	}

	/**
	 * Set default column value
	 *
	 * @param $value
	 */
	public function defaultValue($value)
	{
		$this->schema[$this->modelManage][$this->column]['default'] = $value;
	}

  /**
   * Set is column contain sensible information
   */
	public function sensitiveInfo()
  {
    $this->schema[$this->modelManage][$this->column]['sensitiveInfo'] = true;
  }

  /**
   * Set current column value
   *
   * @param $value
   */
	public function value($value)
  {
    $this->schema[$this->modelManage][$this->column]['value'] = $value;
  }
}