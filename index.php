<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Početna Strana</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <header>
        <h1>Dobrodošli na zvaničnu prezentaciju upravljanja bazenima</h1>
		 <div id="clock" style="font-size: 24px; margin: 20px;"></div>
    </header>
    <nav>
        <a href="register.php">Registracija</a>
        <a href="login.php">Prijava</a>
        <a href="pools.php">Bazen</a>
        <a href="reservations.php">Rezervacije</a>
    </nav>
</body>
    
	<div class="image-container">
    <img src="bazen1.jpg" alt="Opis slike">
</div>

    <section>
    <h2>O našim bazenima</h2>
    <p>Naš kompleks bazena je savršeno mesto za opuštanje i uživanje u vodi. Sa modernim sadržajima, nudimo jedinstveno iskustvo kako za porodice, tako i za pojedince. U našem objektu se nalaze različiti bazeni, svaki prilagođen različitim potrebama i preferencijama.</p>
    
    <p>Veliki olimpijski bazen, sa svojim standardnim dimenzijama, idealan je za profesionalne plivače koji žele da treniraju ili učestvuju u takmičenjima. Pored njega, naš mali bazen za decu pruža sigurno i zabavno okruženje za najmlađe, omogućavajući im da uče plivanje pod nadzorom stručnog osoblja.</p>
    
    <p>Osim bazena, naš kompleks nudi razne dodatne sadržaje kao što su teretana, sauna, i prostor za masaže. U svakom trenutku, možete se opustiti i regenerisati u našoj SPA zoni, gde vas očekuju stručni terapeuti i personalizovani tretmani.</p>
    
    <p>Naši treninzi i časovi plivanja su dostupni za sve uzraste i nivoe iskustva. Bilo da ste početnik ili napredni plivač, naši instruktori su tu da vam pomognu da postignete svoje ciljeve. Takođe, organizujemo različite događaje i tematske večeri, kako bismo našim članovima omogućili dodatnu zabavu i druženje.</p>
    
    <p>Pored toga, pružamo mogućnosti za privatne rezervacije bazena, idealne za proslave rođendana, korporativne događaje ili posebne prilike. Naš tim će se pobrinuti da svaki detalj bude savršen.</p>
    
    <p>Posetite nas i uverite se sami u sve što naš kompleks bazena ima da ponudi. Uveravamo vas da ćete se osećati opušteno i zadovoljno tokom svakog trenutka provedenog kod nas!</p>
</section>

    <script>
    function updateClock() {
        const now = new Date();
        const options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false // 24-časovni format
        };
        document.getElementById('clock').innerHTML = now.toLocaleString('sr-RS', options);
    }

    // Ažuriraj sat svakih 1000 ms (1 sekunda)
    setInterval(updateClock, 1000);
    updateClock();
    </script>
</body>
</html>

<footer>
    <p>&copy; Vladimir Vidić 2024</p>
</footer>