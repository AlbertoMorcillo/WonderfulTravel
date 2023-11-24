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
        break;
      case "Portugal":
        precioTotal = PORTUGAL_PRECIO;
        break;
      case "Luxemburgo":
        precioTotal = LUXEMBURGO_PRECIO;
        break;
      case "Afganistán":
        precioTotal = AFGANISTAN_PRECIO;
        break;
      case "Japón":
        precioTotal = JAPON_PRECIO;
        break;
      case "Yemen":
        precioTotal = YEMEN_PRECIO;
        break;
      case "Uganda":
        precioTotal = UGANDA_PRECIO;
        break;
      case "Sierra leona":
        precioTotal = SIERRA_LEONA_PRECIO;
        break;
      case "Marruecos":
        precioTotal = MARRUECOS_PRECIO;
        break;
      case "México":
        precioTotal = MEXICO_PRECIO;
        break;
      case "Argentina":
        precioTotal = ARGENTINA_PRECIO;
        break;
      case "Brasil":
        precioTotal = BRASIL_PRECIO;
        break;
    } 
    document.getElementById('preu').value = precioTotal;
  }

  // Event listeners para detectar cambios en los campos relevantes
    document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('choice2').addEventListener('change', calcularPrecio);
    //document.getElementById('persones').addEventListener('input', calcularPrecio);
    document.getElementById('descompte').addEventListener('change', calcularPrecio);
  });

