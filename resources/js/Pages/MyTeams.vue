<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <header class="flex py-5 bg-yellow w-full">
    <nav class="pl-4 flex justify-start space-x-5 text-xl">
        <Link href="/home" class="hover:scale-110 hover:text-purple transition-all duration-150 hover:font-bold">
        Home</Link>
        <Link href="/my-cards" class="hover:scale-110 hover:text-purple transition-all duration-150 hover:font-bold">My
        Cards</Link>
        <Link href="/my-teams" class="hover:scale-110 hover:text-purple transition-all duration-150 hover:font-bold">My
        Teams</Link>
        <Link href="/all-cards" class="hover:scale-110 hover:text-purple transition-all duration-150 hover:font-bold">
        All Cards</Link>
    </nav>
    </header>
    <main>
        <h1>welcome to my teams view</h1>
    </main>
    <footer>

    </footer>
</template>