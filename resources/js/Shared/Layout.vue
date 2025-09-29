<script setup>
import Nav from './Nav.vue';
</script>

<template>
    <header class="flex py-5 px-1 bg-yellow w-full">
        <Nav />
    </header>
    <main class="p-6">
        <section class="max-w-3xl mx-auto"><slot /></section>
    </main>
    <footer>

    </footer>
</template>