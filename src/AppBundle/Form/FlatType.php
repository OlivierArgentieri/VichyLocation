<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FlatType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')->add('address')->add('floor')->add('orientation')->add('area')->add('price')->add('rent')->add('charges')->add('energyClass')->add('greenHouseGasEmission')->add('furnished')->add('numberOfRooms')->add('hasTv')->add('hasWashingMachine')->add('isPetsAllowed')->add('hasInternet')->add('hasParking');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Flat'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_flat';
    }


}
