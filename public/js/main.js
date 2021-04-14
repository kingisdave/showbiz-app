document.getElementById('mytoggler').addEventListener('click', myFunc);		
function myFunc(){
    var wrapper = document.querySelector('.wrapper');
    wrapper.classList.toggle('active');
   
}
