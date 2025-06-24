<script setup lang="ts">
    import TextLogo from './TextLogo.vue';
    import TimedWelcome from '@/components/navbar/TimedWelcome.vue';
    import UsernameDropdown from '@/components/navbar/UsernameDropdown.vue';
    import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar'
    import { usePage } from '@inertiajs/vue3';
    import { capitalizeFirstLetter } from '@/composables/capitalize';

    const page = usePage();
    const user = page.props.auth.user;
</script>

<template>
    <nav class="flex items-center justify-between p-4 w-full">
        <div>
            <TextLogo />
        </div>
        <div class="flex items-center gap-4 ">
            <div class="flex items-center justify-center gap-2 dark:text-white ml-5">
                <template v-if="user">
                    <a href="/profile">
                        <Avatar class="w-12 h-12 dark:text-white">
                            <AvatarImage :src="user.avatar" v-if="user.avatar" />
                            <AvatarFallback>{{ user.name.charAt(0).toUpperCase() }}</AvatarFallback>
                        </Avatar>
                    </a>
                    <div class="flex flex-col gap-1 items-center justify-center">
                        <TimedWelcome />
                        <div class="flex items-center gap-1">
                            <span>{{ capitalizeFirstLetter(user.name) }}</span>
                            <UsernameDropdown />
                        </div>
                    </div>
                </template>
                <template v-else>
                    <Avatar class="w-12 h-12 dark:text-white">
                        <AvatarFallback>G</AvatarFallback>
                    </Avatar>
                    <div class="flex flex-col gap-1 items-center justify-center">
                        <TimedWelcome />
                        <div class="flex items-center gap-1">
                            <span>Guest</span>
                            <UsernameDropdown />
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </nav>
</template>
