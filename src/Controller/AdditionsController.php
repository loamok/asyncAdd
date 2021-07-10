<?php

namespace App\Controller;

use App\DTO\Addition as Addition2;
use App\Entity\Addition;
use App\Repository\AdditionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdditionsController extends AbstractController {
    
    /**
     * @Route("/additions", name="additions")
     */
    public function index(Request $request): Response {
        /* @var $aRep AdditionRepository */
        $aRep = $this->getDoctrine()->getRepository(Addition::class);
        $last5Additions = $aRep->findBy([], ['id' => "DESC"], 5);
        
        $add = new Addition2();
        $form = $this->createForm(\App\Form\AdditionType::class, $add);
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {
            // déclenche le calcul avec rabbitMq
            $toCalc = $form->getData();
//            dump($toCalc);
        }
        
        return $this->render('additions/index.html.twig', [
            'controller_name' => 'AdditionsController',
            'last5Additions' => $last5Additions,
            'add' => $add,
            'form' => $form->createView(),
        ]);
    }
}
