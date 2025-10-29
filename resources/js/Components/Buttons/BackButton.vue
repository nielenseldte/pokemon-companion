<script setup>
function goBack() {
    window.history.back();
}

</script>
<template>
    <button @click="goBack"
        class=" flex items-center bg-pink px-3 py-0.5 font-semibold transition-all duration-200 cursor-pointer border-t-3 border-b-3 border-black hover:bg-blue hover:text-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-arrow-left-icon lucide-arrow-left mr-1">
            <path d="m12 19-7-7 7-7" />
            <path d="M19 12H5" />
        </svg>
        <slot />
    </button>
</template>