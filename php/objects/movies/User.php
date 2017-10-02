<?php
class User {

    private $username;
    private $email;
    private $movies;

    public function __construct($username, $email) {
      $this->username = $username;
      $this->email = $email;
      $this->movies = array();
    }

    public function getUserName() {
      return $this->username;
    }

    public function getEmail() {
      return $this->email;
    }

    public function getFavMovies() {
      return $this->movies;
    }

    public function addFavMovie($movie) {
      $this->movies[] = $movie;
    }

    public function __toString() {
      return $this->username . ' (' . $this->email . ') ';
    }

}