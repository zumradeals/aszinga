# A.S ZINGA — Data Model MVP

## users
Administrateurs authentifiés. Prévoir `is_admin` ou un rôle équivalent. Aucun accès public au back-office.

## players
`id`, `first_name`, `last_name`, `display_name`, `shirt_number`, `position`, `photo_path`, `birth_date`, `height_cm`, `preferred_foot`, `bio`, `is_active`, `sort_order`, timestamps.

## staff_members
`id`, `name`, `role`, `photo_path`, `bio`, `phone` optionnel et privé côté public par défaut, `is_active`, `sort_order`, timestamps.

## matches
`id`, `opponent_name`, `competition`, `venue_type`, `kickoff_at`, `venue`, `status`, `as_zinga_score`, `opponent_score`, `summary`, timestamps.

Règle : les scores restent NULL tant que le résultat n'est pas saisi. Ne jamais transformer NULL en 0-0 sur le site public.

## news_posts
`id`, `title`, `slug`, `excerpt`, `body`, `cover_image_path`, `status`, `published_at`, `author_id`, timestamps.

## gallery_items
`id`, `image_path`, `caption`, `album`, `taken_at`, `sort_order`, `is_published`, timestamps.

## partners
`id`, `name`, `logo_path`, `website_url`, `description`, `is_active`, `sort_order`, timestamps.

## club_settings
Table singleton ou clé/valeur structurée pour l'identité et les coordonnées administrables.

## recruitment_applications
`id`, `first_name`, `last_name`, `birth_date`, `position`, `phone`, `email` optionnel, `location`, `experience`, `message`, `status`, timestamps.

## Contraintes

- slugs uniques pour les actualités ;
- validation stricte des uploads ;
- images uniquement dans les champs image ;
- pagination des listes admin et publiques volumineuses ;
- suppression de média contrôlée ;
- dates stockées de façon cohérente et affichées dans le fuseau local configuré ;
- aucune donnée de démonstration en production.
