<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
                'attr'=>[
                    'class' =>'form-control mt-3 mb-3',
                ],
                'label'=> 'Nom',
                'required'=> true
            ])
            ->add('prenom' ,TextType::class,[
                'attr'=>[
                    'class' =>'form-control mt-3 mb-3',
                ],
                'label'=> 'Prenom',
                'required'=> true
            ])
            ->add('email',TextType::class,[
                'attr'=>[
                    'class' =>'form-control mt-3 mb-3',
                ],
                'label'=> 'Adresse Email',
                'required'=> true
            ])
            ->add('telephone',TextType::class,[
                'attr'=>[
                    'class' =>'form-control mt-3 mb-3',
                ],
                'label'=> 'Numero de telephone',
                'required'=> true
            ])
            ->add('message',TextType::class,[
                'attr'=>[
                    'class' =>'form-control mt-3 mb-3',
                ],
                'label'=> 'Votre message',
                'required'=> true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
