<?php


  $nombres = [
    'Veron Rodrigo',
    'Mercado Eric',
    'Avalos Miqueas',
    'Cespedes Brian',
    'Ruiz Diaz Alejandro',
    'Bresanovich Axel',
    'Leonardo',
    'Flavian Dante',
    'Pedemonte',
    'Garcia Fabian'
  ];

  $estudiantes = [];

  function cargarEstudiantes() 
  {
    global $nombres, $estudiantes;

    if (count($nombres) < 10){
      echo "No hay suficientes nombres para cargar los estudiantes, Minimo deben ser 10 nombres.";
      return;
    }
    
    foreach ($nombres as $nombre) {
      $estudiante = [
        'Apellido y nombre' => $nombre,
      ];
      $estudiantes[] = $estudiante;
    }
  }

  cargarEstudiantes();

  shuffle($estudiantes);

  function cargar_notas(){ 
    global $estudiantes;
    foreach ($estudiantes as &$estudiante) {
      $estudiante['Nota del primer parcial'] = rand(1, 10);
      $estudiante['Nota del segundo parcial'] = rand(1, 10);
    }
  }

  cargar_notas();

  function calcular_asistencia(){
    global $estudiantes;
    foreach ($estudiantes as &$estudiante) {
      $estudiante['Asistencia'] = floor((rand(0, 40) / 40) * 100);
    }
  }

  calcular_asistencia();

  function cargar_dni(){
    global $estudiantes;
    foreach ($estudiantes as &$estudiante) {
      $estudiante['DNI'] = rand(30000000, 46000000);
    }
  }

  cargar_dni();

  function emitir_estado(){
    global $estudiantes;
    
    foreach ($estudiantes as &$estudiante) {

        if($estudiante['Nota del primer parcial'] >= 8 && $estudiante['Nota del segundo parcial'] >= 8 && $estudiante['Asistencia'] >= 80) {
            $estudiante['Estado'] = 'Alumno regular';
        }
        elseif($estudiante['Nota del primer parcial'] >= 8 && $estudiante['Nota del segundo parcial'] >= 8 && $estudiante['Asistencia'] < 80){
          $estudiante['Estado'] = 'Debe realizar clases de apoyo';
        }
        elseif($estudiante['Nota del primer parcial'] < 8 || $estudiante['Nota del segundo parcial'] < 8 && $estudiante['Asistencia'] >= 80) {
          $estudiante['Estado'] = 'debe realizar clases de apoyo';
        }
        else {
          $estudiante['Estado'] = 'Alumno libre';
        }
    }
}


  emitir_estado();


  echo json_encode($estudiantes);




?>