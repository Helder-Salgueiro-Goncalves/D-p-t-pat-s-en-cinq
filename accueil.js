const slide = ["assets/dog.jpg","assets/dog2.jpg", "assets/dog3.jpg", "assets/dog4.jpg", "assets/dog5.jpg", "assets/dog6.jpg","assets/dog7.jpg"];
let numero = 0;

function ChangeSlide(sens) {
    numero = numero + sens;
    if (numero < 0)
        numero = slide.length - 1;
    if (numero > slide.length - 1)
        numero = 0;
    document.getElementById("slide").src = slide[numero];
}