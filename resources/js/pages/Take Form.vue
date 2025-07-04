<script setup lang="ts">
    import { defineProps } from 'vue';
    import Sidebar from '@/components/Sidebar.vue';
    import { Input } from '@/components/ui/input';

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
            <div class="flex flex-col gap-4">
                <h1 class="text-2xl font-bold capitalize">{{ form.title }}</h1>
                <p class="mt-2">{{ form.description }}</p>
                <div class="flex flex-col gap-2">
                    <div v-for="field in fields" :key="field.id">
                        <p class="my-2">{{ field.field_description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </Sidebar>
</template>