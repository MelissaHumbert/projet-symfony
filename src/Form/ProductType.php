<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Region;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         $builder
             ->add('productName', TextType::class, [
                 'label' => 'Nom du Produit:'
             ])

             ->add('productDescription', TextareaType::class, [
                 'label' => 'Description du Produit:'
             ])

             ->add('productPicture', FileType::class, [
                 'label' => 'Photo du Produit:',
                 'data_class' => null
             ])

             ->add('productPrice', NumberType::class, [
                 'label' => 'Prix:'
             ])

            ->add('category',EntityType::class,[
                'class' => Category::class,
                'choice_label' => 'categoryName',
                'label' => 'Catégorie:',
                'required' => true
            ])

            ->add('region', EntityType::class,[
                'class' => Region::class,
                'choice_label' => 'regionName',
                'label' => 'Région:',
                'required' => true
            ])

            ->add('user', EntityType::class,[
                'class' => User::class,
                'choice_label' => 'userName',
                'label' => 'Utilisateurs:',
                'required' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
