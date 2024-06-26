let body = document.body;


let searchForm = document.querySelector('.header .flex .search-form');

let sideBar = document.querySelector('.side-bar');
document.querySelector('#menu-btn').onclick = () =>{
   sideBar.classList.toggle('active');
   body.classList.toggle('active');
}
document.querySelector('.side-bar .close-side-bar').onclick = () =>{
   sideBar.classList.remove('active');
   body.classList.remove('active');
}
window.onscroll = () =>{
   profile.classList.remove('active');
   searchForm.classList.remove('active');
   if(window.innerWidth < 1200){
      sideBar.classList.remove('active');
      body.classList.remove('active');
   }
}

let darkMode = localStorage.getItem('dark-mode');
const enabelDarkMode = () =>{
   toggleBtn.classList.replace('fa-sun', 'fa-moon');
   body.classList.add('dark');
   localStorage.setItem('dark-mode', 'enabled');
}
const disableDarkMode = () =>{
   toggleBtn.classList.replace('fa-moon', 'fa-sun');
   body.classList.remove('dark');
   localStorage.setItem('dark-mode', 'disabled');
}
toggleBtn.onclick = (e) =>{
   let darkMode = localStorage.getItem('dark-mode');
   if(darkMode === 'disabled'){
      enabelDarkMode();
   }else{
      disableDarkMode();
   }
}
if(darkMode === 'enabled'){
   enabelDarkMode();
}


