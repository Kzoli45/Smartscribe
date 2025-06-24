<script setup lang="ts">

    import Sidebar from '@/components/Sidebar.vue';

    defineProps<{
        user: {
            id: string;
            name: string;
            email: string;
            avatar: string;
        };
    }>();

</script>

<template>
    <Sidebar>
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
          <div class="aspect-video rounded-xl bg-muted/50" />
          <div class="aspect-video rounded-xl bg-muted/50" />
          <div class="aspect-video rounded-xl bg-muted/50" />
        </div>
        <div class="min-h-[100vh] flex-1 rounded-xl bg-muted/50 md:min-h-min" />
    </Sidebar>
</template>
