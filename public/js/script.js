const portfoliosor = (button)=>{
    //console.log(button);
    let category = button.getAttribute('data-category');
    let portitems = document.querySelectorAll('.meni-single-item');

    portitems.forEach((item) => {
            item.style.display = 'none';
    });


    portitems.forEach((item) => {
        if (item.getAttribute('data-category').includes(category)) {
            item.style.display = 'block';
        }
    });
};

window.onscroll = () =>{
    let sectionforanim=document.querySelector('.aboutsec');
    let sectionposition=sectionforanim.getBoundingClientRect().top;
    let screenpos=window.innerWidth;

    //console.log(`SCREEN ${screenpos}`);
    //console.log(`SECTION ${sectionposition}`);

    if(sectionposition<407)
    {
        let header=document.querySelector('header');
        header.style.boxShadow="rgba(0,0,0,1) 0 0 0 10000px inset";
    }
    else if(sectionposition>407)
    {
        let header=document.querySelector('header');
        header.style.boxShadow="rgba(0,0,0,0.3) 0 0 0 10000px inset";
    }
    if(sectionposition<647)
    {
        setInterval(()=>{
            let tekst = document.querySelector('.aboutsec .leviabout h2');
            tekst.style.opacity='1';
            tekst.style.transform='translateY(0px)';
        },300);
        setInterval(()=>{
            let teksth = document.querySelector('.aboutsec .leviabout h1');
            teksth.style.opacity='1';
            teksth.style.transform='translateY(0px)';
        },600);
        setInterval(()=>{
            let tekstp = document.querySelector('.aboutsec .leviabout p');
            tekstp.style.opacity='1';
            tekstp.style.transform='translateY(0px)';
        },900);
        setInterval(()=>{
            let tekstbt = document.querySelector('.aboutsec .leviabout #aposao');
            tekstbt.style.opacity='1';
            tekstbt.style.transform='translateY(0px)';
        },1500);
        setInterval(()=>{
            let teksthd = document.querySelector('.aboutsec .desno-radno h1');
            teksthd.style.opacity='1';
            teksthd.style.transform='translateY(0px)';
        },1800);
        setInterval(()=>{
            let teksthd = document.querySelector('.aboutsec .desno-radno #radnih');
            teksthd.style.opacity='1';
            teksthd.style.transform='translateY(0px)';
        },2000);
        setInterval(()=>{
            let teksthd = document.querySelector('.aboutsec .desno-radno #radnip');
            teksthd.style.opacity='1';
            teksthd.style.transform='translateY(0px)';
        },2200);
        setInterval(()=>{
            let teksthd = document.querySelector('.aboutsec .desno-radno #radnihd');
            teksthd.style.opacity='1';
            teksthd.style.transform='translateY(0px)';
        },2500);
        setInterval(()=>{
            let teksthd = document.querySelector('.aboutsec .desno-radno #radnipd');
            teksthd.style.opacity='1';
            teksthd.style.transform='translateY(0px)';
        },2700);
    }
    if(sectionposition<215)
    {
        setInterval(()=>{
            let teksthd = document.querySelector('.meni h1');
            teksthd.style.opacity='1';
            teksthd.style.transform='translateY(0px)';
        },400);
        setInterval(()=>{
            let teksthd = document.querySelector('.meni .meni-kategorije');
            teksthd.style.opacity='1';
            teksthd.style.transform='translateY(0px)';
        },600);
    }
};



window.onload = () =>{
    setInterval(()=>{
        let tekst = document.querySelector('.hero-sec #heropj');
        tekst.className='fademove';
    },300);
    setInterval(()=>{
        let teksth = document.querySelector('.hero-sec h1');
        teksth.className='fademove';
    },700);
    setInterval(()=>{
        let tekstpd = document.querySelector('.hero-sec #heropd');
        tekstpd.className='fademove';
    },1000);
    setInterval(()=>{
        let tekstb = document.querySelector('.hero-sec button');
        tekstb.className='fademove';
    },1400);
};

let menuopen=document.querySelector('#menuopen');

menuopen.addEventListener('click',()=>{
    let header = document.querySelector('header');
    header.style.background='black';
    let menu=document.querySelector('header .right-nav ul');
    menu.style.display='block';


    menuopen.style.display='none';
    let close=document.querySelector('.openmenuclas h5');
    close.style.display='block';

    close.addEventListener('click',()=>{
        menu.style.display='none';
        close.style.display='none';
        menuopen.style.display='block';
    })
    /*close.innerHTML='<h5 style="color:white;" id="closemenus">X</h5>';

    let closemenu=document.querySelector('#closemenus');
    closemenu.addEventListener('click',()=>{
        menu.style.display='none';
        closemenu.style.display='none';
        close.innerHTML=' ';
        menuopen.style.display='block';
    })*/
});