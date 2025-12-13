<script setup>
import FormComponent from '../../Components/Form/FormComponent.vue';
import FormField from '../../Components/Form/FormField.vue';
import FormInput from '../../Components/Form/FormInput.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    show: Boolean
});
const form = useForm({
    teamname: ''
});

let submit = () => {
    form.post('/teams/create');
}
</script>

<template>
    <Transition enter-from-class="opacity-0 scale-110" 
                enter-to-class="opacity-100 scale-100" 
                leave-from-class="opacity-100"
                leave-to-class="opacity-0" 
                enter-active-class="transition duration-300" 
                leave-active-class="transition duration-100">
        <div v-if="show" class="inset-0 fixed bg-black/60 grid place-items-center">
            <div class="p-1 min-w-1/5">
                <FormComponent heading="Create a Team">
                    <FormField for="teamname" label="Team Name">
                        <FormInput v-model="form.teamname" name="teamname" type="text" placeholder="Team A" />
                    </FormField>
                    <div class="flex items-center justify-between">
                        <button @click="$emit('close')"
                            class="cursor-pointer bg-red-700 dark:bg-red-500 dark:text-black hover:scale-105 transition-all duration-150 font-medium rounded-lg text-sm px-3 py-1 text-center text-white">
                            Cancel
                        </button>
                        <button type="submit" class="cursor-pointer bg-blue dark:bg-yellow dark:text-black hover:scale-105
                        transition-all duration-150 font-medium rounded-lg text-sm px-3 py-1 text-center
                        text-white">Create</button>
                    </div>
                </FormComponent>
            </div>
        </div>
    </Transition>
</template>