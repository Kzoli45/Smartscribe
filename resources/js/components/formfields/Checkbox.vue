<script setup lang="ts">
    import { Checkbox } from '../ui/checkbox';
    import { defineProps } from 'vue';

    defineProps<{
        name: string;
    }>();
</script>

<template>
    <Checkbox :name="name" />
</template>

