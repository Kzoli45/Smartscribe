<script setup lang="ts">
    import { Input } from '../ui/input';
    import { defineProps } from 'vue';

    defineProps<{
        name: string;
        required?: boolean;
    }>();
</script>

<template>
    <Input :name="name" :required="required" />
</template>
