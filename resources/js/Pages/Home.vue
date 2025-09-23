<script setup>
import Layout from '../Shared/Layout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    time: {
        type: String
    }
})
</script>

<template>
    <Layout>
        <h1>Hello from the home page</h1>
        <div class="flex items-end min-h-screen">
            <div class="flex-col space-y-2">
                <p>The current time is {{ time }}</p>
                <Link preserve-scroll class="text-blue" href="/home">Refresh</Link>
            </div>
        </div>
    </Layout>
</template>