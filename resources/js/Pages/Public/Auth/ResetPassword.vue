
<script setup>
import FormButton from '../../../Components/Buttons/FormButton.vue';
import FormComponent from '../../../Components/Form/FormComponent.vue';
import FormField from '../../../Components/Form/FormField.vue';
import FormInput from '../../../Components/Form/FormInput.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    token: {
        type: String,
        required: true
    },
    email: {
        type: String,
        required: true
    }
});
const form = useForm({
    email: props.email,
    token: props.token,
    password: '',
    password_confirmation: ''
});

let submit = () => {
    form.post('/reset-password');
};

</script>
<template>
    <section class="flex items-center justify-center min-h-screen dark:bg-gray-800 bg-gray-200">
        <FormComponent @submit.prevent="submit" heading="Update your Password">
            <FormField :error="form.errors.password" for="password" label="New Password">
                <FormInput v-model="form.password" name="password" type="password" placeholder="" />
            </FormField>
            <FormField for="password_confirm" label="Confirm New Password">
                <FormInput v-model="form.password_confirmation" name="password_confirm" type="password"
                    placeholder="" />
            </FormField>
            <FormButton :disabled="form.processing">Update Password</FormButton>
        </FormComponent>
    </section>
</template>