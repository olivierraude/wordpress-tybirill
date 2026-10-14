# Pizzeria Ty Birill

Site vitrine d'une pizzeria à la ferme dans le Finistère, qui travaille en circuit court avec les produits de l'exploitation. Le site présente la ferme, une galerie photo et vidéo, la vente à emporter, un passage podcast et les informations pratiques, que le client met à jour lui-même.

Thème WordPress entièrement sur mesure (sans thème parent ni constructeur de pages), sur une base [Bedrock](https://roots.io/bedrock/).

## Stack

WordPress (Bedrock), PHP, Composer (WPackagist), ACF, Settings API, JavaScript ES6+ en modules, GSAP et ScrollTrigger, Swiper, SCSS, Gulp, PHP_CodeSniffer.

## Fonctionnalités

- **Configuration par environnement** : fichiers `.env` (développement, staging, production) ; l'indexation est désactivée automatiquement hors production.
- **Page d'options « Pizzeria »** (`options/pizzeria.php`) : une classe PHP utilise la Settings API pour gérer horaires, adresse, téléphone et courriel, avec validation à l'enregistrement et échappement à l'affichage.
- **Contenus administrables** : textes et images de la page d'accueil en champs ACF, gabarits découpés en parties réutilisables (`get_template_part`).
- **Animations** : pizza qui tourne au rythme du défilement (GSAP ScrollTrigger), menu plein écran animé, apparition des textes et des images.
- **Sélecteur de thème de couleur** (« Majorelle » et « Ajonc ») en CSS `:has()`, choix mémorisé dans le navigateur.
- **Carrousel** Swiper mêlant photos et vidéos, et lecteur audio pour le podcast.

## Structure

```
config/                       configuration Bedrock par environnement
web/app/themes/themetybirill/
├── options/pizzeria.php      page d'options (Settings API)
├── parts/carousel.php        carrousel photos et vidéos
├── js/main.js                point d'entrée JavaScript
├── js/modules/               un module ES par fonctionnalité
├── sass/                     sources SCSS (base, layout, modules)
└── dist/                     CSS et JS compilés (versionnés pour le déploiement)
```

## Installation en local

Prérequis : PHP 7.4 ou plus, Composer, Node.js 18 ou plus, un serveur MySQL.

```bash
git clone https://github.com/olivierraude/wordpress-tybirill.git
cd wordpress-tybirill
composer install          # WordPress, plugins et dépendances PHP
cp .env.example .env      # puis renseigner la base de données, WP_HOME
                          # et des clés générées sur https://roots.io/salts.html
npm install
npm run build             # compile SCSS et JS dans dist/
```

Le document root du serveur doit pointer vers `web/`.

Pendant le développement, `npm run dev` compile, lance BrowserSync sur l'URL de `WP_HOME` et recharge la page à chaque modification.

## Qualité du code

```bash
composer test             # PHP_CodeSniffer (PSR-12), voir phpcs.xml
```

## Déploiement

Le site est déployé par Git sur un environnement de staging (non indexé), puis en production. Les fichiers compilés de `dist/` sont versionnés : il suffit de lancer `npm run build` et de commiter avant de déployer. Sur le serveur, `composer install --no-dev` installe WordPress et les plugins.

## Statut

En production. Projet réalisé en 2023-2024 par [Olivier Raude](https://www.olivierraude.com).
