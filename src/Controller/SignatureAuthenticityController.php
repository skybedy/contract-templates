<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\Type\SignatureAuthenticity\SignatureAuthenticityType;
use App\Entity\SignatureAuthenticity;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\PdfService;

class SignatureAuthenticityController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    
    #[Route('/signature-authenticity', name: 'app_signature_authenticity')]
    public function index(): Response
    {
        
        $signatureList = $this->entityManager->getRepository(SignatureAuthenticity::class)->findAll();
        
        
        return $this->render('signature_authenticity/index.html.twig', [
            'signature_list' => $signatureList,
        ]);
    }


    #[Route('/signature-authenticity/edit/{id}', name: 'app_signature_authenticity_edit')]
    public function edit(Request $request,SignatureAuthenticity $signatureAuthenticity): Response
    {
        $form = $this->createForm(SignatureAuthenticityType::class, $signatureAuthenticity);
        
        $form->handleRequest($request);
       
        if ($form->isSubmitted() && $form->isValid()) {

            /** @var SignatureAuthenticity $signatureAuthenticity */
           
            $signatureAuthenticity = $form->getData();

            $this->entityManager->persist($signatureAuthenticity);

            $this->entityManager->flush();

            return $this->redirectToRoute('app_signature_authenticity');
        }
       
       
       
        return $this->render('signature_authenticity/edit.html.twig', [
            'form' => $form,
        ]);

    }



    #[Route('/signature-authenticity/new', name: 'app_signature_authenticity_new')]
    public function new(Request $request): Response
    {
        return $this->edit($request, new SignatureAuthenticity());

    }


    #[Route('/signature-authenticity/print/{id}', name: 'app_signature_authenticity_print')]
    public function print(Request $request,SignatureAuthenticity $signatureAuthenticity,PdfService $pdfService): Response
    {

        $html =  $this->renderView('signature_authenticity/print.html.twig',[
            'signature' => $signatureAuthenticity,
        ]);

        $pdfService->orderToPdf($html,$signatureAuthenticity->getLastname());

        return new Response(
            null,
            Response::HTTP_OK,
            ['Content-Type' => 'application/pdf']
        );

    }




}
