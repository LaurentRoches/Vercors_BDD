function reserver(){
 
// première section

    let nombrePlaces = document.getElementById("NombrePlaces").value;
    let tarifReduit = document.getElementById("tarifReduit").checked;
   



// deuxième section
    let nombreCasquesEnfants = document.getElementById("nombreCasquesEnfants").value; 
    let nombreLugesEte = document.getElementById("NombreLugesEte").value; 
    let enfantsOui = document.getElementById("enfantsOui").checked;
    let enfantsNon = document.getElementById("enfantsNon").checked;
    let kidResa = '';

if (nombrePlaces > 0 && nombrePlaces < 9999){ 
    if (nombreCasquesEnfants > 0 && nombreCasquesEnfants < 9999){ 
        if (nombreLugesEte > 0 && nombreLugesEte < 9999){ 
            if (enfantsOui){ 
                kidResa = true
            }else if(enfantsNon){
                kidResa = false
                }

                let creatResa = {
                    ReducResa : tarifReduit,
                    KidsResa: kidResa ,
                    HeadsetResa: nombreCasquesEnfants,
                    SledResa : nombreLugesEte,
                    PriceResa:'',
                    IdUser:'', 
                    };

                let params = {
                        method: "POST",
                        headers: {
                        "Content-Type": "application/json; charset=utf-8",
                        },
                        body: JSON.stringify(creatResa),
                };

                fetch("/addResa", params)
                .then((res) => res.text())
                .then((data)=> {
                    location.href = data;
                }).catch((error) => {
                console.log(error);
        });}else{
            console.log("errorNombreLuge")
        };
    }else{
        console.log("errorNombreCasque")
    };
}else{
    console.log("errorNombreResa")
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
    
}
}