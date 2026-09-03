# A.S ZINGA — Site officiel

Site officiel de l'Association Sportive Zinga (A.S ZINGA), club de football local basé à Abobo, Abidjan, Côte d'Ivoire.

## Vision produit

Construire rapidement une présence numérique professionnelle, mobile-first et réellement administrable pour le club.

## Identité

- Club : Association Sportive Zinga (A.S ZINGA)
- Localisation : Abobo, Abidjan, Côte d'Ivoire
- Couleurs : orange, blanc, noir
- Positionnement : club local, formation, jeunesse, compétition et communauté

## MVP public

- Accueil
- Le Club
- Équipe / joueurs
- Staff
- Matchs et résultats
- Actualités
- Galerie
- Partenaires
- Recrutement / détection
- Contact

## Administration

L'espace `/admin` doit être authentifié et permettre de gérer sans toucher au code :

- joueurs et effectif ;
- membres du staff ;
- matchs, adversaires, dates, lieux et résultats ;
- actualités ;
- galerie photos ;
- partenaires ;
- informations générales du club ;
- contenus principaux de la page d'accueil.

## Principes non négociables

1. Mobile-first.
2. Aucun bouton mort.
3. Aucune donnée sportive fictive présentée comme réelle.
4. Le contenu métier important est administrable.
5. Interface simple et rapide, adaptée à un club local.
6. Le logo et les couleurs A.S ZINGA constituent la référence visuelle.
7. L'espace public reste utilisable sans compte.
8. L'administration est protégée par authentification et autorisations.

## Architecture cible

Application web monolithique légère :

- Laravel
- Blade + Tailwind CSS
- PostgreSQL en production
- SQLite autorisé pour développement/tests rapides
- stockage média local compatible avec une migration ultérieure vers du stockage objet

Cette stack privilégie la vitesse de livraison, la maintenance simple et un espace administrateur intégré sans multiplier les services.

## Modèle métier initial

- User (administrateurs)
- Player
- StaffMember
- Match
- NewsPost
- GalleryItem
- Partner
- ClubSetting
- RecruitmentApplication

## Roadmap courte

### Phase 1 — Socle
Authentification admin, modèle de données, layout public, layout admin, identité visuelle.

### Phase 2 — Football
Effectif, staff, matchs, résultats et prochain match.

### Phase 3 — Communication
Actualités, galerie, partenaires et contact.

### Phase 4 — Détection
Formulaire de recrutement et traitement des candidatures depuis l'administration.

### Phase 5 — Production
Tests fonctionnels, responsive 390/430/768/1440 px, sécurité, SEO de base et déploiement.

## Règle de reprise IA

Avant toute modification, lire ce README. Ne pas remplacer l'architecture ou la doctrine UX sans décision explicite du propriétaire du projet. Priorité absolue : livrer un site réellement utilisable plutôt qu'accumuler des fonctionnalités inachevées.
