// let headerClass = document.querySelector('.header-fixed')
//  let navContainer = document.querySelector('.nav-container')

// if(headerClass == 'header-fixed'){
//     navContainer.style.position = 'fixed'
// }
// else{
//     navContainer.style.position = 'none'
// }

// window.addEventListener('scroll', ()=>{
//     let header = document.querySelector('header')
//     header.classList.toggle('header-fixed',window.scrollY>0.2)
//     if(header == 'header-fixed'){
//         navContainer.style.position = 'fixed'
//     }
//     else{
//         navContainer.style.position = 'none'
//     }
// })
window.onscroll = () =>{
    let sectionforanim=document.querySelector('.aboutsec');
    let sectionposition=sectionforanim.getBoundingClientRect().top;
    let screenpos=window.innerWidth;

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
};
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
});
