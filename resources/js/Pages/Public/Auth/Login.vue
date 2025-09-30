<script setup>
import FormComponent from '../../../Components/Form/FormComponent.vue';
import FormField from '../../../Components/Form/FormField.vue';
import FormInput from '../../../Components/Form/FormInput.vue';

</script>
<template>
    <section
        class="flex items-center justify-center min-h-screen bg-gradient-to-r dark:from-blue dark:to-purple-900 from-yellow to-orange-400">
        <FormComponent heading="Log in to your account">
            <FormField label="Email">
                <FormInput name="email" type="email" placeholder="example@email.com" />
            </FormField>
            <FormField label="Password">
                <FormInput name="password" type="password" placeholder="••••••••" />
            </FormField>
            <button
                class="w-full cursor-pointer bg-blue dark:bg-yellow dark:text-black hover:scale-105 transition-all duration-150 font-medium rounded-lg text-sm px-5 py-2.5 text-center text-white"
                type="submit">
                Log In
            </button>
        </FormComponent>

    </section>
</template>