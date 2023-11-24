'use strict'

const AFGANISTAN_PRECIO = 3523;
const JAPON_PRECIO = 1231;
const YEMEN_PRECIO = 1849;
const ESPAÑA_PRECIO = 86;
const PORTUGAL_PRECIO = 93;
const LUXEMBURGO_PRECIO = 113;
const UGANDA_PRECIO = 912;
const SIERRA_LEONA_PRECIO = 2382;
const MARRUECOS_PRECIO = 51;
const MEXICO_PRECIO = 971;
const BRASIL_PRECIO = 856;
const ARGENTINA_PRECIO = 1075;


  // Función para calcular el precio
  function calcularPrecio() {
    let pais = document.getElementById('choice2').value;
    let personas = parseInt(document.getElementById('persones').value);
    let descuento = document.getElementById('descompte').checked;

    let precioBase = 100; // Precio base de referencia

    if (descuento) {
      precioBase -= 10; // Reducción de $10 si se aplica el descuento
    }
let precioTotal = 0;
    //let precioTotal = precioBase * personas;
    switch (pais){
      case "España": 
        precioTotal = ESPAÑA_PRECIO;
      case "Portugal":
        precioTotal = PORTUGAL_PRECIO;
      case "Luxemburgo":
        precioTotal = LUXEMBURGO_PRECIO;
      case "Afganistán":
        precioTotal = AFGANISTAN_PRECIO;
      case "Japón":
        precioTotal = JAPON_PRECIO;
      case "Yemen":
        precioTotal = YEMEN_PRECIO;
      case "Uganda":
        precioTotal = UGANDA_PRECIO;
      case "Sierra Leona":
        precioTotal = SIERRA_LEONA_PRECIO;
      case "Marruecos":
        precioTotal = MARRUECOS_PRECIO;
      case "México":
        precioTotal = MEXICO_PRECIO;
      case "Argentina":
        precioTotal = ARGENTINA_PRECIO;
      case "Brasil":
        precioTotal = BRASIL_PRECIO;
    } 
    document.getElementById('preu').value = precioTotal;
  }

  // Event listeners para detectar cambios en los campos relevantes
    document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('choice2').addEventListener('change', calcularPrecio);
    //document.getElementById('persones').addEventListener('input', calcularPrecio);
    document.getElementById('descompte').addEventListener('change', calcularPrecio);
  });

