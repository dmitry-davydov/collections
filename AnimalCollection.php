<?php

/**
 * Class AnimalCollection
 */
class AnimalCollection
{
  /**
   * @var AnimalCollectionItem[]
   */
  protected $collection;

  /**
   * @var AnimalCollectionItem[]
   */
  private $list;

  /**
   * @param AbstractAnimal $animal
   * @return AnimalCollection
   */
  public function add(AbstractAnimal $animal)
  {
    $this->collection[] = new AnimalCollectionItem($animal);

    return $this;
  }

  /**
   * @return AbstractAnimal
   */
  public function remove()
  {
    /** @var AnimalCollectionItem $removingItem */
    $removingItem = current($this
      ->filter()
      ->sortByCreatedAtASC()
      ->getList())
    ;

    $hash = $removingItem->getHash();

    $this->collection = array_filter($this->collection, function(AnimalCollectionItem $item) use ($hash) {
      return $item->getHash() !== $hash;
    });

    return $removingItem->animal;
  }

  /**
   * @return $this
   */
  public function filter()
  {
    $this->list = $this->collection;
    return $this;
  }

  /**
   * @param $category
   * @return AnimalCollection
   */
  public function filterByCategory($category)
  {
    $this->list = array_filter($this->list, function (AnimalCollectionItem $item) use ($category) {
      return $item->animal->getCategory() === $category;
    });

    return $this;
  }

  /**
   * @return $this
   */
  public function sortByNameASC()
  {
    usort($this->list, function(AnimalCollectionItem $a, AnimalCollectionItem $b) {
      return strcmp($a->animal->getName(), $b->animal->getName());
    });

    return $this;
  }

  public function sortByCreatedAtASC()
  {
    usort($this->list, function(AnimalCollectionItem $a, AnimalCollectionItem $b) {
      return $a->createdAt > $b->createdAt ? 1 : -1;
    });

    return $this;
  }


  /**
   * @return AnimalCollectionItem[]
   */
  public function getList()
  {
    if (!count($this->list)) {
      return [];
    }

    $list = $this->list;
    $this->list = [];

    return $list;
  }

}