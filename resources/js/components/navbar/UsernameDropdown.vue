<script setup lang="ts">
    import { usePage } from '@inertiajs/vue3';
    import { Link } from '@inertiajs/vue3';
    import {
        DropdownMenu,
        DropdownMenuContent,
        DropdownMenuSeparator,
        DropdownMenuItem,
        DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu'
    import { ChevronDown } from 'lucide-vue-next';

    const page = usePage();
    const user = page.props.auth.user;
</script>

<template>
    <DropdownMenu>
        <DropdownMenuTrigger>
            <ChevronDown class="w-4 h-4 cursor-pointer" />
        </DropdownMenuTrigger>
        <DropdownMenuContent v-if="user" class="mt-2">
            <DropdownMenuItem>
                <Link :href="`/profile`" class="w-full">
                    Profile
                </Link>
            </DropdownMenuItem>
            <DropdownMenuSeparator />
            <Link href="/logout" :method="'post'" class="block w-full">
                <DropdownMenuItem class="cursor-pointer w-full">
                    Log out
                </DropdownMenuItem>
            </Link>
        </DropdownMenuContent>
        <DropdownMenuContent v-else class="mt-2">
            <DropdownMenuItem>
                <Link href="/login" class="w-full">Login</Link>
            </DropdownMenuItem>
            <DropdownMenuSeparator />
            <DropdownMenuItem>
                <Link href="/register" class="w-full">Register</Link>
            </DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>


