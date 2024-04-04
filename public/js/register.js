function register(){
 
    let lastName = document.querySelector(".lastNameInput").value;
    let firstName = document.querySelector(".firstNameInput").value; 
    let address = document.querySelector(".address").value; 
    let tel = document.querySelector(".phone").value;
    let email = document.querySelector(".creatEmailInput").value;
    let password = document.querySelector(".creatPasswordInput").value;
    let passwordConfirmation = document.querySelector(".creatPasswordConfirmation").value;
    let rgpd = document.querySelector(".privacyPolicy").checked;

 
if (lastName.length > 3 && lastName.length < 50){ 
    if (firstName.length > 2 && firstName.length <50){
          if(address.length > 10 && address.length < 200){
            if(tel.length == 10){
                if(email.length > 10 && email.length < 200){
                    if(password.length > 7 && password.length < 50){
                        if(password === passwordConfirmation){
                            if(rgpd){
                                let rgpdDate = new Date();

                                let creatUser = {
                                    LastNameUser : lastName,
                                    FirstNameUser: firstName,
                                    AddressUser: address,
                                    TelUser : tel,
                                    EmailUser: email,
                                    PasswordUser: password, 
                                    RgpdUser : rgpdDate, 
                                 };

                                let params = {
                                    method: "POST",
                                    headers: {
                                    "Content-Type": "application/json; charset=utf-8",
                                    },
                                body: JSON.stringify(creatUser),
                                };

                               fetch("/addUser", params)
                                    .then((res) => res.text())
                                    .then((data)=> {
                                        location.href = data;
                                    }).catch((error) => {
                                        console.log(error);
                                    });
                            }else{
                                console.log("error rgpd")
                            };
                        }else{
                            console.log("error confirma")
                        };
                    }else{
                        console.log("error length")
                    };
                }else{
                    console.log("error email")
                };
            }else{
                console.log("error tel")
            };
        }else{
            console.log("error adres")
        };
    }else{
        console.log("error first")
    };
}else{
    console.log("errorlast")
};

function handleFetchResponse(data){       
        if(data === "Email already taken")
        {
          let toast = document.querySelector(".toast")
          toast.innerText = data
        }
        else if(data==='succes') 
        {     
            loginModal();
        }  
        else
        {
          let text = document.querySelector(".toast")
          let toast = document.getElementById("creatToast")
          text.innerText = data 
          toast.classList.remove("hidden")
        } 
}
}

function loginModal()
{
    let creatModal = document.getElementById("creatAccount")
    let loginModal = document.getElementById("loginModal")
    creatModal.classList.add("hidden")
    loginModal.classList.remove("hidden")
}