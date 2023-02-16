<?php

namespace App\Form;

use App\Entity\TypeAppart;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;



class TypeAppartType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', TextType::class, ['attr' => ['class' => "form-control mb-4"]])
            ->add('description', TextareaType::class, ['attr' => ['class' => "form-control mb-4"]])
            ->add('dateCreation', DateTimeType::class, ['attr' => ['class' => "form-control mb-4"]])
            ->add('isActive');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TypeAppart::class,
        ]);
    }
}
