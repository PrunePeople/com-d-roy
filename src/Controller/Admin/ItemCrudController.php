<?php

namespace App\Controller\Admin;

use App\Entity\Item;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ItemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Item::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')->setRequired(true),
            SlugField::new('slug')
                ->setTargetFieldName('name')
                ->hideOnIndex(),
            ImageField::new('picture')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads')
                ->setUploadedFileNamePattern('[randomhash],[extension]')
                ->setRequired(false),
            TextareaField::new('description')->hideOnIndex(),
            MoneyField::new('price')->setCurrency('EUR')->setStoredAsCents(false),
            AssociationField::new('categories')
                ->setFormTypeOptions(['by_reference' => false])
                ->hideOnIndex(),
            ArrayField::new('categories')->hideOnForm(),
        ];

    }

}