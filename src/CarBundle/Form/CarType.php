<?php

namespace CarBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class CarType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('price', TextType::class, [
                'required'    => true,
                'constraints' =>
                    [
                        new NotBlank()
                    ]
            ])
            ->add('year', TextType::class, [
                'required'    => true,
                'constraints' =>
                    [
                        new NotBlank()
                    ]
            ])
            ->add('navigation')
            ->add('description')
            ->add('model', EntityType::class, [
                'required' => true,
                'class'    => 'CarBundle\Entity\Model'
            ])
            ->add('make', EntityType::class, [
                'required' => true,
                'class'    => 'CarBundle\Entity\Make'
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class' => 'CarBundle\Entity\Car'
                               ]);
    }
}
