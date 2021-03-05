<?php

namespace App\Controller;

use App\Entity\Forum;
use App\Form\ForumType;
use App\Repository\ForumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ForumController extends AbstractController
{
    /**
     * @Route("/forum", name="forum")
     */
    public function index(): Response
    {
        return $this->render('forum/index.html.twig', [
            'controller_name' => 'ForumController',
        ]);
    }

    /**
     * @param ForumRepository $repository
     * @return Response
     *@Route("/afficherForum",name="afficherForum")
     */
    public function Affiche(ForumRepository $repository){
        //$repo=$this->getDoctrine()->getRepository(Classroom::class);
        $forum=$repository->findAll();
        return $this->render('forum/afficheF.html.twig',

            ['forum'=>$forum]);
    }

    /**
     * @param $id
     * @param ForumRepository $repository
     * @return Response
     * @Route ("/detail/{id}",name="detail")
     */
    public function aff($id,ForumRepository $repository){
        //$repo=$this->getDoctrine()->getRepository(Classroom::class);
        $forum=$repository->find($id);
        return $this->render('forum/detail.html.twig',

            ['forum'=>$forum]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route("/ajoutF",name="ajoutF")
     */
    public function add(Request $request){
        $forum= new Forum();
        $form=$this->createForm(ForumType::class,$forum);
        $form->add('ajouter',SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted()&&$form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($forum);
            $em->flush();
            return $this->redirectToRoute('afficherForum');
        }
        return $this->render('forum/ajoutF.html.twig',[
            'form'=>$form->createView()
        ]);


    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *@Route ("/supp12/{id}",name="supp")
     */
    function delete($id){
        $repo=$this->getDoctrine()->getRepository(Forum::class);
        $forum=$repo->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($forum);
        $em->flush();
        return $this->redirectToRoute('afficherForum');

    }

    /**
     * @param $id
     * @param ForumRepository $repository
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route ("/update/{id}",name="updateF")
     */
    function update($id,ForumRepository $repository,\Symfony\Component\HttpFoundation\Request $request){
        $forum=$repository->find($id);
        $form=$this->createForm(ForumType::class,$forum);
        $form->add('update',SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){

            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute("afficherForum");


        }
        return $this->render('forum/updateF.html.twig',
            [
                'f'=>$form->createView()
            ]);


    }

    /**
     * @param Request $request
     * @param ForumRepository $repository
     * @return Response
     *@Route ("/recherche",name="recherche")
     */
    function Recherche(Request $request,ForumRepository $repository){
        $data=$request->get('search');

        $forum=$repository->findBy(['destination'=>$data]);
        return $this->render('forum/afficheF.html.twig',[
            'forum'=>$forum
        ]);

    }

    /**
     * @param ForumRepository $repository
     * @return Response
     * @Route("/afficherForumAdmin",name="afficherForumAdmin")
     */
    function  afficheadmin (ForumRepository $repository){
        //$repo=$this->getDoctrine()->getRepository(Classroom::class);
        $forum=$repository->findAll();
        return $this->render('forum/afficheAdminF.html.twig',

            ['forum'=>$forum]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route("/ajoutadminF",name="ajoutadminF")
     */
    public function addadmin(Request $request){
        $forum= new Forum();
        $form=$this->createForm(ForumType::class,$forum);
        $form->add('ajouter',SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted()&&$form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($forum);
            $em->flush();
            return $this->redirectToRoute('afficherForumAdmin');
        }
        return $this->render('forum/ajoutadminF.html.twig',[
            'form'=>$form->createView()
        ]);


    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route ("/suppadmin/{id}",name="suppadmin")
     */
    function deleteadmin($id){
    $repo=$this->getDoctrine()->getRepository(Forum::class);
    $forum=$repo->find($id);
    $em=$this->getDoctrine()->getManager();
    $em->remove($forum);
    $em->flush();
    return $this->redirectToRoute('afficherForumAdmin');

        }

    /**
     * @param $id
     * @param ForumRepository $repository
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route ("/updateadmin/{id}",name="updateFadmin")
     */
        function updateadmin($id,ForumRepository $repository,\Symfony\Component\HttpFoundation\Request $request){
        $forum=$repository->find($id);
        $form=$this->createForm(ForumType::class,$forum);
        $form->add('update',SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){

            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('afficherForumAdmin');
        }
        return $this->render('forum/updateFadmin.html.twig',[
            'f'=>$form->createView()
        ]);


    }
}