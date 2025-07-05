<script setup lang="ts">
    import { Input } from '../ui/input';
    import { defineProps } from 'vue';

    defineProps<{
        name: string;
    }>();
</script>

<template>
    <Input :name="name" type="date" class="scheme-light dark:scheme-dark" />
</template>
