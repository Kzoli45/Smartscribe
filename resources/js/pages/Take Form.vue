<script setup lang="ts">
    import { defineProps } from 'vue';
    import Sidebar from '@/components/Sidebar.vue';

    defineProps({
        form: {
            type: Object as () => Record<string, any>,
            required: true
        },
        creator: {
            type: Object as () => Record<string, any>,
            required: true
        },
        fields: {
            type: Array as () => Array<Record<string, any>>,
            required: true
        },
    });
</script>

<template>
    <Sidebar>
        <div class="min-h-[100vh] flex-1 rounded-xl bg-muted/50 md:min-h-min p-4">
            <div v-for="field in fields" :key="field.id">
                <h2 class="text-xl font-bold">{{ field.field_name }}</h2>
                <p class="mt-2">{{ field.field_description }}</p>
            </div>
        </div>
    </Sidebar>
</template>