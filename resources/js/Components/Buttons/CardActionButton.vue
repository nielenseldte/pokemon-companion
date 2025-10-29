<script setup>
import { computed } from 'vue';
import Inventory from '../ButtonIcons/Inventory.vue';
import Remove from '../ButtonIcons/Remove.vue';
import Replace from '../ButtonIcons/Replace.vue';
import Wishlist from '../ButtonIcons/Wishlist.vue';
const props = defineProps({
    type: {
        required: true,
        type: String,
        validator: value => ['replace', 'remove', 'wishlist', 'inventory'].includes(value)
    }
});

const icon = computed(() => {
    switch (props.type) {
        case 'replace':
            return Replace;
        case 'remove':
            return Remove;
        case 'wishlist':
            return Wishlist;
        case 'inventory':
            return Inventory;
        default:
            return null;
    }
});
</script>
<template>
    <button
        class="cursor-pointer text-white px-4 py-2 rounded-lg transition-all duration-200 flex items-center gap-2 hover:scale-105 shadow-lg"
        :v-bind="$attrs" :class="type == 'replace' ? 'bg-blue-500 hover:bg-blue:600' : '',
            type == 'remove' ? 'bg-red-500 hover:bg-red-600' : '',
            type == 'wishlist' ? 'bg-yellow-500 hover:bg-yellow-600' : '',
            type == 'inventory' ? 'bg-green-500 hover:bg-green-600' : ''
            ">
        <component :is="icon" />
        <span class="font-medium text-sm"><slot /></span>
    </button>
</template>