<script setup lang="ts">
    import { Input } from '../ui/input';
    import { defineProps } from 'vue';

    defineProps<{
        name: string;
    }>();
</script>

<template>
    <Input :name="name" type="file" accept="image/*" />
</template>
