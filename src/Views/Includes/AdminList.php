<div id="dashboard" class="flex modal top-0 w-screen min-h-screen bg-gradient-to-b from-teal-400 from-5% via-red-400 via-35%  to-yellow-200 to-95% justify-end ">
    <div class="w-8/12 justify-around flex mr-10">
        <div class="w-2/5 h-5/6 bg-white my-20 rounded-2xl flex flex-col items-center py-10">

        <?php

        use src\Models\Database;
        use src\Repositories\ResaRepository;
        use src\Repositories\UserRepository;

        $database = new Database;
        $UserRepository = new UserRepository($database);
        $allUsers = $UserRepository->getAllUser();
        foreach($allUsers as $userAdmin) { ?>
            <div class="w-5/6 h-48 bg-white drop-shadow-md rounded-2xl my-5 ">
                <p>Nom = <?= $userAdmin->getLastNameUser() ?></p>
                <p>Prenom = <?= $userAdmin->getFirstNameUser() ?></p>
                <p>Tel = <?= $userAdmin->getTelUser() ?></p>
                <p>Address = <?= $userAdmin->getAddressUser() ?></p>
                <p>Email = <?= $userAdmin->getEmailUser() ?></p>
            </div>
        <?php
        }
        ?>
        </div>
        <div class="w-2/5 h-5/6 bg-white my-20 rounded-2xl flex flex-col items-center py-10">
        <?php
        $ResaRepository = new ResaRepository($database);
        $allResas = $ResaRepository->getAllResa();
        foreach($allResas as $resa){?>
            <div class="w-5/6 h-48 bg-white drop-shadow-md rounded-2xl my-5 ">
                <p> Utilisateur n° = <?= $resa->getIdUser() ?></p>
                <p> Total = <?= $resa->getPriceResa() ?></p>
            </div>
        <?php
        }
        ?>

        </div>
    </div>
</div