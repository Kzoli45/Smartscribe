<script setup lang="ts">
    import { SidebarProvider, SidebarTrigger, SidebarInset } from "@/components/ui/sidebar";
    import {
      Breadcrumb,
      BreadcrumbItem,
      BreadcrumbList,
    } from "@/components/ui/breadcrumb";
    import Sidebar from "@/components/SidebarRoot.vue";
    import { usePage } from "@inertiajs/vue3";

    const page = usePage();
</script>

<template>
  <SidebarProvider>
    <Sidebar collapsible="icon" />
    <SidebarInset>
      <header class="flex h-16 shrink-0 items-center gap-2 transition-[width,height] ease-linear group-has-[[data-collapsible=icon]]/sidebar-wrapper:h-12">
        <div class="flex items-center gap-2 px-4">
          <SidebarTrigger class="-ml-1 size-8" />
          <Separator orientation="vertical" class="mr-2 h-4" />
          <Breadcrumb>
            <BreadcrumbList>
              <BreadcrumbItem class="hidden md:block">
                <h1 class="text-lg font-semibold">{{ page.component }}</h1>
              </BreadcrumbItem>
            </BreadcrumbList>
          </Breadcrumb>
        </div>
      </header>
      <div class="flex flex-1 flex-col gap-4 p-4 pt-0">
        <slot />
      </div>
    </SidebarInset>
  </SidebarProvider>
</template>