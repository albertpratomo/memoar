<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

interface Props {
    site: Object;
}

defineProps<Props>();
</script>

<template>
    <Head title="Memoar" />

    <div class="h-screen flex flex-col items-center justify-center">
        <h1>{{ site.name }}</h1>

        <p>{{ site.diedAt }}</p>
    </div>

    <div class="max-w-sm flex flex-col gap-y-4 mx-auto">
        <div
            v-for="tribute in site.tributes"
            :key="tribute.id"
            class="border rounded p-3"
        >
            {{ tribute.body }}
        </div>
    </div>
</template>
