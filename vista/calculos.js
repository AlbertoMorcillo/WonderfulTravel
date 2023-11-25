'use strict';

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
        document.getElementById('countryImage').src = '../assets/images/europa/españa.webp';
        break;
      case "Portugal":
        precioTotal = PORTUGAL_PRECIO;
        document.getElementById('countryImage').src = '../assets/images/europa/portugal.webp';
        break;
      case "Luxemburgo":
        precioTotal = LUXEMBURGO_PRECIO;
        document.getElementById('countryImage').src = '../assets/images/europa/luxemburgo.webp';
        break;
      case "Afganistán":
        precioTotal = AFGANISTAN_PRECIO;
        document.getElementById('countryImage').src = '../assets/images/asia/afganistan2.webp';

        break;
      case "Japón":
        precioTotal = JAPON_PRECIO;
        document.getElementById('countryImage').src = '../assets/images/asia/japon.webp';
        break;
      case "Yemen":
        precioTotal = YEMEN_PRECIO;
        document.getElementById('countryImage').src = '../assets/images/asia/yemen.webp';

        break;
      case "Uganda":
        precioTotal = UGANDA_PRECIO;
        document.getElementById('countryImage').src = '../assets/images/africa/uganda.webp';

        break;
      case "Sierra Leona":
        precioTotal = SIERRA_LEONA_PRECIO;
        document.getElementById('countryImage').src = '../assets/images/africa/SierraLeona.webp';

        break;
      case "Marruecos":
        precioTotal = MARRUECOS_PRECIO;
        document.getElementById('countryImage').src = '../assets/images/africa/marruecos.webp';

        break;
      case "México":
        precioTotal = MEXICO_PRECIO;
        document.getElementById('countryImage').src = '../assets/images/america/mexico.webp';

        break;
      case "Argentina":
        precioTotal = ARGENTINA_PRECIO;
        document.getElementById('countryImage').src = '../assets/images/america/argentina.webp';

        break;
      case "Brasil":
        precioTotal = BRASIL_PRECIO;
        document.getElementById('countryImage').src = '../assets/images/america/brasil.webp';
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

