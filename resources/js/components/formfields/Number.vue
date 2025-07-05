<script setup lang="ts">
    import {
        NumberField,
        NumberFieldContent,
        NumberFieldDecrement,
        NumberFieldIncrement,
        NumberFieldInput,
        } from '@/components/ui/number-field'
    import { defineProps } from 'vue';

    defineProps<{
        name: string;
    }>();
</script>

<template>
    <NumberField :id="name" :default-value="0" :min="0" class="w-1/4 border bg-transparent border-black dark:border-white rounded-md">
    <NumberFieldContent>
      <NumberFieldDecrement />
      <NumberFieldInput />
      <NumberFieldIncrement />
    </NumberFieldContent>
  </NumberField>
</template>
