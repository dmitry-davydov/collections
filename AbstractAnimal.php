<?php

/**
 * Class AbstractAnimal
 */
abstract class AbstractAnimal
{

  /**
   * @var string
   */
  private $name;

  /**
   * @var int
   */
  private $age;

  /**
   * AbstractAnimal constructor.
   * @param $name
   * @param $age
   */
  public function __construct($name, $age)
  {
    $this->name = $name;
    $this->age = $age;
  }

  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @return int
   */
  public function getAge()
  {
    return $this->age;
  }

  /**
   * @return string
   */
  abstract public function getCategory();

  /**
   * @inheritdoc
   */
  public function __toString()
  {
    return sprintf("Name: %s: Age: %d; Category: %s", $this->name, $this->age, $this->getCategory());
  }


}