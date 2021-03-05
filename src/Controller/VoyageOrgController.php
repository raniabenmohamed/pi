<?php

namespace App\Controller;

use App\Entity\VoyageOrg;
use App\Form\VoyageOrgType;
use App\Repository\VoyageOrgRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/voyage/org")
 */
class VoyageOrgController extends AbstractController
{
    /**
     * @Route("/", name="voyage_org_indexb", methods={"GET"})
     */
    public function index(VoyageOrgRepository $voyageOrgRepository): Response
    {
        return $this->render('voyage_org/index.html.twig', [
            'voyage_orgs' => $voyageOrgRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="voyage_org_newb", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $voyageOrg = new VoyageOrg();
        $form = $this->createForm(VoyageOrgType::class, $voyageOrg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($voyageOrg);
            $entityManager->flush();

            return $this->redirectToRoute('voyage_org_indexb');
        }

        return $this->render('voyage_org/new.html.twig', [
            'voyage_org' => $voyageOrg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="voyage_org_showb", methods={"GET"})
     */
    public function show(VoyageOrg $voyageOrg): Response
    {
        return $this->render('voyage_org/show.html.twig', [
            'voyage_org' => $voyageOrg,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="voyage_org_editb", methods={"GET","POST"})
     */
    public function edit(Request $request, VoyageOrg $voyageOrg): Response
    {
        $form = $this->createForm(VoyageOrgType::class, $voyageOrg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('voyage_org_indexb');
        }

        return $this->render('voyage_org/edit.html.twig', [
            'voyage_org' => $voyageOrg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="voyage_org_deleteb", methods={"DELETE"})
     */
    public function delete(Request $request, VoyageOrg $voyageOrg): Response
    {
        if ($this->isCsrfTokenValid('delete'.$voyageOrg->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($voyageOrg);
            $entityManager->flush();
        }

        return $this->redirectToRoute('voyage_org_indexb');
    }


    
    /**
     * @Route("/b", name="voyage_org_index", methods={"GET"})
     */
    public function indexb(VoyageOrgRepository $voyageOrgRepository): Response
    {
        return $this->render('voyage_org_back/index.html.twig', [
            'voyage_orgs' => $voyageOrgRepository->findAll(),
        ]);
    }

    /**
     * @Route("/newb", name="voyage_org_new", methods={"GET","POST"})
     */
    public function newb(Request $request): Response
    {
        $voyageOrg = new VoyageOrg();
        $form = $this->createForm(VoyageOrgType::class, $voyageOrg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($voyageOrg);
            $entityManager->flush();

            return $this->redirectToRoute('voyage_org_index');
        }

        return $this->render('voyage_org_back/new.html.twig', [
            'voyage_org' => $voyageOrg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("b/{id}", name="voyage_org_show", methods={"GET"})
     */
    public function showb(VoyageOrg $voyageOrg): Response
    {
        return $this->render('voyage_org_back/show.html.twig', [
            'voyage_org' => $voyageOrg,
        ]);
    }

    /**
     * @Route("/{id}/editb", name="voyage_org_edit", methods={"GET","POST"})
     */
    public function editb(Request $request, VoyageOrg $voyageOrg): Response
    {
        $form = $this->createForm(VoyageOrgType::class, $voyageOrg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('voyage_org_index');
        }

        return $this->render('voyage_org_back/edit.html.twig', [
            'voyage_org' => $voyageOrg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("b/{id}", name="voyage_org_delete", methods={"DELETE"})
     */
    public function deleteb(Request $request, VoyageOrg $voyageOrg): Response
    {
        if ($this->isCsrfTokenValid('delete'.$voyageOrg->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($voyageOrg);
            $entityManager->flush();
        }

        return $this->redirectToRoute('voyage_org_index');
    }
}
