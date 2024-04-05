<div id="dashboard" class="flex modal top-0 w-screen min-h-screen bg-gradient-to-b from-teal-400 from-5% via-red-400 via-35%  to-yellow-200 to-95% justify-end ">
    <div class="w-8/12 justify-around flex mr-10">
        <div class="w-2/5 h-5/6 bg-white my-20 rounded-2xl flex flex-col items-center py-10">

        <?php

        use src\Models\Database;
        use src\Repositories\ResaRepository;
        use src\Repositories\UserRepository;
        use src\Repositories\NightRepository;
        use src\Repositories\PassRepository;

        $database = new Database;
        $UserRepository = new UserRepository($database);
        $allUsers = $UserRepository->getAllUser();
        $ResaRepository = new ResaRepository($database);
        $allResas = $ResaRepository->getAllResa();
        $PassRepository = new PassRepository($database);
        $pass = $PassRepository->getPassByIdTache($resa->getIdResa());
        $NightRepository = new NightRepository($database);
        $nights =$NightRepository->getNightByIdResa($resa->getIdResa());

        foreach($allUsers as $userAdmin) { ?>
            <div class="w-5/6 h-48 bg-white drop-shadow-md rounded-2xl my-5 ">
                <p>Id = <?= $userAdmin->getIdUser() ?></p>
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
        foreach($allResas as $resa){?>
            <div class="w-5/6 h-48 bg-white drop-shadow-md rounded-2xl my-5 ">
            <p> Utilisateur n° = <?= $resa->getIdUser() ?></p>
            <?php
        if ($resa->isReducResa()){ ?>
        <p> Vous avez choisi le tarif réduit </p>
        <?php
        }
        foreach($pass as $journee) {?>
        <p> Vous avez reservé un <?= $journee->getNamePass() ?></p>
        <p> pour la journée du <?= $journee->getDatePass() ?></p>
        <?php
        };
        foreach($nights as $night) { ?>
        <p> Vous avez choisi <?= $night->getNameNight() ?> </p> 
        <?php
        }
        if ($resa->isKidsResa()){ ?>
            <p> Vous avez choisi de venir avec des enfants </p>
            <p> Vous avez pris <?= $resa->getHeadsetResa() ?> casques anti-bruit</p>
            <?php
        }
        ?>
        <p> Vous avez réserver <?= $resa->getSledResa() ?> descente de luge </p>
        <p> Pour un total = <?= $resa->getPriceResa() ?></p>
            </div>
            <?php
        }
        ?>

        </div>
    </div>
</div