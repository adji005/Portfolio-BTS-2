<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiatope Invest</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        /* Navigation fixe  */
        #navigationbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: transparent;
            z-index: 1000;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background: white;


        }

        /* Header  */
        #navigationbar header {
            padding: 8px 0 !important;
            margin-bottom: 0 !important;
            min-height: 85px;
            align-items: center !important;
        }

        #navigationbar .logo-container {
            display: flex;
            align-items: center;
            height: 70px;
            flex-shrink: 0;
            min-width: 90px;
        }


        /*placement du logo */

        #navigationbar img {
            width: 90px;
            height: 90px;
            display: block;
        }

        /* placement des mots das la nav bar */
        #navigationbar .nav {
            align-items: center;
            margin: 0;
            gap: 8px;
        }

        /*police des onglets de la nav barre avant dtre appuye */
        #navigationbar .nav-link {
            color: black;
            font-family: 'Inter';
            font-weight: 500;
            font-size: 14px;
            padding: 8px 16px;
            border-radius: 0;
            position: relative;
            text-decoration: none;
            letter-spacing: 0.3px;
            background: transparent;
            border: none;
            border-bottom: 2px solid transparent;
        }

        /* hoover */
        #navigationbar .nav-link:hover {
            color: #0e096bff;
            border-bottom-color: #0e096bff;
        }

        /* Page activee */
        #navigationbar .nav-link.active {
            color: #0e096bff;
            font-weight: 600;
            border-bottom-color: #0e096bff;
        }

        /* Menu déroulant */
        .nav-item.dropdown {
            position: relative;
        }

        .nav-item.dropdown .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            min-width: 220px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            border-radius: 8px;
            padding: 8px 0;
            z-index: 1001;
            border: 1px solid rgba(0, 0, 0, 0.1);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-menu .dropdown-item {
            display: block;
            padding: 12px 20px;
            color: #1a1a2e;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s ease;
            border-bottom: none;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: rgba(20, 13, 179, 0.1);
            color: #140db3;
            border-bottom: none;
        }

        #navigationbar .dropdown-item {
            color: black;
            padding: 8px 20px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        #navigationbar .dropdown-item:hover {
            color: BLACK;
            padding-left: 30px;
            border-left: 1px solid;
            background: transparent;
        }



        /* Espacement pour le contenu principal */
        body {
            padding-top: 105px;
            font-family: 'Inter', sans-serif;
        }

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Responsive */
        @media (max-width: 768px) {
            #navigationbar img {
                width: 50px;
                height: 50px;
            }

            #navigationbar header {
                min-height: 70px;
            }

            body {
                padding-top: 90px;
            }

            #navigationbar .nav {
                flex-wrap: wrap;
                justify-content: center;
            }

            #navigationbar .nav-link {
                font-size: 12px;
                padding: 6px 12px;
                margin: 2px 0;
            }
        }
    </style>

</head>

<body>

    <!--Creation d'un header reutilisable grace a Php-->
    <?php
    // Détecter la page actuelle
    $current_page = basename($_SERVER['PHP_SELF'], '.php');
    if ($current_page == 'index') $current_page = 'accueil';

    // Fonction pour vérifier si c'est la page active
    function isActivePage($page, $current)
    {
        return ($page == $current) ? 'active' : '';
    }
    ?>

    <div id="navigationbar">
        <div class="container">
            <header class="d-flex flex-wrap justify-content-between align-items-center py-2">
                <a href="index.php" class="logo-container text-decoration-none">
                    <img src="logo (1).png" alt="Fiatope Invest Logo">
                </a>
                <ul class="nav d-flex align-items-center">
                    <li class="nav-item"><a href="index.php" class="nav-link <?php echo isActivePage('accueil', $current_page); ?>">Accueil</a></li>

                    <li class="nav-item dropdown">
                        <a href="about.php" class="nav-link <?php echo isActivePage('about', $current_page); ?>">À Propos De Nous</a>
                        <div class="dropdown-menu">
                            <a href="about.php#notre-histoire" class="dropdown-item">Qui sommes-nous?</a>
                            <a href="about.php#notre-equipe" class="dropdown-item">Notre équipe</a>
                            <a href="about.php#nos-missions" class="dropdown-item">Nos missions</a>
                            <a href="about.php#notre-impact" class="dropdown-item">L'impact de Invest Fiatope</a>
                            <a href="about.php#nos-partenaires" class="dropdown-item">Nos partenaires</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="modele.php" class="nav-link <?php echo isActivePage('modele', $current_page); ?>">Devenir Acteur</a> <!-- Devenir un Acteur de Fiatope Invest ou Choisir votre engagement -->
                        <div class="dropdown-menu">
                            <a href="modele.php#entreprise" class="dropdown-item">Entreprise</a>
                            <a href="modele.php#actionnaire" class="dropdown-item">Actionnaire Fiatope Invest</a>
                            <a href="modele.php#investisseur" class="dropdown-item">Investisseur</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="projets.php" class="nav-link <?php echo isActivePage('projets', $current_page); ?>">Projets</a></li>
                    <li class="nav-item"><a href="Articles.php" class="nav-link <?php echo isActivePage('Articles', $current_page); ?>">Articles</a></li>
                    <li class="nav-item"><a href="Fiatopeangels.php" class="nav-link <?php echo isActivePage('Fiatopeangels', $current_page); ?>">Fiatope Angels</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link <?php echo isActivePage('contact', $current_page); ?>">Contact</a></li>
                </ul>
            </header>
        </div>
    </div>
</body>

</html>