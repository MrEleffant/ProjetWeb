<?php

namespace App\Form;

use App\Entity\Habitant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType; // Import DateType from Symfony
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HabitantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('genre', ChoiceType::class, [
                'label' => "Genre :",
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control', 'data-toggle' => 'select2', 'data-width' => '100%'],
                'choices' => [
                    'Homme' => 'Homme',
                    'Femme' => 'Femme',
                    'Non-binaire' => 'Non-binaire',
                    'Agender' => 'Agender',
                    'Bigenre' => 'Bigenre',
                ]
            ])
            ->add('adresse')
            ->add('date_naissance', DateType::class, [
                'widget' => 'choice',
                'years' => range(date('Y') - 100, date('Y'))
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Habitant::class,
        ]);
    }
}
