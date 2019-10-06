<?php
/**
 * Admin Controller....
 */
class Admin extends DController
{
	
	public function __construct()
	{
		parent:: __construct();
	}
	public function login(){
		$this->load->view('login');
	}
}