<script setup>
import { Link } from '@inertiajs/vue3';
import NavigationButton from '../../Components/Buttons/NavigationButton.vue';
</script>

<template>
    <main class="relative h-screen flex items-center justify-center">
        <div
            class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1613771404721-1f92d799e49f?q=80&w=2938&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-cover bg-center brightness-50 z-0">
        </div>

        <section
            class="flex flex-col gap-8 bg-gradient-to-br from-yellow-300 to-orange-400 rounded-lg px-4 py-7 w-full max-w-sm shadow-xl shadow-yellow-800/50 z-10">
            <section class="w-full mb-4 text-center">
                <h1 class="text-3xl">Welcome to Pokémon Companion!</h1>
            </section>
            <section class="flex items-center justify-evenly">
                <NavigationButton href="/register">Sign Up</NavigationButton>
                <NavigationButton href="/login"
                    >
                    Log In
                </NavigationButton>
            </section>
        </section>
    </main>
</template>

