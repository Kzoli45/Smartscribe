<script setup lang="ts">
    import { defineProps } from 'vue';

    const variants = {
        default: 'bg-black border border-gray-700 text-white',
        success: 'bg-green-500 text-white',
        error: 'bg-red-500 text-white',
        warning: 'bg-yellow-500 text-black',
        info: 'bg-blue-500 text-white',
    };

    const props = defineProps<{
        variant?: keyof typeof variants
        title?: string;
        message?: string;
    }>();
</script>

<template>
    <div class="absolute top-4 right-4 z-50 min-w-[200px] transition-all duration-300">
        <div class="flex flex-col gap-2 rounded-md p-4" :class="variants[props.variant ?? 'default']">
            <h1 class="text-lg font-semibold">{{ props.title }}</h1>
            <p>{{ props.message }}</p>
        </div>
    </div>
</template>

