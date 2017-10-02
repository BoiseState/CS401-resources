<?php
/*
 * Represents a Movie.
 */
class Movie {

    private $title;
    private $director;
    private $releaseDate;

    # Creates a new movie with the given title, director and release date.
    public function __construct($title, $director, $releaseDate) {
      $this->title = $title;
      $this->director = $director;
      $this->releaseDate = $releaseDate;
    }

    public function setTitle($title) {
      $this->title = $title;
    }

    # Returns the title of this movie.
    public function getTitle() {
      return $this->title;
    }

    # Returns the director of this movie.
    public function getDirectory() {
      return $this->director;
    }

    # Returns the release date of this movie.
    public function getReleaseDate() {
      return $this->releaseDate;
    }

    # Returns a string representation of a movie.
    # (e.g. {Home Alone, Chris Columbus, 1990}
    public function __toString() {
      return "{" . $this->title . ", " . $this->director . ", " . $this->releaseDate . "}";
    }
}