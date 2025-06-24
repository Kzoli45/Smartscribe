<script setup lang="ts">
    import { Link } from '@inertiajs/vue3';

    defineProps({
        href: {
            type: String,
            required: true
        },
        method: {
            type: String,
            default: 'get'
        }
    });
</script>

<template>
    <div>
        <Link :href="href" :method="method" class="flex items-center gap-2 p-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-accent">
            <slot name="icon"></slot>
            <span><slot name="text"></slot></span>
        </Link>
    </div>
</template>