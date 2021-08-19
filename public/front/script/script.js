AOS.init();

const burger = document.querySelector('.burger');
const navItems = document.querySelector('.mobileNav ul');

burger.addEventListener('click', () => {
  navItems.classList.toggle('active');
});

document.body.addEventListener('click', (e) => {
  const target = e.target.classList.value;

  if( navItems.classList.contains('active') ) {
    if(target === 'burger' || target === 'link') {
      return;
    } else {
      navItems.classList.remove('active');
    }
  }
});


// DROPDOWN
const dropdownTitle = document.querySelector('.title');
const menu = document.querySelector('.menu');
const menuOptions = document.querySelectorAll('.option');

// SHOW / HIDE -> DROPDOWN
dropdownTitle.addEventListener('click', () => {
  menu.classList.toggle('active');
});

// HANDLE ON OPTION
menuOptions.forEach( (item) => {
  item.addEventListener('click', (e) => {
    dropdownTitle.innerText = e.target.innerText;
    menu.classList.remove('active');
  });
})

// SELECTLANGUAGE MOBILE
const options = document.querySelectorAll('.option2');

options.forEach((elem, idx, arr) => { 
  elem.addEventListener('click', (e) => {
    arr.forEach((e) =>{
      e.childNodes[1].classList.remove('selected');
    });
    e.target.classList.toggle('selected');
  });
});