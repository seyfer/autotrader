<?php


namespace CarBundle\DataFixtures\ORM;


use CarBundle\Entity\Make;
use CarBundle\Entity\Model;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadDictionary extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $make = new Make();
        $make->setName('VW');
        $make1 = new Make();
        $make1->setName('BMW');
        $make2 = new Make();
        $make2->setName('Fiat');
        $manager->persist($make);
        $manager->persist($make1);
        $manager->persist($make2);

        $model1 = new Model();
        $model1->setName('X1');
        $model2 = new Model();
        $model2->setName('Passat');
        $model3 = new Model();
        $model3->setName('Croma');
        $manager->persist($model1);
        $manager->persist($model2);
        $manager->persist($model3);
        $manager->flush();
        $this->addReference("X1", $model1);
        $this->addReference("Passat", $model2);
        $this->addReference("Croma", $model3);
        $this->addReference("VW", $make);
        $this->addReference("BMW", $make1);
        $this->addReference("Fiat", $make2);
    }


    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}