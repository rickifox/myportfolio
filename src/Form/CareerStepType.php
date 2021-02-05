<?php

namespace App\Form;

use App\Entity\CareerStep;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CareerStepType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('position')
            ->add('company')
            ->add('StartDate')
            ->add('EndDate')
            ->add('description')
            ->add('image', null, [
                'empty_data' => null,
                'choice_label' => 'url',
                ])
                ->add('section', null, [
                    'choice_label' => 'name',
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CareerStep::class,
        ]);
    }
}
