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
    },
    owned : Boolean
});
</script>
<template>

    <div class="relative rounded-lg overflow-hidden transition-all duration-200"
        :class="hover ? 'hover:scale-105' : '', clickable ? 'cursor-pointer' : ''" v-bind="$attrs">
        <div v-if="owned" class="group-hover:hidden absolute top-0 right-0 text-green-600">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="currentColor"
                stroke="none">
                <path
                    d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z" />
                <path d="m9 12 2 2 4-4" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    fill="none" />
            </svg>
        </div>
        <Component :is="clickable ? 'Link' : 'div'" :href="clickable ? `allcards/${cardId}` : null"><img :src="imageUrl"
                alt="" class="object-cover w-full"></Component>
    </div>

</template>