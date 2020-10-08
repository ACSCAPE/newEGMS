<?php

namespace App\Form;

use App\Entity\EscapeGame;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EscapeGameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('duration')
            ->add('dateTime')
            ->add('numberMin')
            ->add('numberMax')
            ->add('private')
            ->add('excerpt')
            ->add('categoryName')
            ->add('resumeText')
            ->add('IntroductionText')
            ->add('InstructionsText')
            ->add('happyEndText')
            ->add('gameOverText')
            ->add('user')
            ->add('solution')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EscapeGame::class,
        ]);
    }
}
