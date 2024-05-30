document.addEventListener('DOMContentLoaded', function(){
    eventListeners();
    darkMode();
});

function eventListeners(){
    const barras = document.querySelector('.barras');
    barras.addEventListener('click', navegacionResponsive);
};

function darkMode (){
    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    });

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    console.log(prefiereDarkMode.matches);

    if (prefiereDarkMode.matches){
        document.body.classList.add('dark-mode');
    } else{
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function(){
        if (prefiereDarkMode.matches){
        document.body.classList.add('dark-mode');
    } else{
        document.body.classList.remove('dark-mode');
    }
    });
};


function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');
    const header = document.querySelector('.header');
    const header_subtitulos = document.querySelector('.header__subtitulos');
        
    navegacion.classList.toggle('nav-activa');
    header.classList.toggle('nav-activa');
    header_subtitulos.classList.toggle('nav-activa');
}


