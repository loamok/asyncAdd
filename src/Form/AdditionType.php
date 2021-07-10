<?php

namespace App\Form;

use App\DTO\Addition;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdditionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('a', NumberType::class, [
                'input' => "number",
                'scale' => 0,
                'label' => "Nombre A",
            ])
            ->add('b', NumberType::class, [
                'input' => "number",
                'scale' => 0,
                'label' => "Nombre B",
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Calculer"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Addition::class,
        ]);
    }
}
