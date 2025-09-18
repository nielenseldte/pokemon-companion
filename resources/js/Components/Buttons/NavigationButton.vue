<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    href: {
        type: String,
        required: true,
        }
    })
</script>
<template>
    <Link :href="href"
        class="rounded-md bg-white px-3 py-1 transition-all duration-200 cursor-pointer hover:scale-105 hover:bg-gradient-to-r hover:from-pink-500 hover:to-purple-500 hover:text-white">
        <slot />
    </Link>
</template>