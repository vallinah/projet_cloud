<div class="body">
    <div class="menu" id="displayed_menu">
        <h2 class="header-menu">
            Navigation
        </h2>
        <!--/* liste menu a gauche ==================> METTRE UN ID UNIQUE SUR CHAQUE <u> ET LE METTRE DANS LA FONCTION disp_menu("l id ajouté") */-->
        <div class="index-menu" onclick="disp_menu('liste_d')">
            <span>Account</span>
            <ul id="liste_d" style="display: none;">
                <li>
                    <a href="{{ route('portofilo') }}">
                        <i class="bi bi-circle"></i><span>Portefeuille</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Edit profil</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="index-menu" onclick="disp_menu('liste_d')">
            <span>Cours</span>
            <ul id="liste_d" style="display: none;">
                <li>
                    <a href="{{ route('crypto.prices') }}">
                        <i class="bi bi-circle"></i><span>Cryptomonnaie</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="index-menu" onclick="disp_menu('liste_d2')">
            <span>Transactions</span>
            <ul id="liste_d2" style="display: none;">
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Historique</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Depot</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Historique</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Achats & Ventes</span>
                    </a>
                </li>
            </ul>
        </div>
        <!--/* ================================================================================================================================ */-->
    </div>