<?php
namespace Store\AdminBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class)
            ->add('price',NumberType::class)
            ->add('Category', 'document', array(
            'class'=> 'StoreCoreBundle:Category',
            'property'=> 'name',
            'multiple'=> false))
            ->add('save', SubmitType::class)
        ;
    }
}
