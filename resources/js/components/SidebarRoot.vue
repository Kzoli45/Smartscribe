<script setup lang="ts">
import { computed } from "vue";
import { usePage, Link } from "@inertiajs/vue3";
import { Sidebar, SidebarContent, SidebarHeader, SidebarFooter, useSidebar, SidebarGroup, SidebarMenu, SidebarMenuItem, SidebarMenuButton } from "@/components/ui/sidebar";
import { Avatar, AvatarFallback, AvatarImage } from "./ui/avatar";
import { DropdownMenu, DropdownMenuTrigger, DropdownMenuContent, DropdownMenuItem } from "./ui/dropdown-menu";
import { House, User, Settings, PanelsTopLeft, Plus, PlusSquare, Bell, ChartNoAxesCombined, ChevronsUpDown } from "lucide-vue-next";
import Separator from "./ui/separator/Separator.vue";
import TextLogo from "./navbar/TextLogo.vue";

const page = usePage();
const user = page.props.auth.user;

const items = [
  { 
    title: "Profile",
    url: '/profile',
    icon: User,
    admin: false,
  },
  { 
    title: "Dashboard",
    url: '/dashboard',
    icon: ChartNoAxesCombined,
    admin: true,
  },
  { 
    title: "Explore",
    url: '/explore',
    icon: PanelsTopLeft,
    admin: false,
  },
  { 
    title: "Create Quiz",
    url: '/create/quiz',
    icon: Plus,
    admin: false,
  },
  { 
    title: "Create Form",
    url: '/create/form',
    icon: PlusSquare,
    admin: false,
  },
  { 
    title: "Notifications",
    url: '/notifications',
    icon: Bell,
    admin: false,
  },
  { 
    title: "Settings",
    url: '/settings',
    icon: Settings,
    admin: false,
  },
]

const filteredItems = computed(() => {
  return items.filter(item => !item.admin || (item.admin && user.is_admin));
});

const { open, openMobile } = useSidebar();
</script>

<template>
  <Sidebar>
    <SidebarHeader>
      <TextLogo class="ml-2 flex items-center" v-if="open || openMobile"/>
      <a href="/" v-else>
        <House class="flex justify-center items-center ml-1"></House>
      </a>
      <Separator />
    </SidebarHeader>
      <SidebarContent>
        <SidebarGroup>
          <SidebarMenu>
            <SidebarMenuItem v-for="item in filteredItems" :key="item.title" :class="{'bg-accent rounded-md':item.title === page.component}">
              <sidebarMenuButton asChild>
                <a :href="item.url">
                  <component :is="item.icon"/>
                  <span v-if="open || openMobile">{{ item.title }}</span>
                </a>
              </sidebarMenuButton>
            </SidebarMenuItem>
          </SidebarMenu>
        </SidebarGroup>
      </SidebarContent>
    <SidebarFooter>
      <Separator />
      <div class="flex items-center gap-4 mb-2">
        <Avatar :class="{ 'ml-2': open || openMobile }">
          <AvatarImage :src="user.avatar" v-if="user.avatar" />
          <AvatarFallback>{{ user.name.charAt(0).toUpperCase() }}</AvatarFallback>
        </Avatar>
        <span v-if="open || openMobile">{{ user.name }}</span>
        <DropdownMenu v-if="open || openMobile">
          <DropdownMenuTrigger class="ml-auto">
            <ChevronsUpDown class="size-6 cursor-pointer" />
          </DropdownMenuTrigger>
          <DropdownMenuContent class="mt-2 mb-4">
            <Link href="/logout" :method="'post'" class="block w-full">
                <DropdownMenuItem class="cursor-pointer w-full">
                    Log out
                </DropdownMenuItem>
            </Link>
          </DropdownMenuContent>
        </DropdownMenu>
      </div>
    </SidebarFooter>
  </Sidebar>
</template>