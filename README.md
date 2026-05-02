# Pokémon Companion

Pokémon Companion is a Laravel application for managing Pokémon TCG cards, building personal collections, and creating teams from owned cards.

---

## 🚀 Features

- Browse Pokémon TCG cards
- View detailed card information
- Search card listings
- Add cards to your personal inventory
- Build teams using owned cards
- Simple ownership tracking per user

---

## 🃏 Cards

- Card data is stored in MongoDB
- Cards are imported from an external Pokémon TCG API using an Artisan command
- Only Pokémon cards (not energy cards) are included

---

## 👤 User Inventory

- Users can collect cards into their personal inventory
- Ownership is stored using a `user_cards` table
- A user can only use cards they own when building teams

---

## 🧩 Teams

- Users can create teams
- Each team contains up to 8 cards
- Only owned cards can be added to a team

---

## ⚙️ Tech Stack

- Laravel
- MongoDB
- SQLite
- Inertia.js
- Vue 3
- Tailwind CSS

---
