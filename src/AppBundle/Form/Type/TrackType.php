<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 22/05/18
 * Time: 16:52
 */

namespace AppBundle\Form\Type;


use AppBundle\Entity\Artist;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrackType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class)
            ->add('duration',IntegerType::class)
            ->add('artist',EntityType::class,array(
                'class'=> Artist::class,
                'choice_label' => 'name',
            ))
            ->add('submit',SubmitType::class);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Track'
        ]);
    }



}