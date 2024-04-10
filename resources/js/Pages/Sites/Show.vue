<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

interface Props {
    site: Object
}

defineProps<Props>()
</script>

<template>
    <Head title="Memoar" />

    <div class="h-screen flex items-center justify-center">
        <h1>{{ site.name }}</h1>
    </div>
</template>
