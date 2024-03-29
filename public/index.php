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
    <div id="creatAccount" class="modal py-24 px-10 top-0 w-screen  min-h-screen bg-gradient-to-b from-teal-400 from-5% via-red-400 via-35%  to-yellow-200 to-95% ">
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
    </div>


    <!-- Login modal -->
    <div id="loginModal" class="hidden modal flex items-center  px-10 top-0 w-screen h-screen bg-gradient-to-b from-teal-400 from-5% via-red-400 via-35%  to-yellow-200 to-95% ">
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
    </div>

</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src="./js/register.js"></script>
<script src="./js/login.js"></script>

</html>
<?php
}