<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

defineProps({
    time: {
        type: String
    }
})
const page = usePage();
const username = computed(() => {
    return page.props.auth.user?.name;
});

</script>

<template>
    <Layout>
        <h1>Hello from the home page, {{ username }}</h1>
        <div class="flex items-end min-h-screen">
            <div class="flex-col space-y-2">
                <p>The current time is {{ time }}</p>
                <Link preserve-scroll class="text-blue" href="/home">Refresh</Link>
            </div>
        </div>
    </Layout>
</template>