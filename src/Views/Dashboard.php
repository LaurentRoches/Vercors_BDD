<?php

include __DIR__ . '/Includes/header.php';

?>

<div id="dashboard" class="modal top-0 w-screen  min-h-screen bg-gradient-to-b from-teal-400 from-5% via-red-400 via-35%  to-yellow-200 to-95% ">
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
                echo "Lanquette"
                ?>
            </div>
        </div>
        <div class="mt-60 h-10 mb-8 w-4/6 bg-red-400 rounded-full hover:bg-red-600">
            <p class="leading-6 pt-2 text-center uppercase text-white text-xs font-bold" onclick="logout()">Deconnexion</p>
        </div>
    </div>
</div>

<?php

include __DIR__ . '/Includes/footer.php';

?>