<script setup>
import CardActionButton from '../Buttons/CardActionButton.vue';
import CardContainer from './CardContainer.vue';
</script>
<template>
    <div class="relative group overflow-hidden">
        <CardContainer :hover="false" :clickable="false" class="w-50"
            image-url="https://images.pokemontcg.io/xy2/4_hires.png" />
        <div
            class="absolute bottom-0 left-0 right-0 bg-linear-to-t from-black/90 to-transparent translate-y-full group-hover:translate-y-0 transition-transform duration-500 flex items-end justify-center gap-3 pb-6 pt-8">
            <CardActionButton type="replace">Replace</CardActionButton>
            <CardActionButton type="remove">Remove</CardActionButton>
        </div>
    </div>
</template>