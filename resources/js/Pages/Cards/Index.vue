<script setup>
import CardContainer from '../../Components/Cards/CardContainer.vue';
import SearchField from '../../Components/SearchField.vue';
</script>

<template>
        <section class="flex flex-1 justify-center mb-4">
                <div>
                        <SearchField placeholder="type to search the pokemon database....." />
                </div>
        </section>

        <div class="grid grid-cols-4 gap-5">
                <CardContainer image-url="https://images.pokemontcg.io/hgss4/1_hires.png" />
                <CardContainer image-url=" https://images.pokemontcg.io/pl1/1_hires.png" />
                <CardContainer image-url=" https://images.pokemontcg.io/dp3/1_hires.png" />
                <CardContainer image-url=" https://images.pokemontcg.io/det1/1_hires.png" />
                <CardContainer image-url=" https://images.pokemontcg.io/dv1/1_hires.png" />
                <CardContainer image-url=" https://images.pokemontcg.io/pl3/1_hires.png" />
                <CardContainer image-url=" https://images.pokemontcg.io/sm115/1_hires.png" />
                <CardContainer image-url=" https://images.pokemontcg.io/dv1/3_hires.png" />
        </div>

</template>