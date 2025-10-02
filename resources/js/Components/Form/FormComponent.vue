<script setup>
const props = defineProps({
    heading: {
        type: String,
        required: true
    },
})

</script>
<template>
    <form class="max-w-sm w-full">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
            <div class="w-full bg-white dark:bg-gray-900 rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl text-blue dark:text-yellow font-bold leading-tight tracking-tight md:text-2xl text-center">
                        {{ heading }}
                    </h1>
                    <slot />
                </div>
            </div>
        </div>
    </form>
</template>