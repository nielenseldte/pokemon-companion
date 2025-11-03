<script setup>
import CardContainer from '../../Components/Cards/CardContainer.vue';
import CardActionButton from '../../Components/Buttons/CardActionButton.vue';

const props = defineProps({
    card: Object,
    isOwned: Boolean
});
defineOptions({
    layout: null
});
</script>
<template>
    <div class="flex justify-center mt-10">
        <section class="grid grid-cols-2 gap-8 items-start">
            <CardContainer :cardId="card.id" :imageUrl="card.images.large" :hover="false" :clickable="false"
                class="w-xs" />
            <div class="my-auto space-y-4 text-xl">
                <div>
                    <p class="font-semibold mr-4 inline">Name</p> <span class="text-pink">{{ card.name }}</span>
                </div>
                <div>
                    <p class="font-semibold mr-4 inline">HP :</p> <span class="text-pink">{{ card.hp }}</span>
                </div>
                <div>
                    <p class="font-semibold mr-4 inline">Combined Attack Damage :</p> <span class="text-pink">{{
                        card.total_damage
                        }}</span>
                </div>
                <div>
                    <p class="font-semibold mr-4 inline">Highest Value :</p> <span class="text-pink">${{ card.value.high
                        }}</span>
                </div>
                <div>
                    <p class="font-semibold mr-4 inline">Lowest Value :</p> <span class="text-pink">${{ card.value.low
                        }}</span>
                </div>
                <div>
                    <p class="font-semibold mr-4 inline">Current Value :</p> <span class="text-pink">${{
                        card.value.market
                        }}</span>
                </div>
                <div>
                    <p class="font-semibold mr-4 inline">Average Sale Price :</p> <span class="text-pink">${{
                        card.average_sale_price
                        }}</span>
                </div>
                <div>
                    <a :href="card.price_url" target="_blank"
                        class="text-blue-500 text-md italic underline hover:text-pink">Check it out on cardmarket</a>
                </div>
            </div>
            <div class="flex justify-center space-x-8">
                <CardActionButton :endpoint="`/allcards/${card.id}/inventory`" :method="isOwned ? 'delete' : 'post'" :type="isOwned ? 'remove_from_inventory' : 'inventory'">{{ isOwned ? 'Remove from Inventory' : 'Add to Inventory'  }}</CardActionButton>
                
                <CardActionButton :endpoint="`/allcards/${card.id}`" method="post" type="wishlist">Add to Wishlist</CardActionButton>
            
            </div>
        </section>
    </div>
</template>