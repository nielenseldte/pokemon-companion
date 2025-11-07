<script setup>
import FormButton from '../../../Components/Buttons/FormButton.vue';
import FormComponent from '../../../Components/Form/FormComponent.vue';
import FormField from '../../../Components/Form/FormField.vue';
import FormInput from '../../../Components/Form/FormInput.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    email: '',
});

let submit = () => {
    form.post('/forgot-password');
};

</script>
<template>
    <section class="flex items-center justify-center min-h-screen dark:bg-gray-800 bg-gray-200">
        <FormComponent @submit.prevent="submit" heading="Forgot Password">
            <FormField :error="form.errors.email" for="email" label="Email">
                <FormInput v-model="form.email" name="email" type="email" />
            </FormField>
            <div v-if="$page.props.flash.success" class="text-green-500">
                {{ $page.props.flash.success }}
            </div>
            <FormButton :disabled="form.processing">Reset Password</FormButton>
        </FormComponent>
    </section>
</template>