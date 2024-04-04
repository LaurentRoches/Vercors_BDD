<?php

include __DIR__ . '/Includes/header.php';

?>

<form action="/addResa" method="POST" class="modal py-24 px-10 top-0 w-screen  min-h-screen bg-gradient-to-b from-teal-400 from-5% via-red-400 via-35%  to-yellow-200 to-95% items-center justify-center">
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
      <button class="bouton block w-full select-none rounded-lg bg-gradient-to-tr from-orange-400 to-orange-300 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-orange-300/20 transition-all hover:shadow-lg hover:shadow-orange-300/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="submit" data-ripple-light="true">reserver</button>
    </fieldset>
</form>

<?php

include __DIR__ . '/Includes/footer.php';

?>