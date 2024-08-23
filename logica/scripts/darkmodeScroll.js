document.addEventListener('DOMContentLoaded', ()=> {

    //DARK MODE SCRIPT

    const toggler = document.querySelector('.toggler');
    const root = document.documentElement;

    if (root.getAttribute('data-theme') === 'dark'){
        toggler.checked = true;
    }


    toggler.addEventListener('click', toggleTheme);

    function toggleTheme(){
        const setTheme = toggler.checked ? 'dark' : 'light';

        root.setAttribute('data-theme', setTheme);
        localStorage.setItem('theme', setTheme);
    }
    
    //ACCOUNT TOGGLER

        const account_toggler = document.querySelector('.account-toggler');

        const account_info = document.querySelector('.account-info');

        account_toggler.addEventListener('click', toggleAccount);
       
        function toggleAccount(){
            const setDisplay = account_toggler.checked ? 'block' : 'none';
        
            account_info.style.display = setDisplay;

            document.addEventListener('mouseup', function(e) {

                if (!account_info.contains(e.target)) {
                    account_toggler.checked = false;
                    account_info.style.display = 'none';
                }
            });
        }

    //SCROLL BUTTONS
    const rightBtn = document.querySelector("#scroll-right-lmv");
    const leftBtn = document.querySelector("#scroll-left-lmv");

    const content = document.querySelector(".lo-mas-vendido");

    rightBtn.addEventListener("click", () => {
    content.scrollLeft += 800;
    });

    leftBtn.addEventListener("click", () => {
    content.scrollLeft -= 800;
    });

    //SCROLL NUEVO
    const rightBtnnv = document.querySelector("#scroll-right-nv");
    const leftBtnnv = document.querySelector("#scroll-left-nv");

    const contentnv = document.querySelector(".lanzamientos");

    rightBtnnv.addEventListener("click", () => {
    contentnv.scrollLeft += 800;
    });

    leftBtnnv.addEventListener("click", () => {
    contentnv.scrollLeft -= 800;
    });

    //SCROLL GENERICO (PARA UNA PÁGINA DE UN SOLO SCROLL)
    const rightBtnGeneric = document.querySelector("#scroll-right-Generic");
    const leftBtnGeneric = document.querySelector("#scroll-left-Generic");

    const contentGeneric = document.querySelector(".");

    rightBtnGeneric.addEventListener("click", () => {
    contentGeneric.scrollLeft += 800;
    });

    leftBtnGeneric.addEventListener("click", () => {
    contentGeneric.scrollLeft -= 800;
    });
})



