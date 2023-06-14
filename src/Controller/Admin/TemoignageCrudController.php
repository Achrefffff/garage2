<?php

namespace App\Controller\Admin;

use App\Entity\Temoignage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class TemoignageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Temoignage::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextField::new('prenom'),
            TextEditorField::new('commentaire'),
            IntegerField::new('note'),
            BooleanField::new('isValid'),

        ];
    }
    
}
