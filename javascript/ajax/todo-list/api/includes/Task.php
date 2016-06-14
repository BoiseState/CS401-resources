<?php
class Task {
	private $id;
	private $description;
	private $details;
	private $position;

	public function __construct($id, $description, $details, $position)
	{
		$this->id = $id;
		$this->description = $description;
		$this->details = $details;
		$this->position = $position;
	}


}
