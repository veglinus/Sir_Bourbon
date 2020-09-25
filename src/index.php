<?php include 'includes/header.php'; ?>

<section id="main">
    <div class="padding">
        <h2 id="slogan">Absolut Dixieland sedan början på 80-talet</h2>
        <p>Sir Bourbon startade i Göteborgs södra förorter (suburbs) av sju ”killar”, som alla längtade efter att spela jazz. Redan från början var vårt motto att spela glad och lättillgänglig jazz, överallt. Det har blivit många härliga spelningar genom åren. Särskilt kommer vi ihåg Hannover Jazzclub, Cotton Club i Hamburg och många svenska jazzklubbar. För att inte tala om sommarkvällarna på Göta Kanal båtarna och Bohus Malmön, jazzfestivaler i Göteborg, Askersund, Braunschweig, Jazz in Duketownm (Holland), Dresden och många fler.</p>
    </div>
</section>

<section id="kontakt" class="padding">
    <h2>Kontakta oss!</h2>
    <form action="mailto:linushvenfelt@gmail.com" id="form">
        <label for="text">Namn:</label><br>
        <input type="text" name="namn" id="namn" required><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" required><br>

        <label for="tel">Telefonnummer: <i>(frivilligt)</i></label><br>
        <input type="tel" name="tel" id="tel"><br>

        <label for="msg">Meddelande:</label><br>
        <textarea name="msg" id="msg" cols="30" rows="10" required></textarea>
        <br>
        <input type="submit" value="Skicka">
    </form>
    <br>
</section>

<div class="wrapper"> <!-- För att hålla bakgrunden en färg på stora devices -->
    <div class="flexbox"> <!-- Flexbox för Spelningar & video på stora devices -->
        <section id="spelningar">
            <div class="padding">
                <h2>Spelningar</h2>

                <?php include 'includes/widget.php'; ?>

                <!--
                <div class="spelning">
                    <h3><a href="https://www.casinocosmopol.se/goteborg/noje/lunchjazz">Casino Cosmopol, Göteborg</a></h3>
                    <p>
                        16 september kl 16:30 - 18:30<br>
                        Bordsbeställning: tel. 020-219219
                    </p>
                    <p><span class="cancelled">INSTÄLLD</span></p>
                </div>
                <div class="spelning">
                    <h3><a href="https://www.svenskakyrkan.se/kalender?date=2020-10-08&webid=1099717&locationAction=Custom&locationName=T%C3%B6l%C3%B6-%C3%84lvs%C3%A5ker%20pastorat&orgId=1223,1222,12801">Tölö Kyrka, Kungsbacka</a></h3>
                    <p>
                        8 oktober kl 13:00 - 14:30<br>
                        Öppen tillställning
                    </p>
                </div>
                <div class="spelning">
                    <h3><a href="https://www.partille.se/uppleva--gora/evenemang/">Partille Kulturcentrum, Partille</a></h3>
                    <p>
                        21 oktober kl 18:00 - 20:00<br>
                        Mer detaljer kommer senare
                    </p>
                </div>
                <div class="spelning">
                    <h3><a href="https://www.facebook.com/IOGT-NTO-Vetlanda-1841417746138674/">IOGT-NTO, Vetlanda</a></h3>
                    <p>
                        25 oktober kl 15:00 - 18:00<br>
                        Mer detaljer kommer senare
                    </p>
                </div>
                <div class="spelning">
                    <h3><a href="">Olskrokstorget, Göteborg</a></h3>
                    <p>
                        12 december kl 11:00 - 13:00<br>
                        Mer detaljer kommer senare
                    </p>
                </div>
                -->

            </div>
        </section>

        <section id="video">
            <div class="padding">
                <h2>Lyssna på oss</h2>
            </div>
            <div id="ytplayer"></div>
            <p class="padding"><a href="https://www.youtube.com/playlist?list=PLekb4NrK1_Gb2SHvpiJKfaDbRQNjq8ex0">Lyssna på flera låtar</a></p>
        </section>
    </div>
</div>

<section id="album">
    <div class="padding">
        <h2>Album</h2>

        <div class="flexgrid">
            <img src="imgs/album/image-3.png" alt="Albumbild">
            <img src="imgs/album/image-4.png" alt="Albumbild">
            <img src="imgs/album/image-5.png" alt="Albumbild">
            <img src="imgs/album/image-6.png" alt="Albumbild">
            <img src="imgs/album/image-7.png" alt="Albumbild">
            <img src="imgs/album/image-8.png" alt="Albumbild">
            <img src="imgs/album/image-9.png" alt="Albumbild">
            <img src="imgs/album/image-10.png" alt="Albumbild">
            <img src="imgs/album/image-11.png" alt="Albumbild">
            <img src="imgs/album/image-13.png" alt="Albumbild">
        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>