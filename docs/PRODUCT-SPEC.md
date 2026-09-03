# A.S ZINGA — Product Spec MVP

## Objectif

Mettre en ligne rapidement un site officiel crédible pour A.S ZINGA avec un back-office autonome.

## Navigation publique

Accueil | Club | Équipe | Matchs | Actualités | Galerie | Partenaires | Contact

CTA prioritaire : Rejoindre le club.

## Accueil

Ordre recommandé :
1. Hero avec identité du club et photo d'équipe.
2. Prochain match / dernier résultat.
3. Dernières actualités.
4. Présentation courte du club.
5. Mise en avant de l'effectif.
6. Galerie récente.
7. Bloc recrutement/détection.
8. Partenaires.
9. Contact et footer.

Si aucune donnée réelle n'existe pour un bloc dynamique, ne jamais inventer une rencontre, un score, un joueur ou un partenaire. Utiliser un état vide propre ou masquer le bloc.

## Back-office `/admin`

Dashboard : compteurs réels, prochain match, dernières publications, raccourcis de création.

CRUD :
- Joueurs
- Staff
- Matchs
- Actualités
- Galerie
- Partenaires
- Paramètres du club

Workflow recrutement : consulter une candidature, statut `nouvelle`, `en_etude`, `contactee`, `retenue`, `refusee`.

## Joueur

Champs MVP : prénom, nom, nom affiché, numéro, poste, photo, date de naissance optionnelle, taille optionnelle, pied fort optionnel, biographie courte, actif/inactif, ordre d'affichage.

## Match

Champs MVP : adversaire, compétition, domicile/extérieur, date/heure, lieu, statut (`programme`, `termine`, `reporte`, `annule`), score A.S ZINGA, score adversaire, résumé optionnel.

## Actualité

Titre, slug, extrait, contenu, image de couverture, statut brouillon/publié, date de publication.

## Galerie

Image, titre/légende, événement ou album optionnel, date, ordre d'affichage.

## Partenaire

Nom, logo, URL optionnelle, description courte, actif/inactif, ordre.

## Paramètres club

Nom officiel, nom court, slogan, description, téléphone, email, adresse, Facebook, autres réseaux, logo, photo hero, texte recrutement.

## Design

Palette de départ inspirée du blason : orange dominant, blanc, noir, avec gris neutres pour les surfaces. Pas de surcharge graphique. Photos de football prioritaires. Cartes compactes, grands chiffres pour scores, typographie forte pour titres.

## Responsive

La conception commence à 390 px. Aucun débordement horizontal. Navigation mobile compacte. Les tableaux admin deviennent cartes/listes ou restent scrollables dans leur propre conteneur.

## Definition of Done MVP

Le MVP est terminé quand un administrateur peut se connecter, administrer toutes les données listées, et qu'un visiteur peut consulter le club, l'effectif, les matchs, les actualités et contacter/rejoindre A.S ZINGA depuis un téléphone sans fonctionnalité morte.
