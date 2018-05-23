<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 21/05/18
 * Time: 11:53
 */

namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtistType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        /*$builder->addEventListener(FormEvents::PRE_SET_DATA,function(FormEvent $event){
           $artist = $event->getData();
           $form =  $event->getForm();

           if($artist === null || $artist->getId() === null){
               $form->add('type',TextType::class);
           }
        });*/
        $builder
            ->add('name',TextType::class)
            ->add('type',ChoiceType::class,[
                'choices' => [
                    'band' => 1,
                    'solo' => 0
                ]
            ])
            ->add('picture',TextType::class)
            ->add('genre',TextType::class)
            ->add('submit',SubmitType::class);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Artist'
        ]);
    }
}