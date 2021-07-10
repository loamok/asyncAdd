<?php

namespace App\MessageHandler;

use App\Entity\Addition;
use App\Message\AdditionMessage;
use App\Repository\AdditionRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class AdditionMessageHandler implements MessageHandlerInterface {
    use HandleTrait;
    
    protected $em;
    protected $aRep;
    protected $messageBus;

    public function __construct(EntityManagerInterface $em, AdditionRepository $aRep, MessageBusInterface $commandBus) {
        $this->em = $em;
        $this->aRep = $aRep;
        $this->messageBus = $commandBus;
    }

    public function __invoke(AdditionMessage $addition) {
        $add = new Addition();
        $add->setA($addition->getA());
        $add->setB($addition->getB());
        
        $res = $add->getA() + $add->getB();
        $add->setRes($res);
        $this->em->persist($add);
        $this->em->flush();
        
    }
}
