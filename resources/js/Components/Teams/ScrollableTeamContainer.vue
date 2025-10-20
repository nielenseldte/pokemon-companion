<script setup>
import { ref } from 'vue';
import NavigationButton from '../Buttons/NavigationButton.vue';
const props = defineProps({
    teamName: {
        type: String,
        required: true
    }
})
const scrollContainer = ref(null);
let scrollInterval = null;

function scrollLeft() {
    scrollInterval = setInterval(() => {
        scrollContainer.value.scrollBy({
            left: -7,
            behavior: 'auto'
        });
    }, 20);
}

function scrollRight() {
    scrollInterval = setInterval(() => {
        scrollContainer.value.scrollBy({
            left: 7,
            behavior: 'auto'
        });
    }, 20);
}

function stopScroll() {
    if (scrollInterval) {
        clearInterval(scrollInterval);
        scrollInterval = null;
    }
}
</script>
<template>
    <div class="border-8 bg-purple border-yellow">
        <div class="flex items-center justify-between mt-2 px-3">
            <p class="text-xl">{{ teamName }}</p>
            <NavigationButton href="#">View Details</NavigationButton>
        </div>
        <div ref="scrollContainer" class="flex items-center space-x-3 p-3 scrollable-hidden pb-1">
            <slot />
        </div>
        <div class="flex items-center justify-between">
            <p class="cursor-pointer p-3 hover:text-pink" @mouseenter="scrollLeft" @mouseleave="stopScroll">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-move-left-icon lucide-move-left  transition-colors duration-150">
                    <path d="M6 8L2 12L6 16" />
                    <path d="M2 12H22" />
                </svg>
            </p>
            <p class="cursor-pointer p-3 hover:text-pink" @mouseenter="scrollRight" @mouseleave="stopScroll">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-move-right-icon lucide-move-right transition-colors duration-150">
                    <path d="M18 8L22 12L18 16" />
                    <path d="M2 12H22" />
                </svg>
            </p>
        </div>
    </div>
</template>