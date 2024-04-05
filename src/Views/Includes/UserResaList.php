<div id="dashboard" class="flex modal top-0 w-screen min-h-screen bg-gradient-to-b from-teal-400 from-5% via-red-400 via-35%  to-yellow-200 to-95% justify-end">
    <div class="w-8/12 justify-items-end flex flex-wrap">

        <?php

        use src\Models\Database;
        use src\Repositories\NightRepository;
        use src\Repositories\PassRepository;
        use src\Repositories\ResaRepository;

        $database = new Database;
        $resaRepository = new ResaRepository($database);
        $allResas = $resaRepository->getAllResaByUserId($user->getIdUser());
        $PassRepository = new PassRepository($database);


        foreach ($allResas as $resa) {
            $pass = $PassRepository->getPassByIdTache($resa->getIdResa());
            $NightRepository = new NightRepository($database);
            $nights = $NightRepository->getNightByIdResa($resa->getIdResa()); ?>
            <div class="w-80 h-min bg-white mx-10 mt-10 rounded-2xl p-5">
                <p class="font-bold pb-5">Votre réservation :</p>

                <?php
                if ($resa->isReducResa()) { ?>
                    <p> Vous avez choisi le tarif réduit </p>
                <?php
                }
                foreach ($pass as $journee) { ?>
                    <p> Vous avez reservé un <?= $journee->getNamePass() ?></p>
                    <p> A la date du <?= $journee->getDatePass() ?></p>
                <?php
                };
                foreach ($nights as $night) { ?>
                    <p> Vous avez choisi <?= $night->getNameNight() ?> </p>
                <?php
                }
                if ($resa->isKidsResa()) { ?>
                    <p> Vous avez choisi de venir avec des enfants </p>
                    <p> Vous avez pris <?= $resa->getHeadsetResa() ?> casques anti-bruit</p>
                <?php
                }
                ?>
                <p> Vous avez réserver <?= $resa->getSledResa() ?> descente de luge </p>
                <p> Pour un total de <?= $resa->getPriceResa() ?> euros</p>
            </div>
        <?php
        }
        ?>

    </div>
</div>