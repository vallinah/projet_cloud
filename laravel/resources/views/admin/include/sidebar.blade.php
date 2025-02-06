<div class="body">
    <div class="menu" id="displayed_menu">
        <h2 class="header-menu">
            Navigation
        </h2>
        <!--/* liste menu a gauche ==================> METTRE UN ID UNIQUE SUR CHAQUE <u> ET LE METTRE DANS LA FONCTION disp_menu("l id ajouté") */-->
        <div class="index-menu" onclick="disp_menu('liste_1')">
            <span>Validation</span>
            <ul id="liste_1" style="display: none;">
                <li>
                    <a href="{{ route('ventes') }}">
                        <i class="bi bi-circle"></i><span>Vente</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('achats') }}">
                        <i class="bi bi-circle"></i><span>Achat</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>