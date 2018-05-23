<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 17/05/18
 * Time: 15:52
 */

namespace AppBundle\Controller;



use AppBundle\AppBundle;
use AppBundle\Entity\Artist;
use AppBundle\Form\Type\ArtistType;
use AppBundle\Notification\ArtistListener;
use AppBundle\Notification\ArtistNotifier;
use AppBundle\Repository\ArtistRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ArtistController
 * @package AppBundle\Controller
 */
class ArtistController extends Controller
{



    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $artistRepo = $this->get(ArtistRepository::class);
        $artists = $artistRepo->findAll();
        return $this->render('AppBundle:Artist:index.html.twig',array('artists'=>$artists));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Request $request){



        $artistRepo = $this->get(ArtistRepository::class);
        $id = $request->get('id');

        $key = $artistRepo->find($id);


        $artist = $key;

        return $this->render('AppBundle:Artist:show.html.twig',array('artist'=>$artist));

    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function showJsonAction(Request $request){

        $artistRepo = $this->get(ArtistRepository::class);



        $id = $request->get('id');
        $key = $artistRepo->find($id);

        $artist = $key;


        return new JsonResponse($artist);

    }


    public function createAction(Request $request){

        $artist = new Artist();

        $form = $this->createForm(ArtistType::class,$artist);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($artist);
            $em->flush();
            $event = new ArtistNotifier($artist);
            $logger = $this->get('monolog.logger.artist');
            $logger->info('test');

            $this->get('event_dispatcher')->dispatch(ArtistNotifier::ARTIST_CREATED,$event);
            return $this->redirectToRoute('app_artists');
        }
        $formView = $form->createView();


        return $this->render('AppBundle:Artist:new.html.twig',array('form'=>$formView));

    }


    public function updateAction(Request $request,$id){

        $artistRepo = $this->get(ArtistRepository::class);

        $artist = $artistRepo->find($id);

        $form = $this->createForm(ArtistType::class,$artist);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->get('doctrine.orm.entity_manager');

            $em->flush();

            return $this->redirectToRoute('app_artists_param',array('id'=>$id));
        }
        $formView = $form->createView();


        return $this->render('AppBundle:Artist:edit.html.twig',array('form'=>$formView));

    }



}