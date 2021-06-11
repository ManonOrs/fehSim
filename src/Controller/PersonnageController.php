<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Personnage;
use App\Repository\PersonnageRepository;
use App\Entity\SkillSet;
use App\Repository\SkillSetRepository;
use App\Entity\Skill;
use App\Repository\SkillRepository;
use App\Entity\Arme;
use App\Repository\ArmeRepository;
use App\Entity\Support;
use App\Repository\SupportRepository;
use App\Entity\Restriction;
use App\Repository\RestrictionRepository;
use Symfony\Component\HttpFoundation\Request;


class PersonnageController extends AbstractController
{
    /**
     * @Route("/personnage", name="personnage")
     */
    public function index(): Response
    {
        $persoRepository = $this->getDoctrine()->getRepository(Personnage::class);

        $personnages = $persoRepository->findAll();

        return $this->render('personnage/index.html.twig', [
            'controller_name' => 'PersonnageController',
            'personnages' => $personnages
        ]);
    }

     /**
     * @Route("/personnage/{id}", name="afficher_personnage")
     */
    public function affichgerPersonnage(int $id, Request $request): Response {
    
        $persoRepository = $this->getDoctrine()->getRepository(Personnage::class);

        $personnage = $persoRepository->find($id);

        return $this->render('personnage/afficherPerso.html.twig', [
            'controller_name' => 'PersonnageController',
            'personnage' => $personnage
        ]);
    }


}
