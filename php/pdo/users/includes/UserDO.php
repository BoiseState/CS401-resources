<?php

class UserDO
{
	private $id;
	private $email;
	private $password;
	private $name;

	public function __construct(array $row) {
		$this->id = isset($row['id']) ? $row['id'] : NULL;
		$this->email = isset($row['email']) ? $row['email'] : NULL;
		$this->password = isset($row['password']) ? $row['password'] : NULL;;
		$this->name = isset($row['name']) ? $row['name'] : NULL;;
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

	public function asParamArray() {
		return [':id' => $this->id,
				':email' => $this->email,
				':password' => $this->password,
				':name' => $this->name];
	}
}
