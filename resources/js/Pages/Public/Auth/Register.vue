<script setup>
import FormComponent from '../../../Components/Form/FormComponent.vue';
import FormField from '../../../Components/Form/FormField.vue';
import FormInput from '../../../Components/Form/FormInput.vue';
import FormButton from '../../../Components/Buttons/FormButton.vue';
import {useForm} from '@inertiajs/vue3';

let form = useForm({
    username: '',
    email: '',
    password: '',
    password_confirmation: ''
});

let submit = () => {
    form.post('/register');
};
</script>
<template>
    <section class="flex items-center justify-center min-h-screen dark:bg-gray-800 bg-gray-200">
        <FormComponent @submit.prevent="submit" heading="Create your account">
            <FormField :error="form.errors.username" for="username" label="Username">
                <FormInput v-model="form.username" name="username" type="text" placeholder="username" />
            </FormField>
            <FormField :error="form.errors.email" for="email" label="Email">
                <FormInput v-model="form.email" name="email" type="email" placeholder="example@email.com" />
            </FormField>
            <FormField :error="form.errors.password" for="password" label="Password">
                <FormInput v-model="form.password" name="password" type="password" placeholder="••••••••" />
            </FormField>
            <FormField for="password_confirm" label="Confirm Password">
                <FormInput v-model="form.password_confirmation" name="password_confirm" type="password"
                    placeholder="••••••••" />
            </FormField>
            <FormButton>Register</FormButton>
            <div class="text-blue dark:text-yellow text-center">
                <span>Have an account?</span><Link class="ml-1.5 text-pink hover:underline" href="/login">Log in</Link>
            </div>
        </FormComponent>
    </section>

</template>