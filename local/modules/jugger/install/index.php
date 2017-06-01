<?php

class jugger extends CModule
{
	var $MODULE_ID = __CLASS__;
	var $MODULE_NAME = "Вспомогательный иструментарий";

	public function DoInstall()
	{
		RegisterModule($this->MODULE_ID);
	}

	public function DoUninstall()
	{
		UnRegisterModule($this->MODULE_ID);
	}
}
