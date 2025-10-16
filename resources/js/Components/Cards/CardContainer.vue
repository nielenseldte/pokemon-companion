<script setup>

defineProps({
    imageUrl: String,
    cardId: String,
    hover: {
        type: Boolean,
        default: true
    },
    clickable: {
        type: Boolean,
        default: true
    }
});
</script>
<template>
    <div class="rounded-lg overflow-hidden transition-all duration-200" :class="hover ? 'hover:scale-105' : '', clickable ? 'cursor-pointer' : ''" v-bind="$attrs">
        <Component :is="clickable ? 'Link' : 'div'" :href="clickable ? `allcards/${cardId}` : null"><img :src="imageUrl" alt="" class="object-cover w-full"></Component>
    </div>
</template>