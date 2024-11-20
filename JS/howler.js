let currentSong = null; // Referencia a la canción actual
let isPlaying = false; // Estado de reproducción
let progressBar = document.getElementById('progress-bar'); // Barra de progreso

// Declaración de la lista de canciones
const songs = [
    { src: '../audio/Condenados al desastre - Reality, Hard GZ.mp3', title: 'Condenados al desastre', artist: 'Reality, Hard GZ', cover: '../images/Condenados al desastre - Reality, Hard GZ.jpeg' },
    { src: '../audio/Shars 2020 - AlSafir.mp3', title: 'Shars 2020', artist: 'AlSafir', cover: '../images/Shars 2020 - AlSafir.jpeg' },
    { src: '../audio/Manhattan - D0ble 0.mp3', title: 'Manhattan', artist: 'D0ble 0', cover: '../images/Manhattan - D0ble 0.jpeg' },
    { src: '../audio/Lady madriZz - Céro.mp3', title: 'Lady madriZz', artist: 'Céro', cover: '../images/Lady madriZz - Céro.jpeg' },
    { src: '../audio/Extrarradio - Midas Alonso, Natos y Waor.mp3', title: 'Extrarradio', artist: 'Midas Alonso, Natos y Waor', cover: '../images/Extrarradio - Midas Alonso, Natos y Waor.jpeg' },
    { src: '../audio/Récord - Kaze.mp3', title: 'Récord', artist: 'Kaze', cover: '../images/Récord - Kaze.jpeg' }
];

let currentSongIndex = 0;

// Función para reproducir una canción
function playSong(index) {
    stopAudio();

    const song = songs[index];
    currentSong = new Howl({
        src: [song.src],
        volume: 0.5,
        onplay: () => requestAnimationFrame(updateProgress),
        onend: () => console.log('Canción terminada')
    });

    document.getElementById('song-title').innerText = song.title;
    document.getElementById('song-artist').innerText = song.artist;
    document.getElementById('song-img').src = song.cover;

    currentSong.play();
    isPlaying = true;
}

// Función para detener la canción
function stopAudio() {
    if (currentSong) {
        currentSong.stop();
        currentSong = null;
    }
    isPlaying = false;
}

// Control de reproducción inicial basado en estado de ánimo
document.addEventListener("DOMContentLoaded", () => {
    if (typeof initialSongIndex !== "undefined") {
        playSong(initialSongIndex);
    }
});

// Función de progreso y controles adicionales
// ...
