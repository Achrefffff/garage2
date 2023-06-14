<?php

namespace App\Controller\Admin;

use App\Entity\Voiture;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;






class VoitureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Voiture::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
             TextField::new('nom'),
             IntegerField::new('prix'),
             TextField::new('dateCirculation'),
             IntegerField::new('kilometrage'),
             TextField::new('options'),
             TextField::new('caracteristiques'),           
             TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
             TextField::new('equipement'),
             ImageField::new('imageName')->setBasePath('/images/voitures/')->OnlyOnIndex(),
             
            

        ];
    }
    
}
