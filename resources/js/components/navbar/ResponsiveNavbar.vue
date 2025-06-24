<script setup lang="ts">
    import { usePage } from '@inertiajs/vue3';
    import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
    import {
        Sheet,
        SheetContent,
        SheetDescription,
        SheetHeader,
        SheetTitle,
        SheetTrigger,
    } from '@/components/ui/sheet'
    import {Separator} from '@/components/ui/separator';
    import TextLogo from '@/components/navbar/TextLogo.vue';
    import ResponsiveNavLink from '@/components/navbar/ResponsiveNavLink.vue';
    import { Menu, Plus, User, PanelsTopLeft, LogIn, UserPlus, DoorOpen } from 'lucide-vue-next';
    import { capitalizeFirstLetter } from '@/composables/capitalize';
    import { Link } from '@inertiajs/vue3';

    const page = usePage();
    const user = page.props.auth.user;
</script>

<template>
   <nav class="flex items-center justify-between p-4 w-full">
        <TextLogo />
        <Sheet>
            <SheetTrigger><Menu class="dark:text-white cursor-pointer" /></SheetTrigger>
             <SheetContent>
            <SheetHeader class="mt-2">
                <SheetTitle>
                    <div class="flex items-center justify-start gap-2 dark:text-white">
                        <template v-if="user">
                            <Avatar class="w-10 h-10 dark:text-white">
                                <AvatarImage :src="user.avatar" v-if="user.avatar" />
                                <AvatarFallback>{{ user.name.charAt(0).toUpperCase() }}</AvatarFallback>
                            </Avatar>
                            <div class="flex flex-col gap-1 items-center justify-center">
                                <TimedWelcome />
                                <div class="flex items-center gap-1">
                                    <span>{{ capitalizeFirstLetter(user.name) }}</span>
                                </div>
                            </div>
                        </template>
                        <template v-else>
                            <Avatar class="w-10 h-10 dark:text-white">
                                <AvatarFallback>G</AvatarFallback>
                            </Avatar>
                            <div class="flex flex-col gap-1 items-center justify-center">
                                <TimedWelcome />
                                <div class="flex items-center gap-1">
                                    <span>Guest</span>
                                </div>
                            </div>
                        </template>
                    </div>
                </SheetTitle>
                <Separator class="my-2" />
                <SheetDescription>
                    <template v-if="user">
                        <ResponsiveNavLink href="/profile">
                            <template #icon>
                                <User class="dark:text-white" />
                            </template>
                            <template #text>
                                <span>Profile</span>
                            </template>
                        </ResponsiveNavLink>
                        <Separator class="my-2" />
                        <ResponsiveNavLink href="#">
                            <template #icon>
                                <Plus class="dark:text-white" />
                            </template>
                            <template #text>
                                <span>Create</span>
                            </template>
                        </ResponsiveNavLink>
                        <ResponsiveNavLink href="#">
                            <template #icon>
                                <PanelsTopLeft class="dark:text-white" />
                            </template>
                            <template #text>
                                <span>Explore</span>
                            </template>
                        </ResponsiveNavLink>
                         <Separator class="my-2" />
                        <Link href="/logout" method="post" class="flex items-center gap-2 p-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-accent w-full cursor-pointer">
                            <DoorOpen class="dark:text-white" />
                            <span>Logout</span>
                        </Link>
                    </template>
                    <template v-else>
                        <ResponsiveNavLink href="#">
                            <template #icon>
                                <PanelsTopLeft class="dark:text-white" />
                            </template>
                            <template #text>
                                <span>Explore</span>
                            </template>
                        </ResponsiveNavLink>
                        <Separator class="my-2" />
                        <ResponsiveNavLink href="/login">
                            <template #icon>
                                <LogIn class="dark:text-white" />
                            </template>
                            <template #text>
                                <span>Login</span>
                            </template>
                        </ResponsiveNavLink>
                        <ResponsiveNavLink href="/register">
                            <template #icon>
                                <UserPlus class="dark:text-white" />
                            </template>
                            <template #text>
                                <span>Register</span>
                            </template>
                        </ResponsiveNavLink>
                    </template>
                </SheetDescription>
            </SheetHeader>
            </SheetContent>
        </Sheet>
   </nav>
</template>
