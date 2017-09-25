<?php

class UserDO
{
	private $id;
	private $email;
	private $password;
	private $name;

	public function __construct(array $row) {
		$id = $row['id']?:NULL;
		$email = $row['email'];
		$password = $row['password'];
		$name = $row['name'];
	}
	
	public function setId($id) {
		$this->id = $id;
	}

	public function getId() {
		return $this->id;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function getName() {
		return $this->name;
	}
}
