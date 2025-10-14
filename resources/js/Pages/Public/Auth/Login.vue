<script setup>
import FormButton from '../../../Components/Buttons/FormButton.vue';
import FormComponent from '../../../Components/Form/FormComponent.vue';
import FormField from '../../../Components/Form/FormField.vue';
import FormInput from '../../../Components/Form/FormInput.vue';
import { useForm } from '@inertiajs/vue3';

let form = useForm({
    email: '',
    password: '',
});

let submit = () => {
    form.post('/login');
};

</script>
<template>
    <section class="flex items-center justify-center min-h-screen dark:bg-gray-800 bg-gray-200">
        <FormComponent @submit.prevent="submit" heading="Log in to your account">
            <FormField :error="form.errors.email" for="email" label="Email">
                <FormInput v-model="form.email" name="email" type="email" />
            </FormField>
            <FormField :error="form.errors.password" for="password" label="Password">
                <FormInput v-model="form.password" name="password" type="password" />
            </FormField>
            <FormButton :disabled="form.processing">Log In</FormButton>
            <div class="text-blue dark:text-yellow text-center">
                <span>Don't have an account?</span>
                <Link class="ml-1.5 text-pink hover:underline" href="/register">Register</Link>
            </div>
            <div class="text-blue-500 underline text-center">
                <Link href="#">Forgot Password</Link>
            </div>
        </FormComponent>
    </section>
</template>