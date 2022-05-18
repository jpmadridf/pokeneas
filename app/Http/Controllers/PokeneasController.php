<?php

namespace App\Http\Controllers;

class PokeneasController extends Controller
{
    public static $pokeneas = [
        ["id" => "1", "nombre" => "El Brayan", "altura" => "1.73", "habilidad" => "Treparse en camiones", "imagen" => "https://storage.googleapis.com/pokeneas_topicos/1.jfif", "frase" => "Soy nea y soy feliz"],
        ["id" => "2", "nombre" => "El Mono", "altura" => "1.68", "habilidad" => "Robar bolsos", "imagen" => "https://storage.googleapis.com/pokeneas_topicos/2.jfif", "frase" => "Cuando unos rien otros lloran"],
        ["id" => "3", "nombre" => "La Jeymi", "altura" => "1.79", "habilidad" => "Sacarle plata a los hombres", "imagen" => "https://storage.googleapis.com/pokeneas_topicos/6.jfif", "frase" => "Sola pero no mal acompañada"],
        ["id" => "4", "nombre" => "El Zarco", "altura" => "1.81", "habilidad" => "Robar relojes", "imagen" => "https://storage.googleapis.com/pokeneas_topicos/3.jfif", "frase" => "Solo de una pero siempre con varias"],
        ["id" => "5", "nombre" => "El Esneider", "altura" => "1.77", "habilidad" => "Vender vicio", "imagen" => "https://storage.googleapis.com/pokeneas_topicos/4.jfif", "frase" => "El que tenga miedo a morir que no nazca"],
        ["id" => "6", "nombre" => "El Ferney", "altura" => "1.78", "habilidad" => "Salir con 3 a la vez", "imagen" => "https://storage.googleapis.com/pokeneas_topicos/5.jfif", "frase" => "Siempre solo pero con alguien"],
        ["id" => "7", "nombre" => "La Yatzuri", "altura" => "1.80", "habilidad" => "Labia", "imagen" => "https://storage.googleapis.com/pokeneas_topicos/7.jfif", "frase" => "Si la vida sube yo bajo"]
      ];
      public function index(){
          $totalPokeneas = (count(PokeneasController::$pokeneas));
          $randomNumber = (rand(0, ($totalPokeneas - 1)));
          $randomPokenea = PokeneasController::$pokeneas[$randomNumber];
          unset($randomPokenea["imagen"]);
          unset($randomPokenea["frase"]);
          return response()->json(['Pokenea' => $randomPokenea, 'id_contenedor' => gethostbyname(gethostname())]);
        }
        
        public function fotos(){
            $totalPokeneas = (count(PokeneasController::$pokeneas));
            $randomNumber = (rand(0, ($totalPokeneas - 1)));
            $randomFrase = PokeneasController::$pokeneas[$randomNumber]["frase"];
            $randomImagen = PokeneasController::$pokeneas[$randomNumber]["imagen"];
            $image = base64_encode(file_get_contents($randomImagen));
            echo '<img src="data:image/jpeg;base64,' . $image . '">';
            echo '<br>';
            return response()->json(['Pokenea' => $randomFrase, 'id_contenedor' => gethostbyname(gethostname())]);
        }
}