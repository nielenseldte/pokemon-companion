<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    href :{
        type: String,
        required: true
    },
    active: {
        type: Boolean
    }
});
</script>

<template>
    <Link :href="href" class="px-1" :class="{
        'bg-purple text-yellow': active,
        'hover:scale-110 hover:text-purple transition-all duration-150 hover:font-bold': !active }">
        <slot />
    </Link>
</template>