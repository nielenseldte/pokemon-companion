<script setup>
import CardContainer from '../../Components/Cards/CardContainer.vue';
const props = defineProps({
        cards: Object
});

</script>

<template>

        <div class="grid grid-cols-4 gap-5">
                <CardContainer v-for="card in cards" :key="card.id" :image-url="card.images.large" />
        </div>

</template>