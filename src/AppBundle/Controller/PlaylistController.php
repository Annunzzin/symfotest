<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 21/05/18
 * Time: 09:47
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Playlist;
use AppBundle\Form\Type\PlaylistType;
use AppBundle\Playlist\DurationCalculator;
use AppBundle\Repository\PlaylistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PlaylistController extends Controller
{

    public function indexAction(){

        $playlistRepository = $this->get(PlaylistRepository::class);

        $playlists = $playlistRepository->findAll();
        return $this->render('AppBundle:Playlist:index.html.twig',array("playlists"=>$playlists));


    }

    public function showAction(Request $request){

        $playlistRepository = $this->get(PlaylistRepository::class);

        //$calculator = $this->get(DurationCalculator::class);


        $id = $request->get('id');

        $key = $playlistRepository->find($id);

        $playlist = $key;

        return $this->render('AppBundle:Playlist:show.html.twig',array("playlist"=>$playlist));

    }


    public function createAction(Request $request){

        $playlist = new Playlist();

        $form = $this->createForm(PlaylistType::class,$playlist);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($playlist);
            $em->flush();

            return $this->redirectToRoute('app_playlists');
        }
        $formView = $form->createView();


        return $this->render('AppBundle:Playlist:new.html.twig',array('form'=>$formView));

    }


    public function updateAction(Request $request,$id){


        $playlistRepo = $this->get(PlaylistRepository::class);
        $playlist = $playlistRepo->find($id);

        $form = $this->createForm(PlaylistType::class,$playlist);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->get('doctrine.orm.entity_manager');
            $em->flush();

            return $this->redirectToRoute('app_playlists_param',array('id'=>$id));
        }
        $formView = $form->createView();


        return $this->render('AppBundle:Playlist:edit.html.twig',array('form'=>$formView));










    }





}