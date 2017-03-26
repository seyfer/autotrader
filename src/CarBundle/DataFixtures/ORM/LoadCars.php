<?php


namespace CarBundle\DataFixtures\ORM;


use CarBundle\Entity\Car;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCars extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $car1 = new Car();
        $car1->setModel($this->getReference("X1"));
        $car1->setMake($this->getReference("BMW"));
        $car1->setPrice(12345);
        $car1->setYear(2016);
        $car1->setNavigation(true);
        $car1->setPromote(true);
        $car2 = new Car();
        $car2->setModel($this->getReference("Passat"));
        $car2->setMake($this->getReference("VW"));
        $car2->setPrice(66645);
        $car2->setYear(2015);
        $car2->setNavigation(false);
        $car2->setPromote(false);
        $manager->persist($car1);
        $manager->persist($car2);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }
}