<script setup>
import NavigationButton from '../../Components/Buttons/NavigationButton.vue';
import CardContainer from '../../Components/Cards/CardContainer.vue';
import ScrollableTeamContainer from '../../Components/Teams/ScrollableTeamContainer.vue';
import CreateTeamModal from '../../Components/Modals/CreateTeamModal.vue';
import { ref } from 'vue';

let showModal = ref(false);
</script>

<template>
        <div class="flex flex-1 justify-start mb-4">
                <button class="bg-pink px-3 py-0.5 font-semibold transition-all duration-200 cursor-pointer border-t-3 border-b-3 border-black hover:bg-blue hover:text-white"
                        @click="showModal = true">
                        <div class="flex items-center space-x-1">
                                <p>Create Team</p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-plus-icon lucide-plus">
                                        <path d="M5 12h14" />
                                        <path d="M12 5v14" />
                                </svg>
                        </div>
                </button>
        </div>


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
        <Teleport to="body">
                <CreateTeamModal :show="showModal" @close="showModal = false" />
        </Teleport>

</template>