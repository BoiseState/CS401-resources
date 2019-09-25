<?php
include('SuperheroInterface.php');

/**
 * Represents a superhero and their abilities.
 * @author Marissa Schmidt
 */
class Superhero implements SuperheroInterface
{
	private $firstName;
	private $lastName;
	private $alias;
	private $abilities;

  /**
   * Constructor. A "magic" function.
   * @param string $firstName
   * @param string $lastName
   * @param string $alias
   * @param array $abilities
   */
	public function __construct($firstName, $lastName, $alias, $abilities = array())
	{
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->alias = $alias;
		$this->abilities = $abilities;
	}

  /**
   * Sets the first and last name of the superhero
   * @param string $firstName
   * @param string $lastName
   */
	public function setFullName($firstName, $lastName) {
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}

  /**
   * Returns the full name.
   * @return string The full name.
   */
	public function getFullName() {
		return $this->firstName . " " . $this->lastName;
	}

  /**
   * Sets the alias of the superhero
   * @param string $alias
   */
	public function setAlias($alias) {
		$this->alias = $alias;
	}
  /**
   * Returns the alias.
   * @return string The alias.
   */
	public function getAlias() {
		return $this->alias;
	}

  /**
   * Adds ability to the list of abilities
   * @param string $ability
   */
	public function addAbility($ability) {
		$this->abilities[] = $ability;
	}

  /**
   * Returns the list of abilities.
   * @return array The list of abilities.
   */
	public function getAbilities() {
		return $this->abilities;
	}

  /*
   * Returns the initials of first and last name
   * @return string The initials (e.g. B.B.)
   */
	public function getInitials() {
		return $this->firstName[0] . "." . $this->lastName[0] . ".";
	}

  /**
   * Returns the full name and alias of the superhero.
   * @return string The fullname and alias
   */
	public function __toString() {
      return $this->getFullName() . ' (' . $this->alias . ')';
    }
}
