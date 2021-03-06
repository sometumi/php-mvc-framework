<?php

namespace core;

use core\View;  //使用视图类
use core\traits\Jump;

class Controller
{
	use Jump;
	protected $vars = [];   //模板变量
	protected $tpl; //视图模板
	
	
	//变量赋值
	protected final function assign($name, $value = '')
	{
		if (is_array($name)) {
			$this->vars = array_merge($this->vars, $name);
			return $this;
		} else {
			$this->vars[$name] = $value;
		}
	}
	
	//设置模板
	public final function setTpl($tpl = '')
	{
		$this->tpl = $tpl;
	}
	
	//模板展示
	public final function display()
	{
		$view = new View($this->vars);  //调用视图类
		$view->display($this->tpl); //视图类展示方法
	}
}