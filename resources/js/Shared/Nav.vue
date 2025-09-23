<script setup>
import NavLink from '../Components/NavLink.vue';
import { Link } from '@inertiajs/vue3';
</script>
<template>
    <nav class="pl-4 pr-4 flex justify-between text-xl flex-1">
        <section class="flex justify-start space-x-5">
            <NavLink href="/home" :active="$page.component == 'Home'">Home</NavLink>
            <NavLink href="/my-cards" :active="$page.component == 'MyCards'">My Cards</NavLink>
            <NavLink href="/my-teams" :active="$page.component == 'MyTeams'">My Teams</NavLink>
            <NavLink href="/all-cards" :active="$page.component == 'AllCards'">All Cards</NavLink>
        </section>
        <section class="flex">
            <Link href="/logout"
                class="hover:scale-110 text-red-600 hover:font-bold border-b-2 hover:border-red-600 border-transparent transition-all duration-150">
            Log Out
            </Link>
        </section>
    </nav>
</template>