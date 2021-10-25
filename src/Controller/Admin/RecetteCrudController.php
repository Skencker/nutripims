<?php

namespace App\Controller\Admin;

use App\Entity\Recette;
use Aws\Credentials\CredentialProvider;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Vich\UploaderBundle\Form\Type\VichImageType;

use Aws\S3\S3Client;
use Aws\Exception\AwsException;


class RecetteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recette::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            SlugField::new('slug')->setTargetFieldName('name'),
            AssociationField::new('category'),
            TextField::new('imageFile')->setFormType(VichImageType::class),
                // ->onlyWhenCreating(),
            ImageField::new('file')
                // ->setUploadDir('public/uploads/images')
                ->setBasePath('/uploads/images/')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false)
                ->onlyOnIndex(),
            TextareaField::new('ingredients'),
            TextareaField::new('description'),
            IntegerField::new('time'),
            IntegerField::new('nbrperson')
        ];
    }
    
}
// textField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            
// ImageField::new('file')->setBasePath('/uploads/illustrations/')->onlyOnIndex()

