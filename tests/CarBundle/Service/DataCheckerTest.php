<?php


namespace CarBundle\Service;


use Doctrine\ORM\EntityManager;

class DataCheckerTest extends \PHPUnit_Framework_TestCase
{
    /** @var EntityManager|\PHPUnit_Framework_MockObject_MockObject */
    protected $entityManager;

    public function setUp()
    {
        $this->entityManager = $this->getMockBuilder('Doctrine\ORM\EntityManager')
                                    ->disableOriginalConstructor()->getMock();
    }

    public function testCheckCarWithRequiredPhotosWillReturnFalse()
    {
        $subject        = new DataChecker($this->entityManager, true);
        $expectedResult = false;

        $car = $this->createMock('CarBundle\Entity\Car');
        $car->expects($this->once())
            ->method('setPromote')
            ->with($expectedResult);

        $this->entityManager->expects($this->once())
                            ->method('persist')
                            ->with($car);
        $this->entityManager->expects($this->once())
                            ->method('flush');

        $result = $subject->checkCar($car);
        $this->assertEquals($expectedResult, $result);
    }


}
