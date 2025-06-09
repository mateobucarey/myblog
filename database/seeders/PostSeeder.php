<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener el primer usuario existente
        $user = User::first();
        
        if (!$user) {
            echo "No hay usuarios en la base de datos. Ejecuta primero UserSeeder.\n";
            return;
        }

        // Limpiar posts existentes
        Post::truncate();

        // Crear 6 recetas argentinas únicas con categorías
        Post::create([
            'user_id' => $user->id,
            'title' => 'Milanesas Napolitanas',
            'category' => 'comida',
            'content' => "Ingredientes:\n- 4 bifes de nalga\n- 2 huevos batidos\n- Pan rallado\n- Harina\n- 4 fetas de jamón cocido\n- 4 fetas de queso muzzarella\n- 2 tomates en rodajas\n- Sal, pimienta y ajo\n- Aceite para freír\n\nPreparación:\nAplastar los bifes hasta que queden finitos, salpimentar y frotar con ajo.\n\nRebozar pasando por harina, huevo batido y pan rallado. Freír en aceite caliente hasta dorar.\n\nColocar en una fuente para horno, cubrir con jamón, tomate y queso. Gratinar hasta que se derrita el queso.\n\nServir con papas fritas y ensalada mixta. ¡Un clásico que nunca falla!",
            'habilitated' => true,
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'Asado Criollo a la Parrilla',
            'category' => 'comida',
            'content' => "Ingredientes:\n- 2kg de asado de tira\n- 1kg de vacío\n- 500g de chorizo colorado\n- 300g de morcilla\n- Sal gruesa\n- Chimichurri\n- Leña o carbón\n\nPreparación:\nEncender el fuego con leña o carbón, esperar a que se formen las brasas bien rojas.\n\nSalar la carne con sal gruesa y colocar sobre la parrilla cuando las brasas estén en su punto justo.\n\nCocinar del lado del hueso primero, dando vuelta cuando esté bien dorado. El tiempo de cocción depende del gusto de cada uno.\n\nServir con chimichurri casero, ensaladas y pan. ¡El ritual argentino por excelencia!",
            'habilitated' => true,
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'Alfajores de Dulce de Leche',
            'category' => 'postre',
            'content' => "Ingredientes:\n- 200g de maicena\n- 100g de harina\n- 100g de manteca\n- 100g de azúcar\n- 3 yemas\n- 1 cucharadita de polvo de hornear\n- Ralladura de limón\n- Dulce de leche repostero\n- Coco rallado\n\nPreparación:\nCremar la manteca con el azúcar, agregar las yemas y la ralladura de limón.\n\nIncorporar la maicena, harina y polvo de hornear tamizados. Formar una masa y dejar reposar en la heladera 30 minutos.\n\nEstirar la masa de 5mm de espesor y cortar círculos. Hornear a 180°C por 12 minutos hasta dorar levemente.\n\nUna vez fríos, unir de a pares con dulce de leche y pasar por coco rallado. ¡Alfajores caseros irresistibles!",
            'habilitated' => true,
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'Empanadas de Carne Jugosas',
            'category' => 'comida',
            'content' => "Ingredientes:\n- 500g de harina\n- 200g de grasa de pella\n- 1 cucharadita de sal\n- Agua tibia\n- 500g de carne picada especial\n- 2 cebollas grandes\n- 1 cucharada de pimentón dulce\n- Comino, sal y pimienta\n- 2 huevos duros picados\n- Aceitunas verdes\n\nPreparación:\nPara la masa, mezclar la harina con la sal, agregar la grasa derretida y agua tibia hasta formar una masa lisa. Dejar reposar.\n\nPara el relleno, dorar la cebolla picada, agregar la carne y condimentar. Cocinar hasta que esté lista y agregar huevo duro y aceitunas.\n\nArmado: estirar la masa, cortar círculos, rellenar y cerrar en repulgue. Hornear a 200°C por 25-30 minutos hasta dorar.",
            'habilitated' => true,
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'Locro Tradicional Norteño',
            'category' => 'comida',
            'content' => "Ingredientes:\n- 500g de maíz blanco pisado\n- 300g de zapallo anco\n- 300g de carne de cerdo\n- 200g de chorizo colorado\n- 100g de panceta\n- 1 cebolla grande\n- Ají molido, comino, pimentón\n- Cebolla de verdeo\n\nPreparación:\nRemojar el maíz durante toda la noche. Al día siguiente, hervirlo hasta que esté tierno y cremoso.\n\nEn una olla grande, dorar la panceta cortada en cubos, agregar la cebolla picada y los condimentos.\n\nAgregar las carnes cortadas en trozos, el maíz cocido con su caldo, el zapallo en cubos y cocinar a fuego lento por 2 horas, revolviendo ocasionalmente hasta que espese.\n\nServir bien caliente con cebolla de verdeo picada por encima.",
            'habilitated' => true,
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'Parrillada Mixta Completa',
            'category' => 'comida',
            'content' => "Ingredientes:\n- 1kg de asado de tira\n- 500g de vacío\n- 500g de chorizo parrillero\n- 300g de morcilla\n- 300g de riñones\n- 200g de mollejas\n- Sal gruesa\n- Chimichurri\n- Salsa criolla\n\nPreparación:\nPreparar un fuego fuerte con carbón o leña, esperar a que se formen brasas parejas.\n\nColocar primero las achuras (riñones, mollejas) que se cocinan más rápido. Luego agregar los chorizos y morcillas.\n\nFinalmente colocar los cortes de carne salpimentados, cocinando lentamente para que queden jugosos por dentro y dorados por fuera.\n\nServir en tabla de madera con chimichurri, salsa criolla y pan. ¡Una parrillada completa para compartir en familia!",
            'habilitated' => true,
        ]);

        // Agregar un postre más para balancear categorías
        Post::create([
            'user_id' => $user->id,
            'title' => 'Flan Casero con Dulce de Leche',
            'category' => 'postre',
            'content' => "Ingredientes:\n- 6 huevos\n- 1 litro de leche\n- 150g de azúcar para el flan\n- 200g de azúcar para el caramelo\n- 1 cucharadita de esencia de vainilla\n- Dulce de leche para decorar\n\nPreparación:\nHacer caramelo con 200g de azúcar hasta que esté dorado. Colocar en el molde.\n\nBatir huevos con 150g de azúcar, agregar leche tibia y vainilla. Colar la mezcla.\n\nVolcar sobre el caramelo y cocinar a baño María en horno a 180°C por 45 minutos.\n\nDejar enfriar, desmoldar y decorar con dulce de leche. ¡Un clásico argentino irresistible!",
            'habilitated' => true,
        ]);

        echo "Se crearon 7 recetas argentinas con categorías (5 comidas, 2 postres).\n";
    }
}
