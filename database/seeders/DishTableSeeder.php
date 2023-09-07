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
            'image_path' => 'https://example.com/pasta-carbonara.jpg',
            'description' => 'Un primo piatto romano a base di pasta, guanciale, uova, pecorino e pepe nero.',
            'price' => 10,
            'availability' => true
        ],
        [
            'name' => 'Margherita Pizza',
            'image_path' => 'https://example.com/margherita-pizza.jpg',
            'description' => 'Pizza con pomodoro, mozzarella e basilico.',
            'price' => 8,
            'availability' => true
        ],
        [
            'name' => 'Tiramisu',
            'image_path' => 'https://example.com/tiramisu.jpg',
            'description' => 'Dolce italiano a base di savoiardi, caffè e mascarpone.',
            'price' => 6,
            'availability' => true
        ],
        [
            'name' => 'Osso Buco',
            'image_path' => 'https://example.com/osso-buco.jpg',
            'description' => 'Stinco di vitello cotto a fuoco lento con verdure e brodo.',
            'price' => 18,
            'availability' => true
        ],
        [
            'name' => 'Fettuccine Alfredo',
            'image_path' => 'https://example.com/fettuccine-alfredo.jpg',
            'description' => 'Pasta con salsa di burro e parmigiano.',
            'price' => 11,
            'availability' => true
        ],
        [
            'name' => 'Bruschetta',
            'image_path' => 'https://example.com/bruschetta.jpg',
            'description' => 'Pane tostato con pomodoro, aglio e basilico.',
            'price' => 5,
            'availability' => true
        ],
        [
            'name' => 'Minestrone',
            'image_path' => 'https://example.com/minestrone.jpg',
            'description' => 'Zuppa di verdure.',
            'price' => 7,
            'availability' => true
        ],
        [
            'name' => 'Calzone',
            'image_path' => 'https://example.com/calzone.jpg',
            'description' => 'Pizza ripiegata con ripieno di pomodoro e mozzarella.',
            'price' => 9,
            'availability' => true
        ],
        [
            'name' => 'Panzanella',
            'image_path' => 'https://example.com/panzanella.jpg',
            'description' => 'Insalata di pane toscana con pomodoro e basilico.',
            'price' => 6,
            'availability' => true
        ],
        [
            'name' => 'Polenta',
            'image_path' => 'https://example.com/polenta.jpg',
            'description' => 'Porridge di mais, spesso servito come contorno.',
            'price' => 5,
            'availability' => true
        ],
        [
            'name' => 'Sushi',
            'image_path' => 'https://example.com/sushi.jpg',
            'description' => 'Piatti giapponesi che presentano pesce crudo su riso condito.',
            'price' => 15,
            'availability' => true
        ],
        [
            'name' => 'Tacos',
            'image_path' => 'https://example.com/tacos.jpg',
            'description' => 'Tortillas messicane ripiene di carne, formaggio e verdure.',
            'price' => 8,
            'availability' => true
        ],
        [
            'name' => 'Paella',
            'image_path' => 'https://example.com/paella.jpg',
            'description' => 'Riso spagnolo cotto con frutti di mare, pollo e verdure.',
            'price' => 12,
            'availability' => true
        ],
        [
            'name' => 'Croissant',
            'image_path' => 'https://example.com/croissant.jpg',
            'description' => 'Pane francese a forma di mezzaluna, fatto con pasta sfoglia.',
            'price' => 4,
            'availability' => true
        ],
        [
            'name' => 'Curry',
            'image_path' => 'https://example.com/curry.jpg',
            'description' => 'Piatti speziati a base di carne o verdure, tipici della cucina indiana.',
            'price' => 11,
            'availability' => true
        ],
        [
            'name' => 'Shawarma',
            'image_path' => 'https://example.com/shawarma.jpg',
            'description' => 'Piatti a base di carne tagliata da un arrosto verticale, tipici del Medio Oriente.',
            'price' => 9,
            'availability' => true
        ],
        [
            'name' => 'Dim Sum',
            'image_path' => 'https://example.com/dim-sum.jpg',
            'description' => 'Piccoli piatti cinesi serviti con tè, spesso come pasto mattutino o pomeridiano.',
            'price' => 14,
            'availability' => true
        ],
        [
            'name' => 'Poutine',
            'image_path' => 'https://example.com/poutine.jpg',
            'description' => 'Patatine fritte canadesi coperte di formaggio e condite con salsa di carne.',
            'price' => 7,
            'availability' => true
        ],
        [
            'name' => 'Goulash',
            'image_path' => 'https://example.com/goulash.jpg',
            'description' => 'Stufato ungherese fatto con carne di manzo, patate e paprika.',
            'price' => 10,
            'availability' => true
        ],
        [
            'name' => 'Moussaka',
            'image_path' => 'https://example.com/moussaka.jpg',
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
