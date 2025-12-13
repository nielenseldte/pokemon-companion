<script setup>
import ActionCardContainer from '../../Components/Cards/ActionCardContainer.vue';
import CardContainer from '../../Components/Cards/CardContainer.vue';
import EmptyCardSlot from '../../Components/Cards/EmptyCardSlot.vue';
</script>
<template>
    <div class="border-8 bg-purple border-yellow">
        <div class="pb-8 pt-8 pr-2 pl-2">
            <div class="justify-items-center gap-y-8 grid grid-cols-4">
                <ActionCardContainer />
                <EmptyCardSlot />
                <EmptyCardSlot />
                <EmptyCardSlot />
                <EmptyCardSlot />
                <EmptyCardSlot />
                <EmptyCardSlot />
                <EmptyCardSlot />
            </div>
        </div>
    </div>
</template>