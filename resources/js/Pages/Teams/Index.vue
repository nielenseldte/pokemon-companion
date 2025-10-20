<script setup>
import CardContainer from '../../Components/Cards/CardContainer.vue';
import ScrollableTeamContainer from '../../Components/Teams/ScrollableTeamContainer.vue';

</script>

<template>

        <div class="grid grid-cols-1 gap-5">
                <ScrollableTeamContainer teamName="A Team">
                        <CardContainer class="min-w-1/5" :hover="false" :clickable="false"
                                image-url="https://images.pokemontcg.io/ex3/4_hires.png" />
                        <CardContainer class="min-w-1/5" :hover="false" :clickable="false"
                                image-url=" https://images.pokemontcg.io/xy2/4_hires.png" />
                        <CardContainer class="min-w-1/5" :hover="false" :clickable="false"
                                image-url=" https://images.pokemontcg.io/pop5/2_hires.png" />
                        <CardContainer class="min-w-1/5" :hover="false" :clickable="false"
                                image-url=" https://images.pokemontcg.io/det1/1_hires.png" />
                        <CardContainer class="min-w-1/5" :hover="false" :clickable="false"
                                image-url=" https://images.pokemontcg.io/dv1/4_hires.png" />
                        <CardContainer class="min-w-1/5" :hover="false" :clickable="false"
                                image-url=" https://images.pokemontcg.io/dp4/2_hires.png" />
                        <CardContainer class="min-w-1/5" :hover="false" :clickable="false"
                                image-url=" https://images.pokemontcg.io/gym2/3_hires.png" />
                        <CardContainer class="min-w-1/5" :hover="false" :clickable="false"
                                image-url=" https://images.pokemontcg.io/pl4/2_hires.png" />
                </ScrollableTeamContainer>
                <ScrollableTeamContainer teamName="B Team">
                        <CardContainer class="min-w-1/5" :hover="false" :clickable="false"
                                image-url="https://images.pokemontcg.io/ex3/4_hires.png" />
                        <CardContainer class="min-w-1/5" :hover="false" :clickable="false"
                                image-url=" https://images.pokemontcg.io/xy2/4_hires.png" />
                        <CardContainer class="min-w-1/5" :hover="false" :clickable="false"
                                image-url=" https://images.pokemontcg.io/pop5/2_hires.png" />
                        <CardContainer class="min-w-1/5" :hover="false" :clickable="false"
                                image-url=" https://images.pokemontcg.io/det1/1_hires.png" />
                        <CardContainer class="min-w-1/5" :hover="false" :clickable="false"
                                image-url=" https://images.pokemontcg.io/dv1/4_hires.png" />
                        <CardContainer class="min-w-1/5" :hover="false" :clickable="false"
                                image-url=" https://images.pokemontcg.io/dp4/2_hires.png" />
                        <CardContainer class="min-w-1/5" :hover="false" :clickable="false"
                                image-url=" https://images.pokemontcg.io/gym2/3_hires.png" />
                        <CardContainer class="min-w-1/5" :hover="false" :clickable="false"
                                image-url=" https://images.pokemontcg.io/pl4/2_hires.png" />
                </ScrollableTeamContainer>
        </div>

</template>