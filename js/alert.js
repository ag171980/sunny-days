let alerta = document.getElementById('alerta');
let checkGreen = 'imagenes/check-green.png';
let checkRed = 'imagenes/check-red.png';
function alert(message,check){
    alerta.innerHTML = `
        <div class="alerta">
            <div class="card">
                <img src="${check}" height="75" alt="">
                <h2>${message}</h2>
                <a id="volver">Volver</a>
            </div>
        </div>`;
        let volver = document.getElementById('volver').addEventListener('click', function (e) {
            alerta.innerHTML = '';
        });
}
