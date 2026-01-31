function checkErrCode(){
    const params = new URLSearchParams(window.location.search);
    const value = params.get('errcode');
    if(value === '7'){
        alert("Existing username");
    }else if(value === '8'){
      alert("Password is shorter than 8 characters")
    }   
}