<?php

namespace App\Form;

use App\Entity\VoyageOrg;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoyageOrgType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ref')
            ->add('titre')
            ->add('description')
            ->add('date_debut')
            ->add('date_fin')
            ->add('destination')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => VoyageOrg::class,
        ]);
    }
}
