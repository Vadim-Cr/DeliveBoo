<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;
use App\Models\Restaurant;
use App\Models\Order;

class DishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

    $dishes = [
        [
            'name' => 'Pasta Carbonara',
            'image_path' => 'https://blog.giallozafferano.it/albe/wp-content/uploads/2020/08/15FA1142-B5FA-410C-878B-2B8745B85F64.jpeg',
            'description' => 'Un primo piatto romano a base di pasta, guanciale, uova, pecorino e pepe nero.',
            'price' => 10,
            'availability' => true
        ],
        [
            'name' => 'Pizza Margherita',
            'image_path' => 'https://www.unmondodisapori.it/wp-content/uploads/2017/10/margherita.jpg',
            'description' => 'Pizza con pomodoro, mozzarella e basilico.',
            'price' => 8,
            'availability' => true
        ],
        [
            'name' => 'Tiramisu',
            'image_path' => 'https://www.divella.it/wp-content/uploads/2022/12/tiramisu.jpg',
            'description' => 'Dolce italiano a base di savoiardi, caffè e mascarpone.',
            'price' => 6,
            'availability' => true
        ],
        [
            'name' => 'Osso Buco',
            'image_path' => 'https://media.istockphoto.com/id/1295765777/it/foto/stinco-di-manzo-in-stufato-osso-buco-bistecca-ossobuco-italiana-sfondo-di-legno-vista-dallalto.jpg?s=612x612&w=0&k=20&c=0XrSWgbrLvEJzr-wiGo1sFY2EqZW6m_oFmZ7NJfuEM8=',
            'description' => 'Stinco di vitello cotto a fuoco lento con verdure e brodo.',
            'price' => 18,
            'availability' => true
        ],
        [
            'name' => 'Fettuccine Alfredo',
            'image_path' => 'https://pastagioiosa.it/trunk/rc_img_11_dscn2930.jpg',
            'description' => 'Pasta con salsa di burro e parmigiano.',
            'price' => 11,
            'availability' => true
        ],
        [
            'name' => 'Bruschetta',
            'image_path' => 'https://www.cucchiaio.it/content/dam/cucchiaio/it/ricette/2009/11/ricetta-bruschetta-pomodoro/_MG_8642.jpg',
            'description' => 'Pane tostato con pomodoro, aglio e basilico.',
            'price' => 5,
            'availability' => true
        ],
        [
            'name' => 'Minestrone',
            'image_path' => 'https://i2.wp.com/www.piccolericette.net/piccolericette/wp-content/uploads/2017/10/3390_Minestrone.jpg?resize=895%2C616&ssl=1',
            'description' => 'Zuppa di verdure.',
            'price' => 7,
            'availability' => true
        ],
        [
            'name' => 'Calzone',
            'image_path' => 'https://t4.ftcdn.net/jpg/01/04/54/05/360_F_104540554_PN2jR6FlD6icwg1KL4Gra3PDLoKRf4jv.jpg',
            'description' => 'Pizza ripiegata con ripieno di pomodoro e mozzarella.',
            'price' => 9,
            'availability' => true
        ],
        [
            'name' => 'Panzanella',
            'image_path' => 'https://media-assets.lacucinaitaliana.it/photos/63c51857ca014b53c4624115/4:3/w_1331,h_998,c_limit/panzanella.jpg',
            'description' => 'Insalata di pane toscana con pomodoro e basilico.',
            'price' => 6,
            'availability' => true
        ],
        [
            'name' => 'Polenta',
            'image_path' => 'https://www.prodottibergamaschi.it/wp-content/uploads/2018/08/POLENTA.jpg',
            'description' => 'Porridge di mais, spesso servito come contorno.',
            'price' => 5,
            'availability' => true
        ],
        [
            'name' => 'Sushi',
            'image_path' => 'https://blog.giallozafferano.it/cookingdada/wp-content/uploads/2021/05/blog_picture-scaled.jpg',
            'description' => 'Piatti giapponesi che presentano pesce crudo su riso condito.',
            'price' => 15,
            'availability' => true
        ],
        [
            'name' => 'Tacos',
            'image_path' => 'https://st2.depositphotos.com/1006753/8282/i/450/depositphotos_82827252-stock-photo-delicious-tacos.jpg',
            'description' => 'Tortillas messicane ripiene di carne, formaggio e verdure.',
            'price' => 8,
            'availability' => true
        ],
        [
            'name' => 'Paella',
            'image_path' => 'https://media.istockphoto.com/id/510244381/it/foto/paella-di-pesce-tipica-spagnola.jpg?s=612x612&w=0&k=20&c=4ZAfts29r9ROUeHjV2vDiJKDtUlkGn3x6gkrnP1Gh60=',
            'description' => 'Riso spagnolo cotto con frutti di mare, pollo e verdure.',
            'price' => 12,
            'availability' => true
        ],
        [
            'name' => 'Croissant',
            'image_path' => 'https://grancaffegambrinus.com/wp-content/uploads/2019/01/croissant.png',
            'description' => 'Pane francese a forma di mezzaluna, fatto con pasta sfoglia.',
            'price' => 4,
            'availability' => true
        ],
        [
            'name' => 'Curry',
            'image_path' => 'https://media.istockphoto.com/id/177043240/it/foto/burro-pollo-al-curry-indiano.jpg?s=612x612&w=0&k=20&c=dOAMhkw9QU7G3_tUYWHgE-uJLRkMDW3o_lXLRoITpic=',
            'description' => 'Piatti speziati a base di carne o verdure, tipici della cucina indiana.',
            'price' => 11,
            'availability' => true
        ],
        [
            'name' => 'Shawarma',
            'image_path' => 'https://media.istockphoto.com/id/1421688556/it/foto/shawarma-di-manzo-su-sfondo-scuro-shawarma-con-manzo-nel-pane-pita.jpg?s=612x612&w=0&k=20&c=g4SGPrArBKjx5iV6hl91JPBq1WxE-9NIiElBvxTVR6w=',
            'description' => 'Piatti a base di carne tagliata da un arrosto verticale, tipici del Medio Oriente.',
            'price' => 9,
            'availability' => true
        ],
        [
            'name' => 'Dim Sum',
            'image_path' => 'https://media.istockphoto.com/id/668526016/it/foto/somma-fioca.jpg?s=612x612&w=0&k=20&c=SfxtSz-fvzxa5egxjSEFrtrlZz6WZhLIpaT8jKRpIsU=',
            'description' => 'Piccoli piatti cinesi serviti con tè, spesso come pasto mattutino o pomeridiano.',
            'price' => 14,
            'availability' => true
        ],
        [
            'name' => 'Poutine',
            'image_path' => 'https://media.istockphoto.com/id/1170406126/it/foto/putin.jpg?s=612x612&w=0&k=20&c=F_MLyZ-ES1amFjUB3e5473UmrcYwVkocGcXLIV7NSmY=',
            'description' => 'Patatine fritte canadesi coperte di formaggio e condite con salsa di carne.',
            'price' => 7,
            'availability' => true
        ],
        [
            'name' => 'Goulash',
            'image_path' => 'https://media.istockphoto.com/id/599498966/it/foto/carne-di-manzo-stufata-con-patate.jpg?s=612x612&w=0&k=20&c=u0vuEimDYxK32_RqVl5fl7PHtGHxyD-cOiiLnbU0STg=',
            'description' => 'Stufato ungherese fatto con carne di manzo, patate e paprika.',
            'price' => 10,
            'availability' => true
        ],
        [
            'name' => 'Moussaka',
            'image_path' => 'https://media.istockphoto.com/id/698496022/it/foto/casseruola-di-melanzane-di-carne-macinata-di-patate.jpg?s=612x612&w=0&k=20&c=_XwbhMsB6TcskfW8Xci9rgICYtTfR6hW0xowVzuRKOE=',
            'description' => 'Piatto greco fatto con strati di melanzane, carne macinata e besciamella.',
            'price' => 13,
            'availability' => true
        ]
    ];

    $created_dishes = []; // An array to store newly created Dish objects
    foreach ($dishes as $dish) {

            $dish = Dish::make([
                'name' => $dish['name'],
                'image_path' => $dish['image_path'],
                'description' => $dish['description'],
                'price' => $dish['price'],
                'availability' => $dish['availability']
            ]);

            $created_dishes[] = $dish; // Add to array
       
            foreach ($created_dishes as $dish) {   // Loop through the array of Dish objects

            // todo collegamento con restaurants
            $restaurant = Restaurant :: inRandomOrder() -> first();
            $dish -> restaurant_id = $restaurant -> id;   
            $dish->save();

            // todo collegamento con orders
            $orders = Order:: inRandomOrder() -> limit(rand(0, 4)) -> get();
            $dish -> orders() -> attach($orders);
  
            }
           
        // $restaurants = Restaurant :: inRandomOrder() -> limit(rand(0, 4)) -> get();

        // $dish -> restaurants() -> attach($dishes);
    }
    }
}
