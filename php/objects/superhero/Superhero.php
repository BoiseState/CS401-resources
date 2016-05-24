<?php

class Superhero
{
	private $firstName;
	private $lastName;
	private $alias;
	private $abilities;

	/* Constructor. A "magic" function. */
	public function __construct($firstName, $lastName, $alias, $abilities)
	{
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->alias = $alias;
		$this->abilities = $abilities;
	}

	public function setFullName($firstName, $lastName) {
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}

	public function getFullName() {
		return $this->firstName . " " . $this->lastName;
	}

	public function setAlias($alias) {
		$this->name = $name;
	}

	public function getAlias() {
		return $this->alias;
	}

	public function setAbilities($abilities) {
		$this->abilities = $abilities;
	}

	public function getAbilities() {
		return $this->abilities;
	}

	public function getInitials() {
		return $this->firstName[0] . "." . $this->lastName[0];
	}

	public function __toString() {
      return $this->getFullName() . ' (' . $this->alias . ') ';
    }
}
