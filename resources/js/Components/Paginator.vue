<script setup>
defineProps({
    links: Array
})
</script>

<template>
    <div>
        <Component :is="link.url ? 'Link' : 'span'" v-for="link in links" :key="link.label" :href="link.url"
            v-html="link.label" class="px-3"
            :class="[link.url ? '' : 'text-gray-500', link.active ? 'text-pink' : '', link.url ? 'hover:text-purple-400' : '']"
            v-bind="link.url ? { preserveScroll: true } : {}" />
    </div>
</template>