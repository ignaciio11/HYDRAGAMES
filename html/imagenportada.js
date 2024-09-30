 // Lista de imágenes
 var imagenes = ["imgprin/red-dead-redemption-2-pc-juego-rockstar-cover.jpg", "imgprin/tlouP2.jpg", "imgprin/re1.jpg"];
 var indice = 0;
 var tiempoCambio = 5000; // 5 segundos

 // Función para cambiar la imagen
 function cambiarImagen() {
     indice = (indice + 1) % imagenes.length; // Ciclo entre las imágenes
     document.getElementById("imagen").src = imagenes[indice]; // Cambiar la imagen
 }

 // Llamar a la función cada cierto tiempo
 setInterval(cambiarImagen, tiempoCambio);