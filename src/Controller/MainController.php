<?php

// src/Controller/ProgramController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Skill;
use App\Repository\SkillRepository;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(SkillRepository $skillRepository): Response
    {
        $skill = $skillRepository->find('13')->getSection();
        dd($skill);
        return $this->render('main/index.html.twig', [
            'website' => 'My Portfolio',
            'frontskills' => $skillRepository->findBy(['section' => 'Front-end']),
            'backskills' => $skillRepository->findBy(['section' => 'Back-end']),
            'otherskills' => $skillRepository->findBy(['section' => 'Other Skills']),
            'softskills' => $skillRepository->findBy(['section' => 'Soft Skills']),
         ]);
    }
}