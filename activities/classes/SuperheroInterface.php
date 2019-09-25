<?php
/**
 * Defines interface for Superhero implementation.
 * @author Marissa Schmidt
 */
interface SuperheroInterface 
{
  // Don't forget to define your constructor

  /**
   * Sets the first and last name of the superhero
   * @param string $firstName
   * @param string $lastName
   */
  public function setFullName($firstName, $lastName); 

  /**
   * Returns the full name.
   * @return string The full name.
   */
  public function getFullName(); 

  /**
   * Sets the alias of the superhero
   * @param string $alias
   */
  public function setAlias($alias); 

  /**
   * Returns the alias.
   * @return string The alias.
   */
  public function getAlias(); 

  /**
   * Adds ability to the list of abilities
   * @param string $ability
   */
  public function addAbility($ability); 

  /**
   * Returns the list of abilities.
   * @return array The list of abilities.
   */
  public function getAbilities(); 

  /*
   * Returns the initials of first and last name
   * @return string The initials (e.g. B.B.)
   */
  public function getInitials(); 

  // Don't forget to define your toString

}
