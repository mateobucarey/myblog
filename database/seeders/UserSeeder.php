<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuario demo
        $user = User::create([
            'name' => 'Usuario Demo',
            'email' => 'demo@example.com',
            'password' => bcrypt('password'),
        ]);

        // Crear algunos posts de ejemplo
        Post::create([
            'user_id' => $user->id,
            'title' => 'Empanadas de Carne Tradicionales',
            'content' => "Ingredientes:\n- 500g de harina\n- 200g de grasa de pella\n- 1 cucharadita de sal\n- Agua tibia\n- 500g de carne picada\n- 2 cebollas\n- 1 cucharada de pimentón\n- Comino, sal y pimienta\n\nPreparación:\nPara la masa, mezclar la harina con la sal, agregar la grasa derretida y agua tibia hasta formar una masa lisa. Dejar reposar.\n\nPara el relleno, dorar la cebolla picada, agregar la carne y condimentar. Cocinar hasta que esté lista.\n\nArmado: estirar la masa, cortar círculos, rellenar y cerrar en forma de repulgue. Hornear a 200°C por 25 minutos.",
            'habilitated' => true,
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'Locro Norteño',
            'content' => "Ingredientes:\n- 500g de maíz blanco\n- 200g de zapallo\n- 300g de carne de cerdo\n- 200g de chorizo colorado\n- 1 cebolla grande\n- Ají molido, comino, pimentón\n\nPreparación:\nRemojar el maíz durante toda la noche. Al día siguiente, hervirlo hasta que esté tierno.\n\nEn una olla grande, dorar la carne cortada en cubos, agregar la cebolla picada y los condimentos.\n\nAgregar el maíz cocido con su caldo, el zapallo en cubos y cocinar a fuego lento por 2 horas, revolviendo ocasionalmente hasta que espese.",
            'habilitated' => true,
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'Asado Criollo',
            'content' => "Ingredientes:\n- 2kg de asado de tira\n- 1kg de vacío\n- Chorizo y morcilla\n- Sal gruesa\n- Chimichurri\n\nPreparación:\nEncender el fuego con leña o carbón, esperar a que se formen las brasas.\n\nSalar la carne con sal gruesa y colocar sobre la parrilla cuando las brasas estén en su punto.\n\nCocinar del lado del hueso primero, dando vuelta cuando esté dorado. El tiempo de cocción depende del gusto de cada uno.\n\nServir con chimichurri y ensaladas.",
            'habilitated' => true,
        ]);
    }
}
