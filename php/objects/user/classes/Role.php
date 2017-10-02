<?php
/**
 * Valid user roles.
 * PHP does not have native enums. Can use abstract class.
 */
abstract class Role
{
  const ADMIN = "ADMIN";
  const MEMBER = "MEMBER";
  const GUEST = "GUEST";
}

// Don't close php block in class files.
