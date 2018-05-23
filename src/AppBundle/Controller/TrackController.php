<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 17/05/18
 * Time: 15:52
 */

namespace AppBundle\Controller;



use AppBundle\Entity\Track;
use AppBundle\Form\Type\TrackType;
use AppBundle\Repository\TrackRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class TrackController extends Controller
{



    public function indexAction()
    {

        $trackRepository = $this->get(TrackRepository::class);

        $tracks = $trackRepository->findAll();
        return $this->render('AppBundle:Track:index.html.twig',array("tracks"=>$tracks));


    }


    public function showAction(Request $request){

        $trackRepository = $this->get(TrackRepository::class);


        $id = $request->get('id');
        $key = $trackRepository->find($id);

        $track = $key;
        return $this->render('AppBundle:Track:show.html.twig',array('track'=>$track));


    }


    public function createAction(Request $request){

        $track = new Track();

        $form = $this->createForm(TrackType::class,$track);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($track);
            $em->flush();


            return $this->redirectToRoute('app_tracks');
        }
        $formView = $form->createView();


        return $this->render('AppBundle:Track:new.html.twig',array('form'=>$formView));
    }


    public function updateAction(Request $request,$id){

        $trackRepo = $this->get(TrackRepository::class);

        $track = $trackRepo->find($id);

        $form = $this->createForm(TrackType::class,$track);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->get('doctrine.orm.entity_manager');

            $em->flush();

            return $this->redirectToRoute('app_tracks_param',array('id'=>$id));
        }
        $formView = $form->createView();


        return $this->render('AppBundle:Track:edit.html.twig',array('form'=>$formView));

    }




    public function saveIdAction(Request $request){

        $id = $request->get('id');

        $session = new Session();

        $session->start();
        $session->set('id',$id);
    }

    public function showJsonAction(Request $request){

        $trackRepository = $this->get(TrackRepository::class);

        $tracks = $trackRepository->findAll();

        $id = $request->get('id');
        $key = $trackRepository->find($id);

        $track = $key;


        return new JsonResponse($track);



    }




    protected function returnTracksJson(){
        $trackRepository = $this->get(TrackRepository::class);

        $tracks = $trackRepository->findAll();

        return json_encode($tracks);

    }





}