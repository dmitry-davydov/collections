<?php

/**
 * Class Dog
 */
class Dog extends AbstractAnimal
{
  /**
   * @inheritdoc
   */
  public function getCategory()
  {
    return 'dog';
  }
}
