<script setup>

</script>
<template>
    <div class="flex items-center space-x-2">
        <input type="text"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:w-[300px] sm:text-sm rounded-full py-1 px-2 dark:bg-gray-700 dark:text-white"
            v-bind="$attrs"
            >
        <button class="px-2 cursor-pointer border dark:border-yellow dark:text-yellow text-blue border-blue rounded-full py-1 group">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-search-icon lucide-search group-hover:scale-110 transition-all duration-150">
                <path d="m21 21-4.34-4.34" />
                <circle cx="11" cy="11" r="8" />
            </svg>
        </button>
    </div>
</template>