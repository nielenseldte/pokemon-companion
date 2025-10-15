<script setup>

defineProps({
    imageUrl: String,
    cardId: String
});
</script>
<template>
    <div class="rounded-lg overflow-hidden hover:scale-105 transition-all duration-200 cursor-pointer">
        <Link :href="`allcards/${cardId}`"><img :src="imageUrl" alt="" class="object-cover w-full"></Link>
    </div>
</template>