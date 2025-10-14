<script setup>
defineProps({
    imageUrl: String
});
</script>
<template>
    <div class="rounded-lg overflow-hidden hover:scale-105 transition-all duration-200 cursor-pointer">
        <img :src="imageUrl" alt="" class="object-cover w-full">
    </div>
</template>