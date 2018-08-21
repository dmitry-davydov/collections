<?php

include "AbstractAnimal.php";
include "AnimalCollection.php";
include "AnimalCollectionItem.php";
include "Cat.php";
include "Dog.php";
include "Turtle.php";

function printCollection(array $collection)
{
  foreach ($collection as $item) {
    echo (string) $item . PHP_EOL;
  }
}

$collection = new AnimalCollection();

$collection
  ->add(new Cat('Муська', 2))
  ->add(new Dog('Маська', 4))
  ->add(new Cat('Васька', 1))
  ->add(new Cat('Никифор', 3))
  ->add(new Dog('Потрошитель', 3))
  ;

echo 'Данные' . PHP_EOL;

printCollection($collection->filter()->getList());

$filteredList = $collection
  ->filter()
  ->filterByCategory('cat')
  ->sortByNameASC()
  ->getList()
;
echo PHP_EOL;
echo '=============' . PHP_EOL;
echo 'Отфильтрованная коллекция' . PHP_EOL;
printCollection($filteredList);

$removedAnimal = $collection->remove();
echo PHP_EOL;
echo '=============' . PHP_EOL;
echo 'Удаленный элемент коллекции' . PHP_EOL;
echo (string) $removedAnimal . PHP_EOL;

echo 'Оставшиеся данные в коллекции' . PHP_EOL;
printCollection($collection->filter()->getList());




