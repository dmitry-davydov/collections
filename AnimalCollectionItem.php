<?php

class AnimalCollectionItem
{
  /**
   * @var AbstractAnimal
   */
  public $animal;

  /**
   * @var DateTime
   */
  public $createdAt;

  /**
   * @var string
   */
  private $hash;

  public function __construct(AbstractAnimal $animal)
  {
    $this->animal = $animal;
    $this->createdAt = microtime(true);

    $this->hash = md5(implode('-', [$animal->getCategory(), $animal->getName(), $animal->getAge()]));
  }

  /**
   * @return string
   */
  public function getHash()
  {
    return $this->hash;
  }

  /**
   * @return string
   */
  public function __toString()
  {
    return sprintf('Time: %f; %s', $this->createdAt, $this->animal->__toString());
  }


}