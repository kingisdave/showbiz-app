confirmPassword=()=>{
    var inputOne = document.querySelector('.fPassword');
    var inputChange = document.querySelector('.cPassword');

    if(inputChange.value === inputOne.value){
        inputChange.style.border = '2px solid #ccc';
        document.querySelector('.floatPass').style.color = '#000';
    } else{
        inputChange.style.border = '2px solid red';
        document.querySelector('.floatPass').style.color = 'red';
    }   
}