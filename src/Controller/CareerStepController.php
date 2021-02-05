<?php

namespace App\Controller;

use App\Entity\CareerStep;
use App\Form\CareerStepType;
use App\Repository\CareerStepRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;

/**
 * @Route("/careerstep")
 */
class CareerStepController extends AbstractController
{
    /**
     * @Route("/", name="career_step_index", methods={"GET"})
     */
    public function index(CareerStepRepository $careerStepRepository): Response
    {
        return $this->render('career_step/index.html.twig', [
            'career_steps' => $careerStepRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="career_step_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $careerStep = new CareerStep();
        $form = $this->createForm(CareerStepType::class, $careerStep);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($careerStep);
            $entityManager->flush();

            return $this->redirectToRoute('career_step_index');
        }

        return $this->render('career_step/new.html.twig', [
            'career_step' => $careerStep,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="career_step_show", methods={"GET"})
     */
    public function show(CareerStep $careerStep): Response
    {
        return $this->render('career_step/show.html.twig', [
            'career_step' => $careerStep,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="career_step_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CareerStep $careerStep): Response
    {
        $form = $this->createForm(CareerStepType::class, $careerStep);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('career_step_index');
        }

        return $this->render('career_step/edit.html.twig', [
            'career_step' => $careerStep,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="career_step_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CareerStep $careerStep): Response
    {
        if ($this->isCsrfTokenValid('delete'.$careerStep->getId(), $request->request->get('_token'))) {
            $filesystem = new Filesystem();
            $filePath = './uploads/'.$careerStep->getImage()->getUrl();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($careerStep);
            $entityManager->flush();
            try {
                $filesystem->remove([$filePath]);
            } catch (IOExceptionInterface $exception) {
                echo "An error occurred while removing your image at ".$exception->getPath();
            }
        }

        return $this->redirectToRoute('career_step_index');
    }
}
