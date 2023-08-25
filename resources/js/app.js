import './bootstrap';
const select = document.getElementById("select");
const btn = document.getElementById("btns");
const pass = document.getElementById("pass");

select.addEventListener("focus", function(){
    btn.style.marginTop="10px";
    btn.style.transition=" all 0.4s";
    pass.style.marginTop="25px";
    pass.style.transition=" all 0.4s";
    
});
select.addEventListener("change", function(){
    btn.style.marginTop="-5px";
    btn.style.transition=" all 0.4s";
    pass.style.marginTop="-15px";
    pass.style.transition=" all 0.4s";
    
});
select.addEventListener("blur", function(){
    btn.style.marginTop="-5px";
    btn.style.transition=" all 0.4s";
    pass.style.marginTop="-15px";
    pass.style.transition=" all 0.4s";
    
});

/* function mostrarRuta() {
    const input = document.getElementById('imagen');
    const ruta = document.getElementById('ruta');

    if (input.files && input.files[0]) {
        const imagenNombre = input.files[0].name;
        ruta.textContent = `Ruta de la imagen: ${imagenNombre}`;
    } else {
        ruta.textContent = 'Selecciona una imagen';
    }
} */
