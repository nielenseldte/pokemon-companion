<script setup>
import Nav from './Nav.vue';
</script>

<template>
    <header class="flex py-5 px-1 bg-yellow w-full">
        <Nav />
    </header>
    <main>
        <slot />
    </main>
    <footer>

    </footer>
</template>