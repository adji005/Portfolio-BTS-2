<?php
// header.php - en-tête réutilisable
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Adji Niang — Portfolio · BTS SIO SLAM</title>
  <meta name="description" content="Portfolio d'Adji Niang, étudiante en BTS SIO option SLAM. Développeuse d'applications." />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300..700;1,9..144,300..700&family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" />
  <link rel="stylesheet" href="portfolio.css" />
</head>
<body>

<header class="nav" id="nav">
  <a href="#accueil" class="nav__brand" data-smooth>
    <span class="nav__brand-mark">A</span>
    <span class="nav__brand-text">
      <span class="nav__brand-name">Adji Niang</span>
      <span class="nav__brand-role">BTS SIO · SLAM</span>
    </span>
  </a>
  <nav class="nav__items" aria-label="Navigation principale">
    <a href="#accueil" class="nav__link" data-section="accueil" data-smooth>
      <span class="nav__link-num">01</span><span class="nav__link-label">Accueil</span>
    </a>
    <a href="#apropos" class="nav__link" data-section="apropos" data-smooth>
      <span class="nav__link-num">02</span><span class="nav__link-label">À propos</span>
    </a>
    <a href="#competences" class="nav__link" data-section="competences" data-smooth>
      <span class="nav__link-num">03</span><span class="nav__link-label">Compétences</span>
    </a>
    <a href="#projets" class="nav__link" data-section="projets" data-smooth>
      <span class="nav__link-num">04</span><span class="nav__link-label">Projets</span>
    </a>
    <a href="#e4" class="nav__link" data-section="e4" data-smooth>
      <span class="nav__link-num">05</span><span class="nav__link-label">E4</span>
    </a>
    <a href="#contact" class="nav__link" data-section="contact" data-smooth>
      <span class="nav__link-num">06</span><span class="nav__link-label">Contact</span>
    </a>
  </nav>
  <div class="nav__progress"><div class="nav__progress-bar" id="navProgress"></div></div>
</header>
