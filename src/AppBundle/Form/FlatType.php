<?php

namespace AppBundle\Form;

use Acme\DemoLib\Class_With_Underscores;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FlatType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description', TextareaType::class, array( 'attr' => array('rows' => 3)))
            ->add('address')
            ->add('floor')
            ->add('orientation')
            ->add('area')
            ->add('price')
            ->add('rent')
            ->add('charges')
            ->add('energyClass')
            ->add('greenHouseGasEmission')
            ->add('furnished')
            ->add('numberOfRooms')
            ->add('hasTv')
            ->add('hasWashingMachine')
            ->add('isPetsAllowed')
            ->add('hasInternet')
            ->add('hasParking')

            ->add('images', FileType::class, array(
                'label' => false,
                'required' => false,
                'data_class' => null,
            ));
    }

    /**
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
