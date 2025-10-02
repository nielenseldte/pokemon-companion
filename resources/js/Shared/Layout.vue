<script setup>
import Nav from './Nav.vue';
import Footer from './Footer.vue';
</script>

<template>
    <div class="flex flex-col min-h-screen">
        <header class="flex py-5 px-1 bg-yellow w-full">
            <Nav />
        </header>
        <main class="dark:bg-gray-800 dark:text-yellow p-6 flex-1">
            <section class="max-w-5xl mx-auto">
                <slot />
            </section>
        </main>
        <footer class="dark:text-yellow dark:bg-gray-800">
            <Footer />
        </footer>
    </div>
</template>