<script setup lang="ts">
    import {
    Select,
    SelectContent,
    SelectGroup,
    SelectItem,
    SelectTrigger,
    SelectValue,
    } from '@/components/ui/select'

    import { defineProps } from 'vue';

    const props = defineProps<{
        items: string[];
    }>();
</script>

<template>
  <Select multiple>
    <SelectTrigger class="w-1/4 bg-transparent border border-black dark:border-white">
      <SelectValue placeholder="Select items" />
    </SelectTrigger>
    <SelectContent>
      <SelectGroup>
        <SelectItem v-for="item in props.items" :key="item" :value="item">
          {{ item }}
        </SelectItem>
      </SelectGroup>
    </SelectContent>
  </Select>
</template>