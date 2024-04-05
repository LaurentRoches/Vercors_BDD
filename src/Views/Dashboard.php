<?php

include __DIR__ . '/Includes/header.php';

?>

<div id="dashboard" class="modal top-0 w-screen  min-h-screen bg-gradient-to-b from-teal-400 from-5% via-red-400 via-35%  to-yellow-200 to-95% ">
    <!-- La colonne -->
    <div class=" h-dvh w-1/5 flex-col flex items-center bg-white justify-between fixed ">
        <div class="w-4/6 flex flex-col items-center">
            <div class=" xl:h-44 lg:h-36 md:h-32 sm:h-24 xl:w-44 lg:w-36 md:w-32 sm:w-24 bg-orange-100 my-8 rounded-full"></div>
            <div class="w-full h-10 bg-orange-100 rounded-full mt-6 text-center pt-2 uppercase text-black text-s font-semibold">
                <?php
                echo $user->getFirstNameUser();
                ?>
            </div>
            <div class="w-full h-10 bg-orange-100 rounded-full mt-6 text-center pt-2 uppercase text-black text-s font-semibold">
                <?php
                echo $user->getLastNameUser();
                ?>
            </div>
        </div>
        <button onclick="location.href='<?= HOME_URL ?>pageResa'" id="openModalResa" class="flex-col flex items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            <span class="mt-0">Nouvelle</span>
            <span class="mt-0">Réservation</span>
        </button>
        <div class="flex justify-center mt-60 h-10 mb-8 w-4/6 bg-red-400 rounded-full hover:bg-red-600 pt-1">
            <button class="leading-6 pt-2 flex content-center justify-center text-center uppercase text-white text-xs font-bold" onclick="location.href='<?= HOME_URL ?>deconnexion'"><span class="text-center uppercase text-white text-xs font-bold content-center justify-center">Deconnexion</span></button>
        </div>
    </div>
    <!-- Zone include views -->
    <?php
    switch ($user->getRoleUser()) {
        case 'User':
            include __DIR__ . '/Includes/UserResaList.php';
            break;
        case 'Admin':
            include __DIR__ . '/Includes/AdminList.php';
            break;
        default:
            echo "qu'es-tu?";
            break;
    }
    ?>
</div>

<?php

include __DIR__ . '/Includes/footer.php';

?>