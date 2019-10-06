<?php
/**
 * Main DController class...
 */
class DController{
	
	protected $load = array();

	public function __construct()
	{
		$this->load = new Load();
	}
}