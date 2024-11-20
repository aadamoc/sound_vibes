<?php
// Array de canciones
$songsArray = [
    ['src' => '../audio/Condenados al desastre - Reality, Hard GZ.mp3', 'title' => 'Condenados al desastre', 'artist' => 'Reality, Hard GZ', 'cover' => '../images/Condenados al Desastre - Reality.jpeg'],
    ['src' => '../audio/Shars 2020 - AlSafir.mp3', 'title' => 'Shars 2020', 'artist' => 'AlSafir', 'cover' => '../images/Shars 2020 - AlSafir.jpeg'],
    ['src' => '../audio/Manhattan - D0ble 0.mp3', 'title' => 'Manhattan', 'artist' => 'D0ble 0', 'cover' => '../images/Manhattan - D0ble 0.jpeg'],
    ['src' => '../audio/Lady madriZz - Céro.mp3', 'title' => 'Lady madriZz', 'artist' => 'Céro', 'cover' => '../images/Lady madriZz - Céro.jpeg'],
    ['src' => '../audio/Extrarradio - Midas Alonso, Natos y Waor.mp3', 'title' => 'Extrarradio', 'artist' => 'Midas Alonso, Natos y Waor', 'cover' => '../images/Extrarradio - Midas Alonso, Natos y Waor.jpeg'],
    ['src' => '../audio/Récord - Kaze.mp3', 'title' => 'Récord', 'artist' => 'Kaze', 'cover' => '../images/Récord - Kaze.jpeg']
];

// Convertir el array de canciones a JSON
$songsJson = json_encode($songsArray);

// Estados de ánimo predefinidos
$moods = ['Feliz', 'Triste', 'Enérgico', 'Relajado', 'Sorprendido'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reproductor de Música y Estado de Ánimo</title>
    <link rel="stylesheet" href="../CSS/styles_music.css">
</head>
<body>







<!-- Formulario de estado de ánimo -->
<form id="mood-form">
    <label for="mood">¿Cómo te sientes?</label>
    <select id="mood" name="mood">
        <option value="">Selecciona un estado de ánimo</option>
        <?php foreach ($moods as $mood): ?>
            <option value="<?php echo $mood; ?>"><?php echo $mood; ?></option>
        <?php endforeach; ?>
    </select>
    <button id="submit" type="submit">Enviar</button>
</form>


<!-- Div para mostrar la recomendación musical basada en el estado de ánimo -->
<div id="mood-recommendation"></div>



<!-- Imagen de la portada de la canción -->
 
<img id="song-cover" src="<?php echo isset($songIndex) ? $songsArray[$songIndex]['cover'] : ''; ?>" alt="Portada de la canción"  style="display: none; " >

<h2 id="song-title" style="display: none; " ><?php echo isset($songIndex) ? $songsArray[$songIndex]['title'] : ''; ?></h2>
<h3 id="song-artist" style="display: none; " ><?php echo isset($songIndex) ? $songsArray[$songIndex]['artist'] : ''; ?></h3>

<!-- Contenedor del reproductor -->
<div id="player" style="display: none; " >
    <audio id="audio-player" controls>
        <source src="<?php echo isset($songIndex) ? $songsArray[$songIndex]['src'] : ''; ?>" type="audio/mp3">
    </audio>
</div>

<a href="inicio.php" class="text-decoration-none link-light">Volver al inicio</a>
<!-- Scripts -->
<script>
// Pasamos el array de canciones desde PHP a JavaScript
const songs = <?php echo $songsJson; ?>;
let currentSongIndex = 0; // Iniciar con la primera canción

// Función para actualizar la canción
function updateSong() {
    const song = songs[currentSongIndex];
    document.getElementById('song-title').textContent = song.title;
    document.getElementById('song-artist').textContent = song.artist;
    document.getElementById('audio-player').src = song.src;
    if (document.getElementById('mood').value != '') {  
        document.getElementById('song-cover').style.display = 'block';
        document.getElementById('song-title').style.display = 'block';
        document.getElementById('song-artist').style.display = 'block';
        document.getElementById('player').style.display = 'block';
    }
    document.getElementById('song-cover').src = song.cover;
}

// Función para cambiar el color de fondo según el estado de ánimo
function changeBackgroundColor(mood) {
    const body = document.body;
    switch (mood) {
        case 'Feliz':
            body.style.backgroundColor = '#ffeb3b'; // Amarillo brillante

            break;
        case 'Triste':
            body.style.backgroundColor = '#1976d2'; // Azul
            break;
        case 'Enérgico':
            body.style.backgroundColor = '#f44336'; // Rojo vibrante
            break;
        case 'Relajado':
            body.style.backgroundColor = '#4caf50'; // Verde suave
            break;
        case 'Sorprendido':
            body.style.backgroundColor = '#9c27b0'; // Morado
            break;
        default:
            body.style.backgroundColor = '#ffffff'; // Fondo blanco por defecto
            break;
    }
}


// Función para mostrar la recomendación según el estado de ánimo
document.getElementById('mood-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar que se recargue la página al enviar el formulario
    const mood = document.getElementById('mood').value;
    let recommendation = '';
    
    // Cambiar la canción según el estado de ánimo seleccionado
    switch (mood) {
        case 'Feliz':
            currentSongIndex = 0;  // Cambiar la canción a la que corresponde 'Feliz'
            recommendation = '¡Escucha "Condenados al desastre" de Reality y Hard GZ para seguir con esa buena vibra!';
            break;
        case 'Triste':
            currentSongIndex = 1;  // Cambiar a una canción que combine con 'Triste'
            recommendation = 'Te recomendamos "Shars 2020" de AlSafir para relajarte.';
            break;
        case 'Enérgico':
            currentSongIndex = 4;  // Cambiar a una canción que combine con 'Enérgico'
            recommendation = '¡Pon "Extrarradio" de Midas Alonso, Natos y Waor para darle energía a tu día!';
            break;
        case 'Relajado':
            currentSongIndex = 2;  // Cambiar a una canción que combine con 'Relajado'
            recommendation = 'Relájate con "Manhattan" de D0ble 0.';
            break;
        case 'Sorprendido':
            currentSongIndex = 3;  // Cambiar a una canción que combine con 'Sorprendido'
            recommendation = 'Escucha "Lady madriZz" de Céro para sorprenderte aún más.';
            break;
        default:
            recommendation = 'Selecciona un estado de ánimo.';
            break;
    }

    // Actualizar la canción y la recomendación
    updateSong();
    document.getElementById('mood-recommendation').textContent = recommendation;
    // Cambiar el color de fondo según el estado de ánimo
    changeBackgroundColor(mood);
});

// Inicializar la canción y el fondo al cargar
  updateSong();
  updateSong();
    document.getElementById('mood-recommendation').textContent = recommendation;
</script>

</body>
</html>
