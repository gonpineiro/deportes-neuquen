<?php

if (PROD) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
}

$actividadController = new ActividadController();

/* Clasificación y votación -  Individuales con enfrentamiento*/
$actividadController->store([
    'id_categoria' => 1,
    'nombre' => 'Boxeo',
    'tipo' => 'Individuales con enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 1,
    'nombre' => 'Lucha Deportiva',
    'tipo' => 'Individuales con enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 1,
    'nombre' => 'Lucha Sumo',
    'tipo' => 'Individuales con enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 1,
    'nombre' => 'Lucha Sambo',
    'tipo' => 'Individuales con enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 1,
    'nombre' => 'Judo',
    'tipo' => 'Individuales con enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 1,
    'nombre' => 'Karate',
    'tipo' => 'Individuales con enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 1,
    'nombre' => 'Taekwondo',
    'tipo' => 'Individuales con enfrentamiento',
    'estado' => 1,
]);

/* Clasificación y votación -  Individuales sin enfrentamiento*/
$actividadController->store([
    'id_categoria' => 1,
    'nombre' => 'Gimnasia Artística',
    'tipo' => 'Individuales sin enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 1,
    'nombre' => 'Gimnasia Ritmica',
    'tipo' => 'Individuales sin enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 1,
    'nombre' => 'Gimnasia Aeróbica',
    'tipo' => 'Individuales sin enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 1,
    'nombre' => 'Nado Sincronizado',
    'tipo' => 'Individuales sin enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 1,
    'nombre' => 'Clavados',
    'tipo' => 'Individuales sin enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 1,
    'nombre' => 'Patinaje Artístico',
    'tipo' => 'Individuales sin enfrentamiento',
    'estado' => 1,
]);

/* Anotación -  Conlectivos con enfrentamiento */
$actividadController->store([
    'id_categoria' => 2,
    'nombre' => 'Baloncesto',
    'tipo' => 'Conlectivos con enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 2,
    'nombre' => 'Rugby',
    'tipo' => 'Conlectivos con enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 2,
    'nombre' => 'Fútbol',
    'tipo' => 'Conlectivos con enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 2,
    'nombre' => 'Fútbol Sala',
    'tipo' => 'Conlectivos con enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 2,
    'nombre' => 'Voleibol',
    'tipo' => 'Conlectivos con enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 2,
    'nombre' => 'Voleibol de Playa',
    'tipo' => 'Conlectivos con enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 2,
    'nombre' => 'Bádminton',
    'tipo' => 'Conlectivos con enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 2,
    'nombre' => 'Hockey',
    'tipo' => 'Conlectivos con enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 2,
    'nombre' => 'Hockey sobre cesped',
    'tipo' => 'Conlectivos con enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 2,
    'nombre' => 'Softbol',
    'tipo' => 'Conlectivos con enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 2,
    'nombre' => 'Balonmano',
    'tipo' => 'Conlectivos con enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 2,
    'nombre' => 'Polo Acuático',
    'tipo' => 'Conlectivos con enfrentamiento',
    'estado' => 1,
]);

/* Anotación -  Indiduales con enfrentamiento */
$actividadController->store([
    'id_categoria' => 2,
    'nombre' => 'Tenis',
    'tipo' => 'Indiduales con enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 2,
    'nombre' => 'Tenis de mesa',
    'tipo' => 'Indiduales con enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 2,
    'nombre' => 'Esgrima',
    'tipo' => 'Indiduales con enfrentamiento',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 2,
    'nombre' => 'Ajedrez',
    'tipo' => 'Indiduales con enfrentamiento',
    'estado' => 1,
]);

/* Medición -  Indiduales de oposición directa e indirecta */
$actividadController->store([
    'id_categoria' => 3,
    'nombre' => 'Atletismo',
    'tipo' => 'Indiduales de oposición directa e indirecta',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 3,
    'nombre' => 'Ciclismo',
    'tipo' => 'Indiduales de oposición directa e indirecta',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 3,
    'nombre' => 'Natación',
    'tipo' => 'Indiduales de oposición directa e indirecta',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 3,
    'nombre' => 'Remo',
    'tipo' => 'Indiduales de oposición directa e indirecta',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 3,
    'nombre' => 'Velas',
    'tipo' => 'Indiduales de oposición directa e indirecta',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 3,
    'nombre' => 'Canoa-Kayak',
    'tipo' => 'Indiduales de oposición directa e indirecta',
    'estado' => 1,
]);

$actividadController->store([
    'id_categoria' => 3,
    'nombre' => 'Pesas',
    'tipo' => 'Indiduales de oposición directa e indirecta',
    'estado' => 1,
]);