<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Typology;
use App\Models\Restaurant;

class TypologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name'=>'italiano',
                'description' => "L\'italiano è famoso per i suoi piatti iconici come pasta, pizza e risotto. È una cucina che pone grande enfasi su ingredienti freschi e semplicità nella preparazione.",
                'image' => 'https://cdn-italiani-media.italiani.it/site-italiani/2016/09/La-cucina-italiana.jpg'
            ],
            [
                'name'=>'cinese',
                'description' => 'La cucina cinese è incredibilmente varia, con piatti che vanno dai ravioli al pollo al sesamo. È conosciuta per l\'uso di tecniche come la cottura al vapore e la frittura.',
                'image' => 'https://i0.wp.com/dietistaroma.com/wp-content/uploads/2022/07/sushi.jpg?ssl=1'
            ],
            [
                'name'=>'giapponese',
                'description' => 'La cucina giapponese è nota per il suo rispetto per il sapore naturale degli ingredienti. Sushi, sashimi e tempura sono alcuni dei piatti più conosciuti.',
                'image' => 'https://r.search.yahoo.com/_ylt=AwrirwdAT_dk46YCAWodDQx.;_ylu=c2VjA3NyBHNsawNpbWcEb2lkA2E0NWMwNzI4OWYzN2VkNTRlOWE0YzlkYjgxODJmY2Q2BGdwb3MDMzUEaXQDYmluZw--/RV=2/RE=1693958080/RO=11/RU=https%3a%2f%2fviviconstile.it%2f2014%2f06%2f27%2fla-cucina-giapponese-piatti-tipici-e-tradizioni-dal-giappone%2f4537%2f/RK=2/RS=u0UMZ9P3zvQ9.t3_LxyRmmpyl5I-'
            ],
            [
                'name'=>'messicano',
                'description' => 'La cucina messicana è famosa per il suo uso di spezie e sapori audaci, con piatti come tacos, burritos e enchiladas che sono amati in tutto il mondo.',
                'image' => 'https://www.generazionepost.it/wp-content/uploads/2020/01/Cibo-Messicano.jpg'
            ],
            [
                'name'=>'indiano',
                'description' => 'La cucina indiana è ricca di spezie e aromi, con una grande varietà di piatti che variano da regione a regione. Curry, biryani e pane naan sono tra i favoriti.',
                'image' => 'https://mangiarebene.s3.amazonaws.com/uploads/blog_item/image/1285/mb_asset.jpg'
            ],
            [
                'name'=>'francese',
                'description' => 'Conosciuta per la sua sofisticatezza, la cucina francese include piatti come coq au vin e bouillabaisse. È una cucina che valuta la qualità e la tecnica.',
                'image' => 'https://www.datocms-assets.com/38011/1615557875-1615555623191423-le-carre-francais-ristorante-cucina-francese-a-roma-lofficielitalia12.jpg?auto=format%2Ccompress&cs=srgb'
            ],
            [
                'name'=>'spagnolo',
                'description' => 'La cucina spagnola è famosa per le sue tapas, piccoli piatti che possono variare da olive a calamari fritti. Paella e gazpacho sono altri piatti popolari.',
                'image' => 'https://www.bioimis.it/resize_image?id=e4cd7759-dfd7-47ed-9aa9-19234f952c59&w=791&h=500'
            ],
            [
                'name'=>'tedesco',
                'description' => 'La cucina tedesca è conosciuta per i suoi piatti robusti come salsicce, crauti e pane di segale. È una cucina che è tanto casalinga quanto è deliziosa.',
                'image' => 'https://lacuocaignorante.altervista.org/wp-content/uploads/2019/04/cucina-tedesca-1.jpg'
            ],
            [
                'name'=>'americano',
                'description' => 'La cucina americana è un melting pot di influenze, noto per piatti come hamburger, hot dog e cibo fritto. È una cucina diversificata con molte varianti regionali.',
                'image' => 'https://staticcookist.akamaized.net/wp-content/uploads/sites/21/2022/06/cheeseburger-ricette-americane.jpg'
            ],
            [
                'name'=>'fast food',
                'description' => 'Il fast food è conosciuto per essere veloce e conveniente, con opzioni come hamburger, patatine fritte e pollo fritto che sono disponibili quasi ovunque.',
                'image' => 'https://hips.hearstapps.com/hmg-prod/images/mcdonald-s-case-study-6-1613488635.jpg'
            ],
            [
                'name'=>'vegetariano',
                'description' => 'La cucina vegetariana pone l\'accento su piatti che escludono carne e pesce, privilegiando invece frutta, verdura, legumi e cereali integrali.',
                'image' => 'https://images.unsplash.com/photo-1599020792689-9fde458e7e17?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1976&q=80'
            ],
            [
                'name'=>'vegano',
                'description' => 'La cucina vegana elimina completamente prodotti animali, concentrando l\'attenzione su piatti preparati con ingredienti esclusivamente vegetali.',
                'image' => 'https://www.vegolosi.it/wp-content/uploads/2019/08/23472376_1886886054960794_366389384422ff3627531_n.jpg'
            ],
        ];


        $created_typologies = []; // An array to store newly created Typology objects

        foreach ($types as $type) {
            $typology = Typology::create([
                'name' => $type['name'],
                'description' => $type['description'],
                'image_path' => $type['image']
            ]);
            $created_typologies[] = $typology; // Add to array
        }
            foreach ($created_typologies as $typology) {   // Loop through the array of Typology objects

            $restaurants = Restaurant :: inRandomOrder() -> limit(rand(2, 4)) -> get();

            $typology -> restaurants() -> attach($restaurants);
        }
    }
}
