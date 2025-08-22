# Énoncé – Projet PortFolio

Reproduire le + fidèlement le site one-page iPortfolio (menu vertical), sans responsive ; le front affiche toutes les sections depuis la base.
Un bouton “Backend” dans le menu ouvre l’admin (partie admin dashboard en style libre) ;
Les lien dans le dashbaord mène à l’édition des tables respectives.
Utilisez Layouts, extends, partials(les partie de page à inclure) et includes pour le front et le back !
Attention, ce n'est pas un projet front end, ne perdez pas de temps sur les détails de front.
La vidéo présente un projet plus aboutis mais aucun besoin des effets et animation complexe, du basic bootstrap fera l'affaire...
Tant que le back marche parfaitement le reste est d'ordre front, donc moins important ici.
Je ne juge pas le front a ce stade mais ça doit être cohérent et propre.

## LES CRUD:

About et Contact = modifier uniquement ;
Skills, Portfolio, Services, Testimonials = ajouter / modifier / supprimer.

Tables & colonnes:
Abouts : subtitle, birthdate, website, phone, city, age, degree, email, freelance, src, subtext.

Avatars (1–1 avec About) : image, FK(about_id). (donc ici avatar appartiens a about(le profil))

Skills : skill, pourcentage.

Portfolios : img, filter.

Services : icon, title, text.

Testimonials : comment, img, name, position.

Contacts : street, number, city, zip, phone, email.

Messages : nom, email, sujet, message

Exigences techniques : migrations, seeders, factories, images via Storage public ; on doit pouvoir migrate:fresh --seed,
Cela siginifie que toutes les données sont seedé au départ je peux modifier comme je veux, au moindre soucis on sait toujours revenir a la version d'origine avec db:seed...
Exigences front : une seule page avec navigation par ancres, rendu proche du template et travail soigné.

## Bonus

1. -> Pour la table portfolio, on peut choisir entre un fichier image ou une url
2. -> Filtrage dynamique: Le filtre au dessus du portfolio est fonctionnel
   (Attention, plusieurs produit ont le même filtre, mais celui ci ne doit apparaitre dynamiquement qu'une fois dans la partie filtre)
