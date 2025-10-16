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
        class="bg-pink px-3 py-0.5 font-semibold transition-all duration-200 cursor-pointer border-t-3 border-b-3 border-black hover:bg-blue hover:text-white">
        <slot />
    </Link>
</template>