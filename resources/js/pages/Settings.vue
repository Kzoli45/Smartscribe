<script setup lang="ts">

    import Sidebar from '@/components/Sidebar.vue';
    import AppearanceTabs from '@/components/AppearanceTabs.vue';
    import DeleteUser from '@/components/DeleteUser.vue';
    import {Separator} from '@/components/ui/separator/';

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
        <div class="min-h-[100vh] flex-1 rounded-lg bg-muted/50 md:min-h-min p-4">
          <div class="flex flex-col gap-4">
            <h1 class="text-2xl">Theme</h1>
            <AppearanceTabs class="bg-transparent border-2 dark:border-white border-gray-700"/>
          </div>
          <Separator class="my-8 bg-black dark:bg-white" />
          <div class="flex flex-col gap-4">
            <h1 class="text-2xl">Delete User</h1>
            <DeleteUser />
          </div>
        </div>
    </Sidebar>
</template>
