function creatModal(){
    let creatModal = document.getElementById("creatAccount");
    let loginModal = document.getElementById("loginModal");
    creatModal.classList.remove("hidden");
    loginModal.classList.add("hidden");
}

function loginAccount() {

    let password = document.querySelector('.passwordInput').value;
    let email = document.querySelector('.emailInput').value;

    if(email.length > 10 && email.length < 200){
        if(password.length > 7 && password.length < 50){
            let userCredentials = {
                PasswordUser : password,
                EmailUser : email
            }
            let params = {
                method: "POST",
                headers: {
                    "Content-Type": "application/json; charset=utf-8",
                },
                body: JSON.stringify(userCredentials),
            };
            fetch("/login", params)
                .then((res) => res.text())
                .then((data)=> {
                    location.href = data;
                }).catch((error) => {
                    console.log(error);
                });
        } else {
            console.log("erreur password");
        }
    } else {
        console.log("erreur email");
    }
}
