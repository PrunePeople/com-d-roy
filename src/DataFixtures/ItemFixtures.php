<?php

namespace App\DataFixtures;

use App\Entity\Item;
use App\DataFixtures\CategoryFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ItemFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $arr_suggestion = array();

        // ENTREE
        //--

        $name1_0 = 'Samoussa au porc';
        $price1_0 = 10.99;
        $name1_1 = 'Les 9 Huîtres du Bassin d\'Arcachon';
        $price1_1 = 15.99;
        $name1_2 = 'Crème brulée au reblochon et glace au foie gras';
        $price1_2 = 7.99;
        $name1_3 = 'Profiteroles au saumon fumé, crème citronnée';
        $price1_3 = 11.99;
        $name1_4 = 'Soupe de poisson au piment d\'espelette';
        $price1_4 = 11.5;
        $name1_5 = 'Les 6 Huîtres N°3 du Bassin d\'Arcachon « Catherine Roux »';
        $price1_5 = 9.5;
        $name1_6 = 'Les 12 huitres N°3 du Bassin d\'Arcachon « Catherine Roux »';
        $price1_6 = 18.0;
        $name1_7 = "Croustillant de chèvre au miel, jambon de pays";
        $price1_7 = 10.0;
        $name1_8 = "Graviax de saumon";
        $price1_8 = 14.0;
        $name1_9 = "6 escargots de Bourgogne farcis à l'ail et persil";
        $price1_9 = 9.0;
        $name1_10 = "Crème brûlée au reblochon, glace au Foie Gras";
        $price1_10 = 14.0;
        $name1_11 = "Profiteroles au saumon fumé, crème citronnée, sorbet citron vert";
        $price1_11 = 12.0;
        $name1_12 = "Tarte fine aux asperges, jambon de Serano"; // SUGGESTION
        $price1_12 = 11.0;
        $name1_13 = "Oeuf cocotte savoyard"; // SUGGESTION
        $price1_13 = 8.0;
        $name1_14 = "Croustillant de brie à la tomate séchée"; // SUGGESTION
        $price1_14 = 8.5;

        //Suggestions push
        //--
        $arr_suggestion = [];
        array_push(
            $arr_suggestion,
            $name1_12,
            $price1_12,
            $name1_13,
            $price1_13,
            $name1_14,
            $price1_14
        );

        $nbrOfEntrees = 15;

        for ($i = 0; $i < $nbrOfEntrees; $i++) {
            $item = new Item();
            $item->setName(${'name1_' . $i});
            $item->setPrice(${'price1_' . $i});
            $item->setSlug($item->getName());
            // ENTREE
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_1));
            if (in_array($item->getName(), $arr_suggestion)) {
                // SUGGESTION
                $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_4));
            }
            $manager->persist($item);
        }

        // PLATS
        //--

        $name2_0 = "Cuisse de poulet, semoule & légumes";
        $price2_0 = 15.99;
        $name2_1 = "Jarrêt de porc, crème aux morilles";
        $price2_1 = 17.99;
        $name2_2 = "Croustillant de saumon aux épinards et linguines";
        $price2_2 = 14.99;
        $name2_3 = "Viande ou poisson";
        $price2_3 = 9.99;
        $name2_4 = "Frites maison ou riz";
        $price2_4 = 8.99;
        $name2_5 = "Saint Félicien rôti sur pommes de terre, charcuterie, salade";
        $price2_5 = 22.0;
        $name2_6 = "Epoisses rôtie, jambon de pays";
        $price2_6 = 24.0;
        $name2_7 = "Filet de Boeuf Charolais, sauce poivre";
        $price2_7 = 27.0;
        $name2_8 = "Carpaccio de Boeuf sauce pesto";
        $price2_8 = 19.0;
        $name2_9 = "Souris d'agneau confite au miel";
        $price2_9 = 26.0;
        $name2_10 = "Dos de Cabillaud et chorizo";
        $price2_10 = 24.0;
        $name2_11 = "Croustillant de saumon aux épinards, linguines";
        $price2_11 = 22.0;
        $name2_12 = "Tête de veau, sauce gribiche"; // SUGGESTION
        $price2_12 = 22.0;
        $name2_13 = "Steack de thon rouge, concassés de tomate"; // SUGGESTION
        $price2_13 = 28.0;
        $name2_14 = "Aile de raie aux câpres"; // SUGGESTION
        $price2_14 = 24.0;
        $name2_15 = "Poélée de palourdes, linguines"; // SUGGESTION
        $price2_15 = 24.0;
        $name2_16 = "Brandade de morue"; // SUGGESTION
        $price2_16 = 19.0;
        $name2_17 = "Pavé de lieu, sauce colombo"; // SUGGESTION
        $price2_17 = 17.0;

        $nbrOfPlats = 18;

        $arr_suggestion = [];
        array_push(
            $arr_suggestion,
            $name2_12,
            $price2_12,
            $name2_13,
            $price2_13,
            $name2_14,
            $price2_14,
            $name2_15,
            $price2_15,
            $name2_16,
            $price2_16,
            $name2_17,
            $price2_17
        );

        for ($i = 0; $i < $nbrOfPlats; $i++) {
            $item = new Item();
            $item->setName(${'name2_' . $i});
            $item->setPrice(${'price2_' . $i});
            $item->setSlug($item->getName());
            // PLATS
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_2));
            if (in_array($item->getName(), $arr_suggestion)) {
                // Suggestion
                $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_4));
            }
            $manager->persist($item);
        }

        // DESSERTS
        //--

        $name3_0 = "Mousse au citron";
        $price3_0 = 6.99;
        $name3_1 = "Panna cotta et menthe";
        $price3_1 = 7.99;
        $name3_2 = "Coupe de Glace au choix";
        $price3_2 = 8.99;
        $name3_3 = "Dessert au choix";
        $price3_3 = 7.99;
        $name3_4 = "Glace 2 boules ou Dessert du jour";
        $price3_4 = 8.99;
        $name3_5 = "Panna cotta, coulis de fruits rouges";
        $price3_5 = 8.0;
        $name3_6 = "Mousse au chocolat";
        $price3_6 = 7.0;
        $name3_7 = "Tarte amandine aux poires";
        $price3_7 = 8.0;
        $name3_8 = "Moelleux au chocolat, glace vanille";
        $price3_8 = 8.0;
        $name3_9 = "Mousse citron mascarpone";
        $price3_9 = 7.0;
        $name3_10 = "Carpaccio d'ananas et glace Rhum Raisins"; // SUGGESTION
        $price3_10 = 9.0;
        $name3_11 = "Marquise au chocolat & sorbet à la framboise"; // SUGGESTION
        $price3_11 = 8.0;
        $name3_12 = "Forêt noire, new look"; // SUGGESTION
        $price3_12 = 9.0;

        $nbrOfDesserts = 13;

        $arr_suggestion = [];
        array_push(
            $arr_suggestion,
            $name3_10,
            $price3_10,
            $name3_11,
            $price3_11,
            $name3_12,
            $price3_12
        );

        for ($i = 0; $i < $nbrOfDesserts; $i++) {
            $item = new Item();
            $item->setName(${'name3_' . $i});
            $item->setPrice(${'price3_' . $i});
            $item->setSlug($item->getName());

            // DESSERTS
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_3));
            if (in_array($item->getName(), $arr_suggestion)) {
                // SUGGESTION
                $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_4));
            }
            $manager->persist($item);
        }

        // GLACES
        //--

        $name4_0 = "La Dame Blanche"; // INCONTOURNABLE
        $price4_0 = 7.9;
        $name4_1 = "Le Chocolat Liégeois"; // INCONTOURNABLE
        $price4_1 = 7.9;
        $name4_2 = "Le Café Liégeois"; // INCONTOURNABLE
        $price4_2 = 7.9;
        $name4_3 = "La Coupe Iceberg"; // INCONTOURNABLE
        $price4_3 = 7.9;
        $name4_4 = "La Tropicale"; // INCONTOURNABLE
        $price4_4 = 7.9;

        $arr_incontournable = [];
        array_push(
            $arr_incontournable,
            $name4_0,
            $price4_0,
            $name4_1,
            $price4_1,
            $name4_2,
            $price4_2,
            $name4_3,
            $price4_3,
            $name4_4,
            $price4_4
        );


        $name4_5 = "La Mars"; // INNATENDU
        $price4_5 = 8.9;
        $name4_6 = "La Coupe M&M's"; // INNATENDU
        $price4_6 = 8.9;
        $name4_7 = "La Kit Kat"; // INNATENDU
        $price4_7 = 8.9;
        $name4_8 = "La Brownies"; // INNATENDU
        $price4_8 = 8.9;
        $name4_9 = "La Bambino"; // INNATENDU
        $price4_9 = 8.9;
        $name4_10 = "La Bounty"; // INNATENDU
        $price4_10 = 8.9;

        $arr_innatendu = [];
        array_push(
            $arr_innatendu,
            $name4_5,
            $price4_5,
            $name4_6,
            $price4_6,
            $name4_7,
            $price4_7,
            $name4_8,
            $price4_8,
            $name4_9,
            $price4_9,
            $name4_10,
            $price4_10
        );

        $name4_11 = "L'After-Eight"; // INTERDITE
        $price4_11 = 9.9;
        $name4_12 = "La Colonel"; // INTERDITE
        $price4_12 = 9.9;
        $name4_13 = "L'Hawaï"; // INTERDITE
        $price4_13 = 9.9;
        $name4_14 = "La Normande"; // INTERDITE
        $price4_14 = 9.9;

        $arr_interdite = [];
        array_push(
            $arr_interdite,
            $name4_11,
            $price4_11,
            $name4_12,
            $price4_12,
            $name4_13,
            $price4_13,
            $name4_14,
            $price4_14
        );

        $name4_15 = "Bimbo";
        $price4_15 = 4.9;
        $name4_16 = "Brownies";
        $price4_16 = 4.9;
        $name4_17 = "Bubble gum";
        $price4_17 = 4.9;
        $name4_18 = "Café";
        $price4_18 = 4.9;
        $name4_19 = "Caramel beurre salé";
        $price4_19 = 4.9;
        $name4_20 = "Chocolat";
        $price4_20 = 4.9;
        $name4_21 = "Menthe chocolat";
        $price4_21 = 4.9;
        $name4_22 = "Menthe";
        $price4_22 = 4.9;
        $name4_23 = "Noix de coco";
        $price4_23 = 4.9;
        $name4_24 = "Pistache";
        $price4_24 = 4.9;
        $name4_25 = "Pruneau Armagnac";
        $price4_25 = 4.9;
        $name4_26 = "Rhum raisin";
        $price4_26 = 4.9;
        $name4_27 = "Vanille";
        $price4_27 = 4.9;
        $name4_28 = "Abricot"; // SORBET
        $price4_28 = 4.9;
        $name4_29 = "Cassis"; // SORBET
        $price4_29 = 4.9;
        $name4_30 = "Citron vert"; // SORBET
        $price4_30 = 4.9;
        $name4_31 = "Fraise"; // SORBET
        $price4_31 = 4.9;
        $name4_32 = "Framboise"; // SORBET
        $price4_32 = 4.9;
        $name4_33 = "Passion"; // SORBET
        $price4_33 = 4.9;
        $name4_34 = "Poire"; // SORBET
        $price4_34 = 4.9;
        $name4_35 = "Pomme verte"; // SORBET
        $price4_35 = 4.9;

        $arr_sorbet = [];
        array_push(
            $arr_sorbet,
            $name4_28,
            $price4_28,
            $name4_29,
            $price4_29,
            $name4_30,
            $price4_30,
            $name4_31,
            $price4_31,
            $name4_32,
            $price4_32,
            $name4_33,
            $price4_33,
            $name4_34,
            $price4_34,
            $name4_35,
            $price4_35
        );


        $nbrOfGlaces = 36;

        for ($i = 0; $i < $nbrOfGlaces; $i++) {
            $item = new Item();
            $item->setName(${'name4_' . $i});
            $item->setPrice(${'price4_' . $i});
            $item->setSlug($item->getName());
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_5));
            // GLACES
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_5));
            if (in_array($item->getName(), $arr_incontournable)) {
                // INCONTORNABLES
                $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_6));
            }
            if (in_array($item->getName(), $arr_innatendu)) {
                // INATTENDUS
                $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_7));
            }
            if (in_array($item->getName(), $arr_interdite)) {
                // INTERDITES
                $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_8));
            }
            if (in_array($item->getName(), $arr_sorbet)) {
                // SORBETS
                $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_9));
            }
            $manager->persist($item);
        }


        //BOISSONS
        //--

        $name5_0 = 'Bora Bora'; // COCKTAILS // SANSALCOOL
        $price5_0 = 6.5;
        $name5_1 = 'Cendrillon'; // COCKTAILS // SANSALCOOL
        $price5_1 = 6.5;
        $name5_2 = 'Virgin Cherry Banane'; // COCKTAILS // SANSALCOOL
        $price5_2 = 6.5;

        $arr_sansalcool = [];
        array_push(
            $arr_sansalcool,
            $name5_0,
            $price5_0,
            $name5_1,
            $price5_1,
            $name5_2,
            $price5_2
        );

        $name5_3 = 'Pina colada'; // COCKTAILS // ALCOOL
        $price5_3 = 8.5;
        $name5_4 = 'Blue Lagoon'; // COCKTAILS // ALCOOL
        $price5_4 = 8.5;
        $name5_5 = 'Planteur'; // COCKTAILS // ALCOOL
        $price5_5 = 8.5;
        $name5_6 = 'Bananarama'; // COCKTAILS // ALCOOL
        $price5_6 = 8.5;
        $name5_7 = 'Cuba Libre'; // COCKTAILS // ALCOOL
        $price5_7 = 8.5;
        $name5_8 = 'Marguerita'; // COCKTAILS // ALCOOL
        $price5_8 = 8.5;
        $price5_8 = 8.5;
        $name5_9 = 'La Jacqueline'; // COCKTAILS // ALCOOL
        $price5_9 = 8.5;
        $name5_10 = 'Grand Canyon'; // COCKTAILS // ALCOOL
        $price5_10 = 8.5;
        $name5_11 = 'Erobika'; // COCKTAILS // ALCOOL
        $price5_11 = 8.5;
        $name5_12 = 'Schtroumpf'; // COCKTAILS // ALCOOL
        $price5_12 = 8.5;

        $arr_alcool = [];
        array_push(
            $arr_alcool,
            $name5_3,
            $price5_3,
            $name5_4,
            $price5_4,
            $name5_5,
            $price5_5,
            $name5_6,
            $price5_6,
            $name5_7,
            $price5_7,
            $name5_8,
            $price5_8,
            $name5_9,
            $price5_9,
            $name5_10,
            $price5_10,
            $name5_11,
            $price5_11,
            $name5_12,
            $price5_12
        );

        $arr_cocktail = [];
        array_push(
            $arr_cocktail,
            $name5_0,
            $price5_0,
            $name5_1,
            $price5_1,
            $name5_2,
            $price5_2,
            $name5_3,
            $price5_3,
            $name5_4,
            $price5_4,
            $name5_5,
            $price5_5,
            $name5_6,
            $price5_6,
            $name5_7,
            $price5_7,
            $name5_8,
            $price5_8,
            $name5_9,
            $price5_9,
            $name5_10,
            $price5_10,
            $name5_11,
            $price5_11,
            $name5_12,
            $price5_12
        );

        for ($i = 0; $i < count($arr_cocktail); $i += 2) {
            $item = new Item();
            $item->setName($arr_cocktail[$i]);
            $item->setPrice($arr_cocktail[$i + 1]);
            $item->setSlug($item->getName());

            // BOISSON
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_10));
            // COCKTAILS
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_11));
            if (in_array($item->getName(), $arr_sansalcool)) {
                // SANSALCOOL
                $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_12));
            }
            if (in_array($item->getName(), $arr_alcool)) {
                // ALCOOL
                $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_13));
            }
            $manager->persist($item);
        }


        // BIERE
        //--

        $name5_13 = 'Bière pression 1664 25 cl'; // BIERE
        $price5_13 = 3.5;
        $name5_14 = 'Bière pression 1664 33 cl'; // BIERE
        $price5_14 = 4.5;
        $name5_15 = 'Bière pression 1664 50 cl'; // BIERE
        $price5_15 = 6.0;
        $name5_16 = 'Bière pression Grimbergen 25 cl'; // BIERE
        $price5_16 = 4.5;
        $name5_17 = 'Bière pression Grimbergen 33 cl'; // BIERE
        $price5_17 = 5.5;
        $name5_18 = 'Bière pression Grimbergen 50 cl'; // BIERE
        $price5_18 = 8.0;
        $name5_19 = 'Grimbergen blue - bouteille de 33 cl'; // BIERE
        $price5_19 = 5.5;


        $arr_bieres = [
            $name5_13,
            $price5_13,
            $name5_14,
            $price5_14,
            $name5_15,
            $price5_15,
            $name5_16,
            $price5_16,
            $name5_17,
            $price5_17,
            $name5_18,
            $price5_18,
            $name5_19,
            $price5_19,
        ];

        for ($i = 0; $i < count($arr_bieres); $i += 2) {
            $item = new Item();
            $item->setName($arr_bieres[$i]);
            $item->setPrice($arr_bieres[$i + 1]);
            $item->setSlug($item->getName());
            // BOISSON
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_10));
            //BIERE
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_14));
            $manager->persist($item);
        }

        // WHISKIES
        //--

        $name5_20 = 'Whisky Clan campbell 4 cl'; // WHISKIES
        $price5_20 = 6.0;
        $name5_21 = 'Paddy Irish whiskey 4 cl'; // WHISKIES
        $price5_21 = 6.0;
        $name5_22 = 'Jack Daniel\'s 4 cl'; // WHISKIES
        $price5_22 = 7.0;
        $name5_23 = 'Aberlour 4 cl'; // WHISKIES
        $price5_23 = 7.0;
        $name5_25 = 'Chivas Regal scotch whisky 4 cl'; // WHISKIES
        $price5_25 = 8.5;
        $name5_26 = 'Glenfiddich 4 cl'; // WHISKIES
        $price5_26 = 8.5;


        $arr_whiskies = [
            $name5_20,
            $price5_20,
            $name5_21,
            $price5_21,
            $name5_22,
            $price5_22,
            $name5_23,
            $price5_23,
            $name5_25,
            $price5_25,
            $name5_26,
            $price5_26,
        ];

        for ($i = 0; $i < count($arr_whiskies); $i += 2) {
            $item = new Item();
            $item->setName($arr_whiskies[$i]);
            $item->setPrice($arr_whiskies[$i + 1]);
            $item->setSlug($item->getName());
            // BOISSON
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_10));
            //WHISKIES
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_18));
            $manager->persist($item);
        }


        // APERITIFS
        //--

        $name5_27 = 'Cidre brut 25 cl'; // APERITIFS
        $price5_27 = 4.9;
        $name5_28 = 'Kir au vin blanc (cassis, pêche, mûre) 12 cl'; // APERITIFS
        $price5_28 = 4.5;
        $name5_29 = 'Ricard 2 cl'; // APERITIFS
        $price5_29 = 4.0;
        $name5_30 = 'Pastis 51 2 cl'; // APERITIFS
        $price5_30 = 4.0;
        $name5_31 = 'Berger blanc 2 cl'; // APERITIFS
        $price5_31 = 4.0;
        $name5_32 = 'Martini rouge ou blanc 5 cl'; // APERITIFS
        $price5_32 = 5.0;
        $name5_33 = 'Pineau des charentes (blanc ou rouge) 4 cl'; // APERITIFS
        $price5_33 = 5.0;
        $name5_34 = 'Lillet (blanc, rouge ou rosé) 4 cl'; // APERITIFS
        $price5_34 = 5.0;
        $name5_35 = 'Porto (blanc ou rouge) 4 cl'; // APERITIFS
        $price5_35 = 5.0;


        $arr_aperitifs = [
            $name5_27,
            $price5_27,
            $name5_28,
            $price5_28,
            $name5_29,
            $price5_29,
            $name5_30,
            $price5_30,
            $name5_31,
            $price5_31,
            $name5_32,
            $price5_32,
            $name5_33,
            $price5_33,
            $name5_34,
            $price5_34,
            $name5_35,
            $price5_35,
        ];

        for ($i = 0; $i < count($arr_aperitifs); $i += 2) {
            $item = new Item();
            $item->setName($arr_aperitifs[$i]);
            $item->setPrice($arr_aperitifs[$i + 1]);
            $item->setSlug($item->getName());
            // BOISSON
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_10));
            // APERITIFS
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_26));
            $manager->persist($item);
        }


        // SOFTS
        //--

        $name5_36 = 'Jus de fruits PAGO 20 cl'; // SOFTS
        $price5_36 = 4.0;
        $name5_37 = 'Coca cola / Coca cola zéro 33 cl'; // SOFTS
        $price5_37 = 4.0;
        $name5_38 = 'Orangina 25 cl'; // SOFTS
        $price5_38 = 4.0;
        $name5_39 = 'Perrier 33 cl'; // SOFTS
        $price5_39 = 4.0;
        $name5_40 = 'Ice-tea 25 cl'; // SOFTS
        $price5_40 = 4.0;
        $name5_41 = 'Sirop à l\'eau 25 cl'; // SOFTS
        $price5_41 = 3.0;
        $name5_42 = 'Limonade 25 cl'; // SOFTS
        $price5_42 = 4.0;
        $name5_43 = 'Diabolo 25 cl'; // SOFTS
        $price5_43 = 4.5;
        $name5_44 = 'Schweppes agrumes 25 cl'; // SOFTS
        $price5_44 = 4.0;
        $name5_45 = 'Schweppes tonic 25 cl'; // SOFTS
        $price5_45 = 4.0;
        $name5_47 = 'Bière bouteille sans alcool 25 cl'; // SOFTS
        $price5_47 = 4.9;
        $name5_48 = 'Abatilles gazeuse ou plate 1L'; // SOFTS
        $price5_48 = 5.0;
        $name5_49 = 'Abatilles gazeuse ou plate 0,50 L'; // SOFTS
        $price5_49 = 4.0;


        $arr_softs = [
            $name5_36,
            $price5_36,
            $name5_37,
            $price5_37,
            $name5_38,
            $price5_38,
            $name5_39,
            $price5_39,
            $name5_40,
            $price5_40,
            $name5_41,
            $price5_41,
            $name5_42,
            $price5_42,
            $name5_43,
            $price5_43,
            $name5_44,
            $price5_44,
            $name5_45,
            $price5_45,
            $name5_47,
            $price5_47,
            $name5_48,
            $price5_48,
            $name5_49,
            $price5_49,
        ];


        for ($i = 0; $i < count($arr_softs); $i += 2) {
            $item = new Item();
            $item->setName($arr_softs[$i]);
            $item->setPrice($arr_softs[$i + 1]);
            $item->setSlug($item->getName());
            // BOISSON
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_10));
            // SOFTS
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_20));
            $manager->persist($item);
        }


        // BOISSONS CHAUDES
        //--

        $name5_57 = 'Café'; // BOISSONS CHAUDES
        $price5_57 = 1.9;
        $name5_58 = 'Décaféiné'; // BOISSONS CHAUDES
        $price5_58 = 1.9;
        $name5_59 = 'Grand café ou Grand crème'; // BOISSONS CHAUDES
        $price5_59 = 2.5;
        $name5_60 = 'Capuccino'; // BOISSONS CHAUDES
        $price5_60 = 3.5;
        $name5_61 = 'Thé ou Infusion'; // BOISSONS CHAUDES
        $price5_61 = 3.9;
        $name5_62 = 'Irish coffee'; // BOISSONS CHAUDES
        $price5_62 = 3.5;
        $name5_63 = 'Petit crème'; // BOISSONS CHAUDES
        $price5_63 = 2.5;

        $arr_chaudes = [
            $name5_57,
            $price5_57,
            $name5_58,
            $price5_58,
            $name5_59,
            $price5_59,
            $name5_60,
            $price5_60,
            $name5_61,
            $price5_61,
            $name5_62,
            $price5_62,
            $name5_63,
            $price5_63,
        ];

        for ($i = 0; $i < count($arr_chaudes); $i += 2) {
            $item = new Item();
            $item->setName($arr_chaudes[$i]);
            $item->setPrice($arr_chaudes[$i + 1]);
            $item->setSlug($item->getName());
            // BOISSON
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_10));
            // BOISSONS CHAUDES
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_21));
            $manager->persist($item);
        }

        // DIGESTIFS
        //--

        $name5_64 = 'Get 27 5cl'; // DIGESTIFS
        $price5_64 = 6.5;
        $name5_65 = 'Get 31 5cl'; // DIGESTIFS
        $price5_65 = 6.5;
        $name5_66 = 'Bailey\'s 5cl'; // DIGESTIFS
        $price5_66 = 6.5;
        $name5_67 = 'Manzana 5cl'; // DIGESTIFS
        $price5_67 = 6.5;
        $name5_68 = 'Marie-Brizard 5cl'; // DIGESTIFS
        $price5_68 = 6.5;
        $name5_69 = 'Vodka Bison 5cl'; // DIGESTIFS
        $price5_69 = 6.5;
        $name5_70 = 'Limoncello 5cl'; // DIGESTIFS
        $price5_70 = 6.5;
        $name5_71 = 'Sève Feu de Joie 5cl'; // DIGESTIFS
        $price5_71 = 6.5;
        $name5_72 = 'Armagnac 5 cl'; // DIGESTIFS
        $price5_72 = 6.5;
        $name5_73 = 'Calvados 5 cl'; // DIGESTIFS
        $price5_73 = 6.5;
        $name5_74 = 'Poire Williams 5 cl'; // DIGESTIFS
        $price5_74 = 8.5;
        $name5_75 = 'Cognac VSOP 5 cl'; // DIGESTIFS
        $price5_75 = 8.5;

        $arr_digestifs = [
            $name5_64,
            $price5_64,
            $name5_65,
            $price5_65,
            $name5_66,
            $price5_66,
            $name5_67,
            $price5_67,
            $name5_68,
            $price5_68,
            $name5_69,
            $price5_69,
            $name5_70,
            $price5_70,
            $name5_71,
            $price5_71,
            $name5_72,
            $price5_72,
            $name5_73,
            $price5_73,
            $name5_74,
            $price5_74,
            $name5_75,
            $price5_75,
        ];


        for ($i = 0; $i < count($arr_digestifs); $i += 2) {
            $item = new Item();
            $item->setName($arr_digestifs[$i]);
            $item->setPrice($arr_digestifs[$i + 1]);
            $item->setSlug($item->getName());
            // BOISSON
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_10));
            // DIGESTIFS
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_17));
            $manager->persist($item);
        }

        // RHUMS
        //--

        $name5_76 = 'Havana Club 4 cl'; // RHUMS
        $price5_76 = 6.5;
        $name5_77 = 'Saint-James 4 cl'; // RHUMS
        $price5_77 = 6.5;
        $name5_78 = 'Clément Martinique 5 cl'; // RHUMS
        $price5_78 = 8.5;
        $name5_79 = 'Bacardi 5 cl'; // RHUMS
        $price5_79 = 9.5;
        $name5_80 = 'Diplomatico 5 cl'; // RHUMS
        $price5_80 = 9.5;
        $name5_81 = 'Don Papa 5 cl'; // RHUMS
        $price5_81 = 9.5;


        $arr_rhums = [
            $name5_76,
            $price5_76,
            $name5_77,
            $price5_77,
            $name5_78,
            $price5_78,
            $name5_79,
            $price5_79,
            $name5_80,
            $price5_80,
            $name5_81,
            $price5_81,
        ];

        for ($i = 0; $i < count($arr_rhums); $i += 2) {
            $item = new Item();
            $item->setName($arr_rhums[$i]);
            $item->setPrice($arr_rhums[$i + 1]);
            $item->setSlug($item->getName());
            // BOISSON
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_10));
            // RHUMS
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_19));
            $manager->persist($item);
        }


        // VINS
        //--
        $name5_82 = 'Bordeaux AOP Le Louvetier inspiré par La Louvière 75 cl'; // VINS // ROUGE
        $price5_82 = 23.0;
        $name5_83 = 'Côtes de Bourg AOP Château Haut Guiraud 75 cl'; // VINS // ROUGE
        $price5_83 = 20.0;
        $name5_84 = 'Côtes de Bourg AOP Château Haut Guiraud 50 cl'; // VINS // ROUGE
        $price5_84 = 15.0;
        $name5_85 = 'Côtes du Rhône BIO AOP Château des Coccinelles 75 cl'; // VINS // ROUGE
        $price5_85 = 25.0;
        $name5_86 = 'AOP Pic Saint-Loup Haut-Lirou Languedoc Roussillon 75 cl'; // VINS // ROUGE
        $price5_86 = 25.0;
        $name5_87 = 'Côtes de Bœuf IGP d\'OC Languedoc Roussillon 75 cl'; // VINS // ROUGE
        $price5_87 = 19.0;
        $name5_88 = 'Graves AOP Château Boiresse 75 cl'; // VINS // ROUGE
        $price5_88 = 25.0;
        $name5_89 = 'Graves AOP Château Boiresse 50 cl'; // VINS // ROUGE
        $price5_89 = 18.0;
        $name5_90 = 'Pessac Léognan AOP Château Mancèdre Les Griottes 75 cl'; // VINS // ROUGE
        $price5_90 = 34.0;
        $name5_91 = 'Pessac Léognan AOP Marquise Haut Vigneau 75 cl'; // VINS // ROUGE
        $price5_91 = 57.0;
        $name5_92 = 'AOP Saint-Estèphe La Coccinelle de Petit Bocq 75 cl'; // VINS // ROUGE
        $price5_92 = 39.0;
        $name5_93 = 'AOP Haut-Médoc Château Lamothe Cissac 75 cl'; // VINS // ROUGE
        $price5_93 = 28.0;
        $name5_94 = 'AOP Haut-Médoc Château Lamothe Cissac 37.5 cl'; // VINS // ROUGE
        $price5_94 = 16.0;
        $name5_95 = 'Saint-Émilion AOP Château Tour Puyblanquet 75 cl'; // VINS // ROUGE
        $price5_95 = 31.0;
        $name5_96 = 'Pomerol AOP Vieux château brun 75 cl'; // VINS // ROUGE
        $price5_96 = 49.0;
        $name5_97 = 'Vin Californien 770 Miles Zinfandel Californie 75 cl'; // VINS // ROUGE
        $price5_97 = 25.0;
        $name5_98 = 'Vin Argentin Tupungato Mendoza Cameleon Malbec BIO 75 cl'; // VINS // ROUGE
        $price5_98 = 27.0;
        $name5_99 = 'Vin Chilien Central Valley Cono Sur Bicicleta 75 cl'; // VINS // ROUGE
        $price5_99 = 25.0;
        $name5_100 = 'Vin Italien Sicilia DOC Luma Nero d\'Avola 75 cl'; // VINS // ROUGE
        $price5_100 = 26.0;


        $arr_rouge = [
            $name5_82,
            $price5_82,
            $name5_83,
            $price5_83,
            $name5_84,
            $price5_84,
            $name5_85,
            $price5_85,
            $name5_86,
            $price5_86,
            $name5_87,
            $price5_87,
            $name5_88,
            $price5_88,
            $name5_89,
            $price5_89,
            $name5_90,
            $price5_90,
            $name5_91,
            $price5_91,
            $name5_92,
            $price5_92,
            $name5_93,
            $price5_93,
            $name5_94,
            $price5_94,
            $name5_95,
            $price5_95,
            $name5_96,
            $price5_96,
            $name5_97,
            $price5_97,
            $name5_98,
            $price5_98,
            $name5_99,
            $price5_99,
            $name5_100,
            $price5_100,
        ];

        for ($i = 0; $i < count($arr_rouge); $i += 2) {
            $item = new Item();
            $item->setName($arr_rouge[$i]);
            $item->setPrice($arr_rouge[$i + 1]);
            $item->setSlug($item->getName());

            // BOISSONS
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_10));
            //VINS
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_15));
            // ROUGE
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_22));
            $manager->persist($item);
        }


        // ROSE
        //--

        $name5_101 = 'IGP Méditerranée Pur Gris 75 cl'; // VINS // ROSE
        $price5_101 = 17.0;
        $name5_102 = 'Côtes de Provence AOP Les Hauts de Masterel 75 cl'; // VINS // ROSE
        $price5_102 = 22.0;
        $name5_103 = 'Côtes de Provence AOP Les Hauts de Masterel 37.5 cl'; // VINS // ROSE
        $price5_103 = 14.0;
        $name5_104 = 'Cabernet d\'Anjou AOP Parfum Rosé 75 cl'; // VINS // ROSE
        $price5_104 = 21.0;
        $name5_105 = 'Marcel IGP Pays d\'Oc Languedoc Roussillon 75 cl'; // VINS // ROSE
        $price5_105 = 21.0;
        $name5_106 = 'AOP Corse Domaine Casabianca 75 cl'; // VINS // ROSE
        $price5_106 = 27.0;
        $name5_107 = 'Château Maubert AOP Bordeaux Bio 75 cl'; // VINS // ROSE
        $price5_107 = 24.0;

        $arr_rose = [
            $name5_101,
            $price5_101,
            $name5_102,
            $price5_102,
            $name5_103,
            $price5_103,
            $name5_104,
            $price5_104,
            $name5_105,
            $price5_105,
            $name5_106,
            $price5_106,
            $name5_107,
            $price5_107,
        ];

        for ($i = 0; $i < count($arr_rose); $i += 2) {
            $item = new Item();
            $item->setName($arr_rose[$i]);
            $item->setPrice($arr_rose[$i + 1]);
            $item->setSlug($item->getName());
            // BOISSONS
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_10));
            //VINS
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_15));
            // ROSE
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_25));
            $manager->persist($item);
        }

        // BLANCSEC
        //--


        $name5_108 = 'IGP Côtes de Gascogne UBY 75 cl'; // VINS // BLANCSEC
        $price5_108 = 19.0;
        $name5_109 = 'Vin Chilien Central Valle Cono Sur Bicicleta Sauvignon blanc 75 cl'; // VINS // BLANCSEC
        $price5_109 = 25.0;
        $name5_110 = 'Vin Californien 770 Miles Zinfandel Californie 75 cl'; // VINS // BLANCSEC
        $price5_110 = 25.0;
        $name5_111 = 'Clos des Orfeuilles AOP Muscadet Sevre et Maine Sur Lie BIO 75 cl'; // VINS // BLANCSEC
        $price5_111 = 24.0;
        $name5_112 = 'Entre deux Mers AOP Château Sainte Marie 75 cl'; // VINS // BLANCSEC
        $price5_112 = 23.0;
        $name5_113 = 'Entre deux Mers AOP Château Sainte Marie 37.5 cl'; // VINS // BLANCSEC
        $price5_113 = 15.0;
        $name5_114 = 'Vin Argentin BIO Cameleon Torrontes Chardonnay 75 cl'; // VINS // BLANCSEC
        $price5_114 = 27.0;
        $name5_115 = 'Chablis AOP Christophe Patrice 75 cl'; // VINS // BLANCSEC
        $price5_115 = 32.0;
        $name5_116 = 'Pessac Léognan AOP Cantebau vignoble Lurton 75 cl'; // VINS // BLANCSEC
        $price5_116 = 39.0;

        $arr_blancsec = [
            $name5_108,
            $price5_108,
            $name5_109,
            $price5_109,
            $name5_110,
            $price5_110,
            $name5_111,
            $price5_111,
            $name5_112,
            $price5_112,
            $name5_113,
            $price5_113,
            $name5_114,
            $price5_114,
            $name5_115,
            $price5_115,
            $name5_116,
            $price5_116,
        ];

        for ($i = 0; $i < count($arr_blancsec); $i += 2) {
            $item = new Item();
            $item->setName($arr_blancsec[$i]);
            $item->setPrice($arr_blancsec[$i + 1]);
            $item->setSlug($item->getName());
            // BOISSONS
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_10));
            // VINS
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_15));
            // BLANCSEC
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_24));
            $manager->persist($item);
        }


        // BLANCMOELLEUX
        //--

        $name5_117 = 'Soleil d\'Arche AOC Sauternes 75 cl'; // VINS // BLANCMOELLEUX
        $price5_117 = 39.0;
        $name5_118 = 'Soleil d\'Arche AOC Sauternes 37.5 cl'; // VINS // BLANCMOELLEUX
        $price5_118 = 27.0;
        $name5_119 = 'Côtes de Gascogne IGP Bal des Papillons 75 cl'; // VINS // BLANCMOELLEUX
        $price5_119 = 22.0;

        $arr_blancmoelleux = [
            $name5_117,
            $price5_117,
            $name5_118,
            $price5_118,
            $name5_119,
            $price5_119,
        ];

        for ($i = 0; $i < count($arr_blancmoelleux); $i += 2) {
            $item = new Item();
            $item->setName($arr_blancmoelleux[$i]);
            $item->setPrice($arr_blancmoelleux[$i + 1]);
            $item->setSlug($item->getName());
            // BOISSONS
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_10));
            // VINS
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_15));
            // BLANCMOELLEUX
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_23)); //VINS
            $manager->persist($item);
        }


        // CHAMPAGNE
        //--
        $name5_120 = 'Louis Tollet Brut 1er Cru 75 cl Blanc'; // VINS // CHAMPAGNE
        $price5_120 = 52.0;
        $name5_121 = 'Louis Tollet Brut 1er Cru 18.7 cl Blanc'; // VINS // CHAMPAGNE
        $price5_121 = 18.0;
        $name5_122 = 'Louis Tollet Brut 1er Cru 75 cl Rose'; // VINS // CHAMPAGNE
        $price5_122 = 55.0;
        $name5_123 = 'Opale Crémant de Bordeaux Célene Blanc de Blanc brut 75 cl'; // VINS // CHAMPAGNE
        $price5_123 = 25.0;

        $arr_champagne = [
            $name5_120,
            $price5_120,
            $name5_121,
            $price5_121,
            $name5_122,
            $price5_122,
            $name5_123,
            $price5_123,
        ];

        for ($i = 0; $i < count($arr_champagne); $i += 2) {
            $item = new Item();
            $item->setName($arr_champagne[$i]);
            $item->setPrice($arr_champagne[$i + 1]);
            $item->setSlug($item->getName());
            // BOISSONS
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_10));
            // VINS
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_15));
            // CHAMPAGNE
            $item->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_16));
            $manager->persist($item);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
        ];
    }
}