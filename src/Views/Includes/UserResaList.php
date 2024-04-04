<div id="dashboard" class="flex modal top-0 w-screen min-h-screen bg-gradient-to-b from-teal-400 from-5% via-red-400 via-35%  to-yellow-200 to-95% justify-end">
    <div class="w-8/12 justify-items-end flex flex-wrap">

    <?php

use src\Models\Database;
use src\Repositories\ResaRepository;

    $database = new Database;
    $resaRepository = new ResaRepository($database);
    $allResas = $resaRepository->getAllResaByUserId($user->getIdUser());

    foreach($allResas as $resa) { ?>
    <div class="w-80 h-52 bg-white mx-10 my-10 rounded-2xl">
        <p> Total = <?= $resa->PriceResa() ?></p>
    </div>
    <?php
    }
    ?>

    </div>
</div>