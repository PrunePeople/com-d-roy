<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoryFixtures extends Fixture
{
    public const CATEGORY_REFERENCE_1 = 'ENTREE'; //
    public const CATEGORY_REFERENCE_2 = 'PLAT'; //
    public const CATEGORY_REFERENCE_3 = 'DESSERT'; //
    public const CATEGORY_REFERENCE_4 = 'SUGGESTION'; //
    public const CATEGORY_REFERENCE_5 = 'GLACE'; //
    public const CATEGORY_REFERENCE_6 = 'INCONTOURNABLE'; //
    public const CATEGORY_REFERENCE_7 = 'INATTENDU'; //
    public const CATEGORY_REFERENCE_8 = 'INTERDITE'; //
    public const CATEGORY_REFERENCE_9 = 'SORBET'; //
    public const CATEGORY_REFERENCE_10 = 'BOISSON'; //
    public const CATEGORY_REFERENCE_11 = 'COCKTAIL'; //
    public const CATEGORY_REFERENCE_12 = 'SANS ALCOOL'; //
    public const CATEGORY_REFERENCE_13 = 'ALCOOL'; //
    public const CATEGORY_REFERENCE_14 = 'BIERE'; //
    public const CATEGORY_REFERENCE_15 = 'VIN'; //
    public const CATEGORY_REFERENCE_16 = 'CHAMPAGNE'; //
    public const CATEGORY_REFERENCE_17 = 'DIGESTIF'; //
    public const CATEGORY_REFERENCE_18 = 'WHISKY'; //
    public const CATEGORY_REFERENCE_19 = 'RHUM'; //
    public const CATEGORY_REFERENCE_20 = 'SOFT'; //
    public const CATEGORY_REFERENCE_21 = 'BOISSON CHAUDE'; //
    public const CATEGORY_REFERENCE_22 = 'ROUGE'; //
    public const CATEGORY_REFERENCE_23 = 'BLANC MOELLEUX'; //
    public const CATEGORY_REFERENCE_24 = 'BLANC SEC'; //
    public const CATEGORY_REFERENCE_25 = 'ROSE'; //
    public const CATEGORY_REFERENCE_26 = 'APERITIF'; //
    



    private $categoryNames = [
        'Entrée',
        'Plat',
        'Dessert',
        'Suggestion',
        'Glace',
        'Incontournable',
        'Inattendu',
        'Interdite',
        'Sorbet',
        'Boisson',
        'Cocktail',
        'Sans Alcool',
        'Alcool',
        'Bière',
        'Vin',
        'Champagne',
        'Digestif',
        'Whisky',
        'Rhum',
        'Soft',
        'Boisson Chaude',
        'Rouge',
        'Blanc moelleux',
        'Blanc sec',
        'Rosé',
        'Apéritif',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach ($this->categoryNames as $index => $name) {
            $category = new Category();
            $category->setName($name);
            $referenceConstant = constant('self::CATEGORY_REFERENCE_' . ($index + 1));
            $this->addReference($referenceConstant, $category);
            $manager->persist($category);
        }

        $manager->flush();
    }
}