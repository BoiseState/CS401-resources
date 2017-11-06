<?php
class NameAutoComplete
{
    private $names;

	public function __construct($nameFile = "first-names.txt")
	{
		$this->names = file($nameFile, FILE_IGNORE_NEW_LINES);
	}

	public function getHintsJson($query)
	{
		$results = array();

		if ($query !== "") {
			$query = strtolower($query);
			$len = strlen($query);
			foreach($this->names as $name) {
				if (stristr($query, substr($name, 0, $len))) {
					$hints[] = $name;
				}
			}
		}

		if(isset($hints)) {
			$results["status"] = "OK";
			$results["hints"] = $hints; 
		} else {	
			$results["status"] = "ZERO_RESULTS";
		}

		return json_encode($results);
	}	
}

