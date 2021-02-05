<?php

// src/Controller/ProgramController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CareerStepRepository;
use App\Repository\SkillRepository;
use App\Repository\SocialRepository;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(SkillRepository $skillRepository,CareerStepRepository $careerStepRepository, SocialRepository $socialRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'website' => 'My Portfolio',
            'frontskills' => $skillRepository->findBySectionName('Front-end'),
            'backskills' => $skillRepository->findBySectionName('Back-end'),
            'otherskills' => $skillRepository->findBySectionName('Other Skills'),
            'softskills' => $skillRepository->findBySectionName('Soft Skills'),
            'careersteps' => $careerStepRepository->findBySectionName('Career Path'),
            'educationalsteps' => $careerStepRepository->findBySectionName('Educational Path'),
            'contacts' => $socialRepository->findBySectionName('Contact'),
         ]);
    }
}