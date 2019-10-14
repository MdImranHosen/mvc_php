<?php
/**
 * Form Validation...
 */
class DForm{
	public $currentValue;
	public $values = array();
	public $errors = array();

	public function __construct(){}

	public function post($key){
       $this->values[$key] = trim($_POST[$key]);
       $this->values[$key] = stripcslashes($_POST[$key]);
       $this->values[$key] = htmlspecialchars($_POST[$key]);
       $this->currentValue = $key;
       return $this;
	}
	public function isEmpty(){
		if (empty($this->values[$this->currentValue])) {
			$this->errors[$this->currentValue]['empty'] = "Field must not be Empty";
		}
		return $this;
	}

	public function isCatEmpty(){
		if (empty($this->values[$this->currentValue]) OR $this->values[$this->currentValue] == 0) {
			$this->errors[$this->currentValue]['empty'] = "Field must not be Empty";
		}
		return $this;
	}

	public function length($min = 0, $max){
		if (strlen($this->values[$this->currentValue]) < $min OR strlen($this->values[$this->currentValue]) > $max) {
		  $this->errors[$this->currentValue]['length'] = "Should Min ".$min." And Max ".$max." Characters.";
		}
		return $this;
	}
	public function submit(){
		if (empty($this->errors)) {
			return true;
		} else{
			return false;
		}
	}
}