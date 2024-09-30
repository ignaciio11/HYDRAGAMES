function onYouTubeIframeAPIReady() {

  // Obtiene el elemento div por su ID
var div = document.getElementById("miDiv");

// Obtiene la ID del atributo de datos
var idPHP = div.getAttribute("data-id");

    // Crea un nuevo reproductor de video dentro del div con ID "player-container"
    var player = new YT.Player('youtube', {
      
      videoId: ''+idPHP+'', // Reemplaza 'VIDEO_ID' con el ID único de tu video de YouTube
      playerVars: {
        // Opciones adicionales si es necesario
      },
      events: {
        // Eventos del reproductor de video
      }
    });
  }

