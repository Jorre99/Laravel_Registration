@extends('layouts.template')
@section('main')
    <div class="faqq mt-5">
        <h1>Frequently asked questions!</h1>
        <main>
            <details>
                <summary>Hoe kan ik een zwemles aanvragen?</summary>
                <div class="faq__content">
                    <h5>Stap 1:</h5>
                    <p>Voor een zwemles te reserveren drukt u op de knop "Zwemlessen".
                        Hierna opent er een scherm waar u al uw persoonsgegevens kan ingeven.</p>
                    <img style="width: 480px" src="../images/FaQ/homepage_zwemlessen.png" alt="homepage zwemlessen">
                    <h5 class="mt-4">Stap 2:</h5>
                    <p>
                        Met het dropdown menu kan u één of meerdere tijdstippen aanduiden wanneer u de zwemlessen
                        graag zou willen volgen.
                        Na het selecteren van de zwemles(sen) geeft u uw gegevens in.
                        Bij de opmerking kan u steeds extra informatie achterlaten.
                        Hierna drukt u op verzenden en is de zwemles aangevraagd.
                    </p>
                    <img style="width: 480px" src="../images/FaQ/selectie_zwemles.png" alt="selectie zwemles">
                </div>
            </details>
            <details>
                <summary>Hoe reserveerd u een zwemfeest?</summary>
                <div class="faq__content">
                    <h5>Stap 1:</h5>
                    <p>Voor een zwemfeest te reserveren drukt u op de knop "Zwemfeesten".</p>
                    <img style="width: 480px" src="../images/FaQ/homepage_zwemfeesten.png" alt="homepagina zwemfeesten">
                    <h5 class="mt-4">Stap 2:</h5>
                    <p>
                        Hierna opent er een scherm waar u een zwemfeestje kan selecteren.
                        Na het selecteren van het zwemfeestje dat u graag wilt reserveren opent er een nieuw
                        scherm waar u al uw persoonsgegevens kan ingeven.
                        Op deze pagina kan u ook ingeven met hoeveel kinderen u het zwemfeestje wil laten
                        doorgaan en welke maaltijd u graag zou bestellen.
                        Bij het veld "Opmerking" kan u eventueel extra gegevens achterlaten met bv. allergieën.
                        Hierna drukt u op verzenden en wordt het zwemfeestje aangevraagd.
                    </p>
                    <img style="width: 480px" src="../images/FaQ/selectie_zwemfeest.png" alt="selectie zwemfeesten">
                </div>
            </details>
            <details>
                <summary>Hoe kunt u contact opnemen?</summary>
                <div class="faq__content">
                    <h5>Stap 1:</h5>
                    <p>Om contact op te nemen met de medewerkers van het zwembad kunt u op de knop Contact
                        klikken.</p>
                    <img style="width: 480px" src="../images/FaQ/homepage_contact.png" alt="hompagina contact">
                    <h5>Stap 2:</h5>
                    <p>
                        Op deze pagina laat u uw naam en E-mailadres achter.
                        Hierna kunt u selecteren over welk onderwerp u graag contact wil opnemen en in de
                        Message box kan u uw bericht achterlaten.
                        Hierna drukt u op send message en wordt uw bericht doorgestuurd naar de medewerkers van
                        het zwembad.
                    </p>
                    <img style="width: 480px" src="../images/FaQ/contact.png" alt="contact pagina">
                </div>
            </details>
            @auth
                <h3>Zwemleraar</h3>
                <details>
                    <summary>Hoe kan een zwemmer geannuleerd worden?</summary>
                    <div class="faq__content">
                        <h5>Stap 1:</h5>
                        <p>Voor een zwemmer zijn lessen te annuleren kan u via de navigatiebalk naar de
                            "Zwemlessen" gaan.</p>
                        <img style="width: 240px" src="../images/FaQ/navigatie_zwemlessen.png" alt="navigatie zwemlessen">
                        <h5 class="mt-4">Stap 2:</h5>
                        <p>Op deze pagina hebt u onderaan 2 linken staan, hier drukt u op de link "Wachtlijst
                            aanpassen".
                            Op de pagina van de wachtlijst worden al de zwemmers opgenoemd.</p>
                        <img style="width: 480px" src="../images/FaQ/link_wachtlijst.png" alt="link wachtlijst">
                        <h5 class="mt-4">Stap 3:</h5>
                        <p>Voor een specifieke zwemmer te gaan zoeken kan u op naam of e-mailadres gaan zoeken
                            via de zoekbalk.
                            Wanneer u de juiste zwemmer gevonden heeft drukt u op de knop "verwijderen".
                            Nu is de zwemmer geannuleerd.</p>
                        <img style="width: 480px" src="../images/FaQ/zwemmer_annuleren.png" alt="wachtlijst">
                    </div>
                </details>
                <details>
                    <summary>Hoe kan een zwemles afgerond worden?</summary>
                    <div class="faq__content">
                        <h5>Stap 1:</h5>
                        <p>Voor een zwemmer zijn lessen af te ronden kan u via de navigatiebalk naar de
                            "Zwemlessen" gaan.</p>
                        <img style="width: 240px" src="../images/FaQ/navigatie_zwemlessen.png" alt="navigatie zwemlessen">
                        <h5 class="mt-4">Stap 2:</h5>
                        <p> Op deze pagina hebt u onderaan 2 linken staan, hier drukt u op de link "Wachtlijst
                            aanpassen".
                            Op de pagina van de wachtlijst worden al de zwemmers opgenoemd.</p>
                        <img style="width: 480px" src="../images/FaQ/link_wachtlijst.png" alt="link wachtlijst">
                        <h5 class="mt-4">Stap 3:</h5>
                        <p>
                            Voor een specifieke zwemmer te gaan zoeken kan u op naam of e-mailadres gaan zoeken
                            via de zoekbalk.
                            Wanneer u de juiste zwemmer gevonden heeft drukt u op de knop voltooien.
                            Nu heeft de zwemmer zijn lessen afgerond en is zijn status op "voltooid" gezet.</p>
                        <img style="width: 480px" src="../images/FaQ/zwemmer_voltooien.png" alt="wachtlijst">
                    </div>
                </details>
                <details>
                    <summary>Hoe kan u de zwemmers binnen de zwemlessen bekijken?</summary>
                    <div class="faq__content">
                        <h5>Stap 1:</h5>
                        <p>Om een zwemles te gaan bekijken kan u via de navigatiebalk naar de "Zwemlessen" gaan.</p>
                        <img style="width: 240px" src="../images/FaQ/navigatie_zwemlessen.png" alt="navigatie zwemlessen">
                        <h5 class="mt-4">Stap 2:</h5>
                        <p>
                            Op deze pagina staat een overzicht met de verschillende zwemlessen en de zwemmers
                            binnen die zwemles.
                        </p>
                        <img style="width: 480px" src="../images/FaQ/lijst_zwemlessen.png" alt="lijst zwemlessen">
                    </div>
                </details>
                <details>
                    <summary>Hoe kan een zwemmer toegevoegd worden aan een zwemles?</summary>
                    <div class="faq__content">
                        <h5>Stap 1:</h5>
                        <p>Om een zwemmer toe te kennen aan een zwemles kan u via de navigatiebalk naar
                            "Zwemlessen" gaan.</p>
                        <img style="width: 240px" src="../images/FaQ/navigatie_zwemlessen.png" alt="navigatie zwemlessen">
                        <h5 class="mt-4">Stap 2:</h5>
                        <p>Op deze pagina hebt u onderaan 2 linken staan, hier drukt u op de link "Zwemlessen
                            Toekennen".</p>
                        <img style="width: 480px" src="../images/FaQ/link_zwemlessen_toekennen.png" alt="link zwemlessen toekennen">
                        <h5 class="mt-4">Stap 3:</h5>
                        <p>Op de nieuwe pagina kan u een aanvraag selecteren waarna er een andere pagina opent.</p>
                        <img style="width: 480px" src="../images/FaQ/pagina_zwemmers_toekennen.png" alt="pagina zwemmers toekennen">
                        <h5 class="mt-4">Stap 4:</h5>
                        <p>
                            Binnen het nieuwe scherm komt er de zwemmer die aangegeven heeft de
                            zwemles op dat moment te willen volgen.
                            Dit is in chronologische volgorde gezet. Indien u op de knop toevoegen drukt wordt
                            de zwemmer toegevoegd aan de zwemles.</p>
                        <img style="width: 480px" src="../images/FaQ/zwemmer_toevoegen.png" alt="zwemmer toevoegen">
                    </div>
                </details>
                <details>
                    <summary>Hoe kan ik een klant aanmaken?</summary>
                    <div class="faq__content">
                        <h5>Stap 1:</h5>
                        <p>Om een klant aan te maken gaat u via de navigatiebalk naar "klanten".</p>
                        <img style="width: 240px" src="../images/FaQ/navigatie_klanten.png" alt="navigatie klanten">
                        <h5 class="mt-4">Stap 2:</h5>
                        <p>
                            U krijgt een pagina te zien waar al de huidige klanten in staan.
                            Bovenaan de pagina, onder de zoekbalk is een groene knop.
                            Indien u op deze knop drukt komt u op een nieuwe pagina waar u de gegevens van
                            de nieuwe klant kan ingeven.
                            Indien u op opslaan drukt wordt de klant opgeslagen en gaat u terug naar de
                            pagina van de "klanten".</p>
                        <img style="width: 480px" src="../images/FaQ/klanten_aanmaken.png" alt="klanten aanmaken">
                    </div>
                </details>
                <details>
                    <summary>Hoe kan ik de klanten beheren?</summary>
                    <div class="faq__content">
                        <h5>Stap 1:</h5>
                        <p>Om de klanten te beheren gaat u via de navigatiebalk naar "klanten".</p>
                        <img style="width: 240px" src="../images/FaQ/navigatie_klanten.png" alt="navigatie klanten">
                        <h5 class="mt-4">Stap 2:</h5>
                        <p>Hier krijgt u een overzicht van al de klanten binnen het systeem.
                            Om een klant te zoeken die aangepast moet worden kan u via de zoekbalk de
                            klant gaan zoeken op naam of e-mailadres.
                            Wanneer u de juiste klant gevonden heeft kan u deze met de groene knop naast
                            zijn gegevens bewerken en met de rode knop verwijderen.
                            Indien u op de groene knop drukt komt er een nieuwe pagina waar u de huidige
                            gegevens van de klant kan bekijken. deze kunt u hier ook aanpassen.</p>
                        <img style="width: 480px" src="../images/FaQ/klanten_bewerken.png" alt="klanten bewerken">
                        <h5 class="mt-4">Stap 3:</h5>
                        <p>
                            Indien u op de rode knop drukt komt er een pop-up scherm tevoorschijn met de
                            vraag of u de klant wel wil verwijderen. Om de klant te verwijderen
                            drukt u op "delete".</p>
                        <img style="width: 480px" src="../images/FaQ/klanten_verwijderen.png" alt="klanten verwijderen">
                    </div>
                </details>
                @if(auth()->user()->admin)
                    <h3>Beheerder</h3>
                    <details>
                        <summary>Hoe kan ik een zwemles aanmaken?</summary>
                        <div class="faq__content">
                            <h5>Stap 1:</h5>
                            <p>Om een zwemles aan te maken gaat u via de navigatiebalk naar "Zwemlessen
                                toevoegen".</p>
                            <img style="width: 240px" src="../images/FaQ/navigatie_zwemles_toevoegen.png" alt="navigatie zwemlessen toevoegen">
                            <h5 class="mt-4">Stap 2:</h5>
                            <p>Hierna opent er een nieuwe pagina waar u al de zwemlessen te zien krijgt.
                                Boven aan de pagina staat er een knop "Zwemles aanmaken" nadat u op deze knop
                                klikt krijgt u een nieuwe pagina te zien.</p>
                            <img style="width: 480px" src="../images/FaQ/zwemles_aanmaken.png" alt="zwemles toevoegen">
                            <h5 class="mt-4">Stap 3:</h5>
                            <p>
                                Hier kan u een weekdag selecteren, een start en een einduur, de zwemleraar en of
                                de zwemles al actief of nog niet actief moet zijn.
                                Hierna drukt u op "Les opslaan" u komt terug op de pagina Zwemlessen beheren en
                                is uw nieuwe zwemles toegevoegd. </p>
                        </div>
                    </details>
                    <details>
                        <summary>Hoe kan ik een zwemles bewerken?</summary>
                        <div class="faq__content">
                            <h5>Stap 1:</h5>
                            <p>Om een zwemles te bewerken gaat u via de navigatiebalk naar "Zwemlessen
                                toevoegen".</p>
                            <img style="width: 240px" src="../images/FaQ/navigatie_zwemles_toevoegen.png" alt="navigatie zwemlessen toevoegen">
                            <h5 class="mt-4">Stap 2:</h5>
                            <p>Hierna opent er een nieuwe pagina waar u al de zwemlessen te zien krijgt.
                                Naast de zwemles die u wil aanpassen staat een groen knopje hier drukt u op.</p>
                            <img style="width: 480px" src="../images/FaQ/zwemles_bewerken.png" alt="zwemles bewerken">
                            <h5 class="mt-4">Stap 3:</h5>
                            <p>
                                Op de nieuwe pagina komen al de huidige gegevens van de zwemles, in deze velden
                                kunt u de gegevens terug aanpassen.
                                Wanneer u klaar bent met bewerken drukt u op de knop "Les opslaan" u komt terug
                                op de pagina Zwemlessen beheren en is uw zwemles aangepast.</p>
                        </div>
                    </details>
                    <details>
                        <summary>Hoe kan ik een zwemles verwijderen?</summary>
                        <div class="faq__content">
                            <h5>Stap 1:</h5>
                            <p>Om een zwemles te verwijderen gaat u via de navigatiebalk naar "Zwemlessen
                                toevoegen".</p>
                            <img style="width: 240px" src="../images/FaQ/navigatie_zwemles_toevoegen.png" alt="navigatie zwemlessen toevoegen">
                            <h5 class="mt-4">Stap 2:</h5>
                            <p>Hierna opent er een nieuwe pagina waar u al de zwemlessen te zien krijgt.
                                Naast de zwemles die u wil aanpassen staat een rood knopje hier drukt u op.</p>
                            <img style="width: 480px" src="../images/FaQ/zwemles_bewerken.png" alt="zwemles verwijderen">
                            <h5 class="mt-4">Stap 3:</h5>
                            <p>
                                Hierna komt er een pop-up tevoorschijn met de vraag of u de zwemles zeker wil
                                verwijderen.
                                Nadat u op "Delete" drukt wordt de zwemles verwijderd.</p>
                        </div>
                    </details>
                    <details>
                        <summary>Hoe kan ik een zwemfeest aanmaken?</summary>
                        <div class="faq__content">
                            <h5>Stap 1:</h5>
                            <p>Om een zwemfeest aan te maken gaat u via de navigatiebalk naar "Zwemfeesten".</p>
                            <img style="width: 240px" src="../images/FaQ/navigatie_zwemfeest.png" alt="navigatie zwemfeest">
                            <h5 class="mt-4">Stap 2:</h5>
                            <p>Hier krijgt u een overzicht van de verschillende zwemfeesten en de aangevraagde
                                zwemfeesten.
                                Om een zwemfeest toe te voegen drukt u op de knop "Nieuw feest".</p>
                            <img style="width: 480px" src="../images/FaQ/zwemfeest_aanmaken.png" alt="zwemfeest aanmaken">
                            <h5 class="mt-4">Stap 3:</h5>
                            <p>
                                Hierna opent er een nieuwe pagina waarin u de gegevens (datum, start en einduur
                                en prijs) van het zwemfeest kan ingeven.
                                Hierna drukt u op "Opslagen" en komt u terug op de pagina van Zwemfeesten.</p>
                        </div>
                    </details>
                    <details>
                        <summary>Hoe kan ik een zwemfeest bewerken?</summary>
                        <div class="faq__content">
                            <h5>Stap 1:</h5>
                            <p>Om een zwemfeest te bewerken gaat u via de navigatiebalk naar "Zwemfeesten".</p>
                            <img style="width: 240px" src="../images/FaQ/navigatie_zwemfeest.png" alt="navigatie zwemfeest">
                            <h5 class="mt-4">Stap 2:</h5>
                            <p>Hier krijgt u een overzicht van de verschillende zwemfeesten en de aangevraagde
                                zwemfeesten.
                                Om een zwemfeest te bewerken drukt u op de groene knop naast het zwemfeest.</p>
                            <img style="width: 480px" src="../images/FaQ/zwemfeest_bewerken.png" alt="zwemfeest bewerken">
                            <h5 class="mt-4">Stap 3:</h5>
                            <p>
                                Hierna opent er een nieuwe pagina waarin de huidige gegevens (datum, start en
                                einduur en prijs) van het zwemfeest in staan deze kan u aanpassen.
                                Hierna drukt u op "Opslaan" en komt u terug op de pagina van Zwemfeesten.</p>
                        </div>
                    </details>
                    <details>
                        <summary>Hoe kan ik een zwemfeest verwijderen?</summary>
                        <div class="faq__content">
                            <h5>Stap 1:</h5>
                            <p>Om een zwemfeest te verwijderen gaat u via de navigatiebalk naar "Zwemfeesten".</p>
                            <img style="width: 240px" src="../images/FaQ/navigatie_zwemfeest.png" alt="navigatie zwemfeest">
                            <h5 class="mt-4">Stap 2:</h5>
                            <p>Hier krijgt u een overzicht van de verschillende zwemfeesten en de aangevraagde
                                zwemfeesten.
                                Om een zwemfeest te bewerken drukt u op de rode knop naast het zwemfeest.</p>
                            <img style="width: 480px" src="../images/FaQ/zwemfeest_verwijderen.png" alt="zwemfeest verwijderen">
                            <h5 class="mt-4">Stap 3:</h5>
                            <p>
                                Hierna komt er een pop-up, hier drukt u op de knop "delete" om het zwemfeestje
                                te verwijderen.</p>
                        </div>
                    </details>
                    <details>
                        <summary>Hoe kan ik een zwemfeest Goed- of afkeuren?</summary>
                        <div class="faq__content">
                            <h5>Stap 1:</h5>
                            <p>Om een zwemfeest te goed of af te keuren gaat u via de navigatiebalk naar
                                "Zwemfeesten".</p>
                            <img style="width: 240px" src="../images/FaQ/navigatie_zwemfeest.png" alt="navigatie zwemfeest">
                            <h5 class="mt-4">Stap 2:</h5>
                            <p>Hier krijgt u een overzicht van de verschillende zwemfeesten en de aangevraagde
                                zwemfeesten.
                                Om een zwemfeest te goed te keuren of af te keuren kijkt u bij "de volgende
                                zwemfeesten zijn aangevraagd:".</p>
                            <h5 class="mt-4">Stap 3:</h5>
                            <p>
                                Naast het zwemfeest dat u wil goed- of afkeuren staan 2 knoppen u drukt op de
                                des betreffende knop.</p>
                            <img style="width: 480px" src="../images/FaQ/zwemfeest_keuren.png" alt="zwemfeest keuren">
                        </div>
                    </details>
                    <details>
                        <summary>Hoe kan ik de prijzen bekijken/aanpassen?</summary>
                        <div class="faq__content">
                            <h5>Stap 1:</h5>
                            <p>Om de tarieven of de prijzen van de verschillende maaltijden te bekijken kan u
                                via de navitagiebalk naar "Prijzen".</p>
                            <img style="width:240px" src="../images/FaQ/navigatie_prijzen.png" alt="navigatie prijzen">
                            <h5 class="mt-4">Stap 2:</h5>
                            <p>Op deze pagina krijgt u een overzicht van al de verschillende tarieven en
                                maaltijden.
                                Om een tarief of maaltijd aan te passen drukt u op de groene knop ernaast.</p>
                            <img style="width: 480px" src="../images/FaQ/prijzen_bewerken.png" alt="prijzen aanpassen">
                            <h5 class="mt-4">Stap 3:</h5>
                            <p>
                                Hierna krijgt u een nieuw scherm met de huidige gegevens. Deze gegevens kan u
                                aanpassen.
                                Wanneer u de gegevens opslaat komt u terug op de pagina van prijzen terecht.</p>
                        </div>
                    </details>
                    <details>
                        <summary>Hoe kan ik een tarief of maaltijd toevoegen?</summary>
                        <div class="faq__content">
                            <h5>Stap 1:</h5>
                            <p>Om een tarief of maaltijd toe te voegen drukt u in de navigatiebalk op de knop
                                "Prijzen".</p>
                            <img style="width: 240px" src="../images/FaQ/navigatie_prijzen.png" alt="navigatie prijzen">
                            <h5 class="mt-4">Stap 2:</h5>
                            <p>Op deze pagina krijgt u een overzicht van al de verschillende tarieven en
                                maaltijden.
                                Indien u op een van de groene knoppen bovenaan de pagina drukt kan u een tarief
                                aanmaken of een maaltijd.</p>
                            <img style="width: 480px" src="../images/FaQ/prijzen_toevoegen.png" alt="prijzen aanmaken">
                            <h5 class="mt-4">Stap 3:</h5>
                            <p>
                                Op de volgende pagina geeft u de gegevens in van het tarief of de maaltijd.
                                Hierna drukt u op opslaan.</p>
                        </div>
                    </details>
                    <details>
                        <summary>Hoe kan ik een gebruiker aanmaken?</summary>
                        <div class="faq__content">
                            <h5>Stap 1:</h5>
                            <p>Om een gebruiker aan te maken gaat u via de navigatiebalk naar "gebruikers".</p>
                            <img style="width: 240px" src="../images/FaQ/navigatie_gebruikers.png" alt="navigatie gebruikers">
                            <h5 class="mt-4">Stap 2:</h5>
                            <p>U krijgt een pagina te zien waar al de huidige gebruikers in staan.
                                Bovenaan de pagina, onder de zoekbalk is een groene knop.
                                Indien u op deze knop drukt komt u op een nieuwe pagina waar u de gegevens van
                                de nieuwe gebruiker kan ingeven.</p>
                            <img style="width: 480px" src="../images/FaQ/gebruiker_aanmaken.png" alt="gebruiker aanmaken">
                            <h5 class="mt-4">Stap 3:</h5>
                            <p>
                                Indien u op opslaan drukt wordt de gebruiker opgeslagen en gaat u terug naar de
                                pagina van de "gebruikers".</p>
                        </div>
                    </details>
                    <details>
                        <summary>Hoe kan ik de gebruikers beheren?</summary>
                        <div class="faq__content">
                            <h5>Stap 1:</h5>
                            <p>Om de gebruikers te beheren gaat u via de navigatiebalk naar "Gebruikers".</p>
                            <img style="width: 240px" src="../images/FaQ/navigatie_prijzen.png" alt="navigatie prijzen">
                            <h5 class="mt-4">Stap 2:</h5>
                            <p>Hier krijgt u een overzicht van al de gebruikers binnen het systeem.
                                Om een gebruiker te zoeken die aangepast moet worden kan u via de zoekbalk de
                                gebruiker gaan zoeken op naam of e-mailadres.
                                Wanneer u de juiste gebruiker gevonden heeft kan u deze met de groene knop naast
                                zijn gegevens bewerken en met de rode knop verwijderen.
                                Indien u op de groene knop drukt komt er een nieuwe pagina waar u de huidige
                                gegevens van de gebruiker kan bekijken. deze kunt u hier ook aanpassen.</p>
                            <img style="width: 480px" src="../images/FaQ/gebruiker_bewerken.png" alt="gebruiker bewerken">
                            <h5 class="mt-4">Stap 3:</h5>
                            <p>
                                Indien u op de rode knop drukt komt er een pop-up scherm tevoorschijn met de
                                vraag of u de gebruiker wel wil verwijderen. Om de gebruiker te verwijderen
                                drukt u op "delete".</p>
                        </div>
                    </details>

                    <details>
                        <summary>Hoe beheer ik mijn scholen?</summary>
                        <div class="faq__content">
                            <h5><strong>Scholen beheren</strong></h5><br>
                            <h5>Stap 1:</h5>
                            <p> Klik in de navigatiebalk op “scholen”.</p>
                            <img style="width: 240px" src="../images/FaQ/navigatie_scholen.png" alt="navigatie scholen">
                            <h5 class="mt-4">Stap 2:</h5>
                            <p>Op deze pagina staan alle geregistreerde
                                scholen. Door op het plus icoontje de klikken kan u een nieuwe school toevoegen.
                                Wanner alle informatie over de school is ingevuld en u klikt op de knop
                                “Opslaan” zal de school in het systeem opgeslagen worden.</p>
                            <img style="width: 480px" src="../images/FaQ/school_aanmaken.png" alt="school toevoegen">
                            <h5 class="mt-4">Stap 3:</h5>
                            <p>De nieuwe school krijgt automatisch 1 klas toegewezen een school kan niet bestaan zonder een
                                klas! Verwijder deze dus niet. Door op de knop “aanpassen” te klikken uiterst
                                rechts, kan u elke school individueel aanpassen. Op deze pagina staat de
                                informatie over de school, met elke klas die geregistreerd is bij de school.
                                Voor elke school kunnen er reservaties gemaakt (zie zwembadreservatie voor
                                scholen) worden, en facturen aangemaakt worden (zie Facturatie Scholen)</p>
                            <img style="width: 480px" src="../images/FaQ/school_beheren.png" alt="school bewerken">
                            <h5><strong>Klassen van een school beheren</strong></h5>
                            <h5>Stap 1:</h5>
                            <p>Op de edit pagina van een school kunnen klassen worden toegevoegd, verwijderd,
                                of aangepast.</p>
                            <img style="width: 240px" src="../images/FaQ/klas_toevoegen.png" alt="klassen beheren">
                            <img style="width: 240px" src="../images/FaQ/klas_bewerken.png" alt="klassen beheren">
                            <h5 class="mt-4">Stap 2:</h5>
                            <p>Bij elke klas kan er aangeduid worden of ze gesubsidieerd worden
                                of niet. Gesubsidieerde klassen worden afzonderlijk gefactureerd.</p>
                            <img style="width: 240px" src="../images/FaQ/subsidie.png" alt="klassen subsidie">
                        </div>
                    </details>

                    <details>
                        <summary>Hoe maak ik reservaties voor scholen?</summary>
                        <div class="faq__content">
                            <h5>Stap 1:</h5>
                            <p>Klik in de navigatiebalk op “scholen”.</p>
                            <img style="width: 240px" src="../images/FaQ/navigatie_scholen.png" alt="navigatie scholen">
                            <h5 class="mt-4">Stap 2:</h5>
                            <p>Op deze pagina staan alle geregistreerde
                                scholen. Klik bij een van deze scholen op het plusje. Je wordt doorverwezen naar
                                de zwemafspraken pagina.</p>
                            <img style="width: 480px" src="../images/FaQ/school_beheren.png" alt="school bewerken">
                            <h5 class="mt-4">Stap 3:</h5>
                            <p>  Op deze pagina geeft je de klas in van die school die
                                komt zwemmen, de datum en het aantal leerlingen van de klas. Klik op “Opslaan”.
                                De reservatie is geregistreerd. Om de reservaties te bekijken kan u naar de
                                Facturatie pagina gaan (Zie Facturatie scholen).</p>
                        </div>
                    </details>
                    <details>
                        <summary>Hoe Bekijk ik mijn facturen?</summary>
                        <div class="faq__content">
                            <h5>Stap 1:</h5>
                            <p>Klik in de navigatiebalk op “scholen”.</p>
                            <img style="width: 240px" src="../images/FaQ/navigatie_scholen.png" alt="navigatie scholen">
                            <h5 class="mt-4">Stap 2:</h5>
                            <p>Op deze pagina staan alle geregistreerde
                                scholen. Klik bij een van deze scholen op de facturatieknop (de middelste knop
                                met het papier icoontje). Op deze pagina staan alle facturen van deze school.</p>
                            <img style="width: 480px" src="../images/FaQ/school_beheren.png" alt="school bewerken">
                            <h5 class="mt-4">Stap 3:</h5>
                            <p> De facturen worden per trimester aangemaakt. Uiterst rechts ziet u een knop om de
                                afspraken op deze factuur te bekijken.
                                <br>
                                <img style="width: 480px" src="../images/FaQ/factuur_afspraken.png" alt="factuur afspraken">
                            </p>
                            <h5 class="mt-4">Stap 3:</h5>
                            <p>De factuur kan gedownload worden door onder acties op de download knop te
                                klikken. De factuur word in .pdf formaat gedownload. (Of geopend in de browser)
                                De factuur kan verstuurd worden via mail naar de school door bij acties op de
                                envelop te klikken. Er wordt automatisch een mail verstuurd met de .pdf die u
                                kan downloaden als bijlage.</p>
                            <img style="width: 480px" src="../images/FaQ/factuur.png" alt="factuur">
                        </div>
                    </details>
                    <video width="640" height="480" controls>
                        <source src="../images/video.mp4" type="video/mp4">
                    </video>
                @endif
            @endauth
        </main>
    </div>
@endsection
