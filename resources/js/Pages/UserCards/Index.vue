<script setup>
import CardContainer from '../../Components/Cards/CardContainer.vue';
import Paginator from '../../Components/Paginator.vue';
import SearchField from '../../Components/SearchField.vue';
import { debounce } from '../../Utils/debounce';
import { router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';


let props = defineProps({
        cards: Object,
        filters: Object
})

let search = ref(props.filters.search);

const debouncedSearch = debounce(value => {
        router.get('/cards', { search: value }, { preserveState: true, replace: true })
}, 400);

watch(search, value => {
        debouncedSearch(value);
});
</script>

<template>
        <section class="flex flex-1 justify-center mb-4">
                <div>
                        <SearchField name="search" id="search" v-model="search"
                                placeholder="search your cards....." />
                </div>
        </section>

        <div class="grid grid-cols-4 gap-5">
                <CardContainer v-for="card in cards.data" :key="card.id" :image-url="card.images.large"
                        :cardId="card.id" />
        </div>
        <div class="flex items-center justify-center mt-7">
                <Paginator :links="cards.links" />
        </div>

</template>