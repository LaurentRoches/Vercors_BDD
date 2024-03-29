<?php

require_once __DIR__ . '/../src/init.php';

if(isset($_GET["req"])){
    switch($_GET["req"]){
        case "register":
            require __DIR__."/../src/Traitements/register.php";
            break;
        case "login":
            require __DIR__."/../src/Traitements/login.php";
            break;
    }
}else{

    if(isset($_SESSION["user"])){
        $User = unserialize($_SESSION["user"]);
    }


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vercors festival </title>
    <link rel="shortcut icon" type="image/png" href="./img/favicon.ico" />
</head>

<body class="relative">
    <!-- Creat Account Modal -->
    <!-- <div id="creatAccount" class="modal py-24 px-10 top-0 w-screen  min-h-screen bg-gradient-to-b from-teal-400 from-5% via-red-400 via-35%  to-yellow-200 to-95% ">
        <div class="flex flex-col justify-center px-8 max-w-2xl mx-auto bg-white rounded-3xl">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-16 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 uppercase text-black text-s font-bold">Creat account</h2>
            </div>
            <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
                <div class="space-y-6">

                    <div>
                        <label for="lastName" class="block text-sm font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">Last Name</label>
                        <div class="mt-2">
                            <input id="lastName" name="lastName" type="texte" required class="block w-full bg-orange-50 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-orange-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-500 sm:text-sm sm:leading-6 indent-3 lastNameInput">
                        </div>
                    </div>

                    <div>
                        <label for="firstName" class="block text-sm font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">First Name</label>
                        <div class="mt-2">
                            <input id="firstName" name="firstName" type="texte" required class="block w-full bg-orange-50 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-orange-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-500 sm:text-sm sm:leading-6 indent-3 firstNameInput">
                        </div>
                    </div>


                    <div>
                        <div class="flex items-center justify-between">
                            <label for="address" class="block text-sm font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">Address</label>
                        </div>
                        <div class="mt-2">
                            <input id="address" name="address" type="text" required class="block w-full bg-orange-50 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-orange-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-500 sm:text-sm sm:leading-6 indent-3 address">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="phone" class="block text-sm font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">Phone</label>
                        </div>
                        <div class="mt-2">
                            <input id="phone" name="phone" type="text" required class="block w-full bg-orange-50 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-orange-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-500 sm:text-sm sm:leading-6 indent-3 phone">
                        </div>
                    </div>

                    <div>
                        <label for="creatEmail" class="block text-sm font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">Email address</label>
                        <div class="mt-2">
                            <input id="creatEmail" name="creatEmail" type="email" autocomplete="email" required class="block w-full bg-orange-50 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-orange-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-500 sm:text-sm sm:leading-6 indent-3 creatEmailInput">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="creatPassword" class="block text-sm font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">Password</label>
                        </div>
                        <div class="mt-2">
                            <input id="creatPassword" name="creatPassword" type="password" required class="block w-full bg-orange-50 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-orange-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-500 sm:text-sm sm:leading-6 indent-3 creatPasswordInput ">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="creatPasswordConfirmation" class="block text-sm font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">Password confirmation</label>
                        </div>
                        <div class="mt-2">
                            <input id="creatPasswordConfirmation" name="creatPasswordConfirmation" type="password" required class="block w-full bg-orange-50 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-orange-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-500 sm:text-sm sm:leading-6 indent-3 creatPasswordConfirmation">
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <div class="flex items-center">
                            <input id="privacyPolicy" name="privacyPolicy" type="checkbox" required class="w-4 h-4 mx-4 privacyPolicy">
                        </div>
                        <div class="flex items-center justify-between">
                            <label for="privacyPolicy" class="block text-sm font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold ">I agree to Privacy Policy</label>
                        </div>

                    </div>

                    <div id="creatToast" class="hidden">
                        <p class=" toast flex w-full justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white uppercase text-s font-semibold opacity-80 ">
                        </p>
                    </div>

                    <div>
                        <button onclick="register()" class="my-10 flex w-full justify-center rounded-md bg-orange-300 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 uppercase text-white text-s font-semibold">Creat account</button>
                    </div>

                    <div>
                        <button onclick="loginModal()" class=" flex w-full justify-center rounded-md mb-16 bg-orange-300 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 uppercase text-white text-s font-semibold">Already member ? Just login</button>
                    </div>

                </div>
            </div>
        </div>
    </div> -->


    <!-- Login modal -->
    <!-- <div id="loginModal" class="hidden modal flex items-center  px-10 top-0 w-screen h-screen bg-gradient-to-b from-teal-400 from-5% via-red-400 via-35%  to-yellow-200 to-95% ">
        <div class="flex flex-col justify-center px-8 max-w-2xl mx-auto bg-white rounded-3xl">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm ">
                <h2 class="mt-16 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 uppercase text-black text-s font-bold">Login</h2>
            </div>
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

                <div class="space-y-6">

                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">Email address</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required class="block w-full bg-orange-50 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-orange-300  placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-500 sm:text-sm sm:leading-6 indent-3 emailInput">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">Password</label>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full bg-orange-50 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-orange-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-500 sm:text-sm sm:leading-6 indent-3 passwordInput mb-10">
                        </div>
                    </div>
                    <div id="loginToast" class="hidden">
                        <p id="loginToastText" class=" toast flex w-full justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white uppercase text-s font-semibold opacity-80 ">
                        </p>
                    </div>

                    <div>
                        <button onclick="loginAccount()" class=" my-10 flex w-full justify-center rounded-md bg-orange-300 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 uppercase text-white text-s font-semibold">Login</button>
                    </div>
                    <div>
                        <button onclick="creatModal()" class=" mb-16 flex w-full justify-center rounded-md bg-orange-300 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 uppercase text-white text-s font-semibold">Not a member ? Creat an account</button>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Test formulaire -->
    <div class="modal py-24 px-10 top-0 w-screen  min-h-screen bg-gradient-to-b from-teal-400 from-5% via-red-400 via-35%  to-yellow-200 to-95% items-center justify-center">
        <fieldset id="reservation" class="flex flex-col justify-center px-8 max-w-2xl mx-auto bg-white rounded-3xl m-2">
            <legend class="mt-16 text-center text-3xl font-bold leading-9 tracking-tight text-gray-900 uppercase text-black font-bold">Réservation</legend>
      <?php 
    //   if($code_erreur === 0){
        ?>
        <!-- <div class="erreur">Une erreur est survenue, veuillez ré-éssayer plus tard</div> -->
      <?php
    //   }
      ?>
        <h3 class="block font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold text-center text-2xl m-2  my-4">Nombre de réservation(s) :</h3>
        <input type="number" name="nombrePlaces" id="NombrePlaces" required class="peer h-full w-full rounded-md border border-orange-gray-200 border-t-transparent bg-transparent px-3 py-3 font-sans text-sm font-normal text-orange-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-orange-gray-200 placeholder-shown:border-t-orange-gray-200 focus:border-2 focus:border-orange-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-orange-gray-50 m-2">
      <?php 
    //   if($code_erreur === 2){
        ?>
        <!-- <div class="erreur">Veuillez entrer un nombre de réservation</div> -->
      <?php
    //   }
      ?>
        <h3 class="block font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold text-center text-2xl m-2  my-4">Réservation(s) en tarif réduit</h3>
        <div class="flex">
            <label for="tarifReduit" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Ma réservation sera en tarif réduit</label>
            <input type="checkbox" name="tarifReduit" id="tarifReduit" >
        </div>

        <h3 class="block font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold text-center text-2xl m-2  my-4">Choisissez votre formule :</h3>
        <div class="flex">
            <label for="pass1jour" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Pass 1 jour : 40€</label>
            <input type="checkbox" name="pass1jour" id="pass1jour" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">
        </div>
        <div class="flex">
            <label for="pass1jour" style="display:none;" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Pass 1 jour : 25€</label>
            <input type="checkbox" name="pass1jourReduit" id="pass1jourReduit" style="display:none;" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">
        </div>
      <!-- Si case cochée, afficher le choix du jour -->
        <section id="pass1jourDate" style="display:none;">
            <div class="flex">
                <label for="choixJour1" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Pass pour la journée du 01/07</label>
                <input type="checkbox" name="choixJour1" id="choixJour1" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">
            </div>
            <div class="flex">
                <label for="choixJour2" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Pass pour la journée du 02/07</label>
                <input type="checkbox" name="choixJour2" id="choixJour2" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">
            </div>
            <div class="flex">
                <label for="choixJour3" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Pass pour la journée du 03/07</label>
                <input type="checkbox" name="choixJour3" id="choixJour3" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">
            </div>
        </section>

        <div class="flex">
            <label for="pass2jours" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Pass 2 jours : 70€</label>
            <input type="checkbox" name="pass2jours" id="pass2jours" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">
        </div>
        <div class="flex">
            <label for="pass2jours" style="display:none;" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Pass 2 jours : 50€</label>
            <input type="checkbox" name="pass2joursReduit" id="pass2joursReduit" style="display:none;" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">
        </div>
      <!-- Si case cochée, afficher le choix des jours -->
        <section id="pass2joursDate" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold" style="display:none;">
            <div class="flex">
                <label for="choixJour12" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Pass pour deux journées du 01/07 au 02/07</label>
                <input type="checkbox" name="choixJour12" id="choixJour12" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">
            </div>
            <div class="flex">
                <label for="choixJour23" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Pass pour deux journées du 02/07 au 03/07</label>
                <input type="checkbox" name="choixJour23" id="choixJour23" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">
            </div>
        </section>

        <div class="flex">
            <label for="pass3jours" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Pass 3 jours : 100€</label>
            <input type="checkbox" name="pass3jours" id="pass3jours" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">
        </div>
        <div class="flex">
            <label for="pass3jours" style="display:none;" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Pass 3 jours : 65€</label>
            <input type="checkbox" name="pass3joursReduit" id="pass3joursReduit" style="display:none;" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">
        </div>

      <!-- FACULTATIF : ajouter un pass groupe (5 adultes : 150€ / jour) uniquement pass 1 jour -->

      <button class="bouton block w-full select-none rounded-lg bg-gradient-to-tr from-orange-400 to-orange-300 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-orange-300/20 transition-all hover:shadow-lg hover:shadow-orange-300/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="submit" data-ripple-light="true" onclick="suivant('options')"><span class="text-lg">Suivant</span></button>
  </fieldset>

  <fieldset id="options" style="display:none;" class="flex flex-col justify-center px-8 max-w-2xl mx-auto bg-white rounded-3xl m-2">
        <legend class="mt-16 text-center text-3xl font-bold leading-9 tracking-tight text-gray-900 uppercase text-black font-bold">Options</legend>
        <h3 class="block font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold text-center text-2xl m-2 my-4">Réserver un emplacement de tente : </h3>
        <div class="flex">
            <label for="tenteNuit1" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Pour la nuit du 01/07 (5€)</label>
            <input type="checkbox" id="tenteNuit1" name="tenteNuit1"class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">
        </div>
        <div class="flex">
            <label for="tenteNuit2" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Pour la nuit du 02/07 (5€)</label>
            <input type="checkbox" id="tenteNuit2" name="tenteNuit2"class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">
        </div>
        <div class="flex">
            <label for="tenteNuit3" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Pour la nuit du 03/07 (5€)</label>
            <input type="checkbox" id="tenteNuit3" name="tenteNuit3"class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">
        </div>
        <div class="flex">
            <label for="tente3Nuits" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Pour les 3 nuits (12€)</label>
            <input type="checkbox" id="tente3Nuits" name="tente3Nuits"class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">
        </div>

        <h3 class="block font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold text-center text-2xl m-2  my-4">Réserver un emplacement de camion aménagé : </h3>
        <div class="flex">
            <label for="vanNuit1" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Pour la nuit du 01/07 (5€)</label>
            <input type="checkbox" id="vanNuit1" name="vanNuit1"class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">
        </div>
        <div class="flex">
            <label for="vanNuit2" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Pour la nuit du 02/07 (5€)</label>
            <input type="checkbox" id="vanNuit2" name="vanNuit2"class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">
        </div>
        <div class="flex">
            <label for="vanNuit3" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Pour la nuit du 03/07 (5€)</label>
            <input type="checkbox" id="vanNuit3" name="vanNuit3"class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">
        </div>
        <div class="flex">
            <label for="van3Nuits"  class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Pour les 3 nuits (12€)</label>
            <input type="checkbox" id="van3Nuits" name="van3Nuits" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">
        </div>

        <h3 class="block font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold text-center text-2xl m-2 my-4">Venez-vous avec des enfants ?</h3>
        <div class="flex justify-around align-center">
            <div class="flex">
                <label for="enfantsOui" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Oui</label>
                <input type="checkbox" name="enfantsOui" id="enfantsOui" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">
            </div>
            <div class="flex">
                <label for="enfantsNon" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Non</label>
                <input type="checkbox" name="enfantsNon" id="enfantsNon" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">
            </div>
        </div>

      <!-- Si oui, afficher : -->
      <section id="demonsPresent">
            <h4 class="block font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold text-center text-2xl m-2">Voulez-vous louer un casque antibruit pour enfants* (2€ / casque) ?</h4>
            <div class="flex">
                <label for="nombreCasquesEnfants" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Nombre de casques souhaités :</label>
                <input type="number" name="nombreCasquesEnfants" id="nombreCasquesEnfants" class="peer h-full w-full rounded-md border border-orange-gray-200 border-t-transparent bg-transparent px-3 py-3 font-sans text-sm font-normal text-orange-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-orange-gray-200 placeholder-shown:border-t-orange-gray-200 focus:border-2 focus:border-orange-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-orange-gray-50 m-2">
            </div>
        <?php 
        // if($code_erreur === 3){
          ?>
          <!-- <div class="erreur">Veuillez entrer le nombre de casques souhaité</div> -->
        <?php
        // }
        ?>
        <p>*Dans la limite des stocks disponibles.</p>
      </section>


        <h3 class="block font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold text-center text-2xl m-2">Profitez de descentes en luge d'été à tarifs avantageux ! (5€)</h3>
        <div class="flex">
            <label for="NombreLugesEte" class="block text-lg font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold m-2">Nombre de descentes en luge d'été :</label>
            <input type="number" name="NombreLugesEte" id="NombreLugesEte" class="peer h-full w-full rounded-md border border-orange-gray-200 border-t-transparent bg-transparent px-3 py-3 font-sans text-sm font-normal text-orange-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-orange-gray-200 placeholder-shown:border-t-orange-gray-200 focus:border-2 focus:border-orange-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-orange-gray-50 m-2">
        </div>
      <?php 
      // if($code_erreur === 4){
        ?>
        <!-- <div class="erreur">Veuillez entrer le nombre de descentes souhaité</div> -->
      <?php
      // }
      ?>
      <button class="bouton block w-full select-none rounded-lg bg-gradient-to-tr from-orange-400 to-orange-300 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-orange-300/20 transition-all hover:shadow-lg hover:shadow-orange-300/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="submit" data-ripple-light="true" onclick="suivant('coordonnees')">Suivant</button>
    </fieldset>
</div>

</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src="./js/register.js"></script>
<script src="./js/login.js"></script>
<script src="./js/resaFormulaire.js"></script>

</html>
<?php
}