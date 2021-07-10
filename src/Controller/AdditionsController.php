<?php

namespace App\Controller;

use App\DTO\Addition as Addition2;
use App\Entity\Addition;
use App\Form\AdditionType;
use App\Message\AdditionMessage;
use App\Repository\AdditionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class AdditionsController extends AbstractController {
    
    /**
     * @Route("/additions", name="additions")
     */
    public function index(Request $request, MessageBusInterface $bus): Response {
        /* @var $aRep AdditionRepository */
        $aRep = $this->getDoctrine()->getRepository(Addition::class);
        $last5Additions = $aRep->findBy([], ['id' => "DESC"], 5);
        
        $add = new Addition2();
        $form = $this->createForm(AdditionType::class, $add);
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {
            // déclenche le calcul avec rabbitMq
            $toCalc = $form->getData();
//            dump($toCalc);
            $addMessage = new AdditionMessage($toCalc->a, $toCalc->b);
            $bus->dispatch($addMessage);
            return $this->redirectToRoute('additions');
        }
        
        return $this->render('additions/index.html.twig', [
            'controller_name' => 'AdditionsController',
            'last5Additions' => $last5Additions,
            'add' => $add,
            'form' => $form->createView(),
        ]);
    }
}
