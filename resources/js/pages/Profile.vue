<script setup lang="ts">

    import Sidebar from '@/components/Sidebar.vue';
    import { Avatar, AvatarImage, AvatarFallback } from '@/components/ui/avatar';
    import { Badge } from '@/components/ui/badge';
    import {
        Card,
        CardContent,
        CardHeader,
        CardTitle,
    } from '@/components/ui/card'
    import {
        Tabs,
        TabsContent,
        TabsList,
        TabsTrigger,
    } from '@/components/ui/tabs'

    const props = defineProps<{
        user: {
            name: string;
            avatar: string;
        };
        forms: Array<{
            id: number;
            title: string;
            description: string;
            tags: string;
            submission_count: number;
            field_count: number;
            created_at: string;
        }>;
        formSubmissions: Array<{
            id: number;
            form_id: number;
            user_id: number;
            content: string;
            created_at: string;
        }>;
    }>();

    const addSubmissionsTogether = () => {
        let sum = 0;
        props.forms.forEach(form => {
            sum += form.submission_count;
        });
        return sum;
    }

</script>

<template>
    <Sidebar>
        <div class="min-h-[100vh] flex-1 rounded-xl bg-muted/50 md:min-h-min p-4">
            <div class="flex flex-col gap-8">
                <div class="flex gap-4">
                    <Avatar class="h-12 w-12">
                        <AvatarImage :src="user.avatar" />
                        <AvatarFallback>{{ user.name.charAt(0).toUpperCase() }}</AvatarFallback>
                    </Avatar>
                    <div class="flex flex-col justify-center">
                        <h1 class="text-xl font-bold">{{ user.name }}</h1>
                        <p class="text-sm text-muted-foreground">Welcome back!</p>
                    </div>
                </div>
                <Tabs default-value="Your Works">
                    <TabsList class="grid w-full grid-cols-2">
                    <TabsTrigger value="Your Works">
                        Your Works
                    </TabsTrigger>
                    <TabsTrigger value="Your Activity">
                        Your Activity
                    </TabsTrigger>
                    </TabsList>
                    <TabsContent value="Your Works">
                    <Card class="bg-transparent">
                        <CardHeader>
                        <CardTitle class="mb-8">See how your works have been performing</CardTitle>
                        </CardHeader>
                        <CardContent class="space-y-4">
                            <div class="flex flex-wrap gap-8 items-center justify-center">
                                <div class="flex flex-col gap-2 justify-center items-center border border-emerald-700 rounded-full w-[200px] h-[200px]">
                                    <div class="text-2xl font-bold text-emerald-700">{{ forms.length }}</div>
                                    <p class="text-sm text-muted-foreground">Forms Created</p>
                                </div>
                                <div class="flex flex-col gap-2 justify-center items-center border border-emerald-700 rounded-full w-[200px] h-[200px]">
                                    <div class="text-2xl font-bold text-emerald-700">{{ addSubmissionsTogether() }}</div>
                                    <p class="text-sm text-muted-foreground">Submissions Received</p>
                                </div>
                            </div>
                            <H2 class="font-bold mt-8">Your Forms</H2>
                            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                <template v-for="form in forms" :key="form.id">
                                    <div class="flex flex-col gap-2 bg-accent p-4 rounded-lg">
                                        <h2>{{ form.title }}</h2>
                                        <p class="text-sm text-muted-foreground">{{ form.description }}</p>
                                        <div class="flex flex-wrap gap-2 mt-2">
                                            <div class="flex gap-2 mt-2 justify-between">
                                                <span class="text-xs bg-muted px-2 py-1 rounded-full">Submissions: {{ form.submission_count }}</span>
                                                <Badge v-if="form.submission_count > 0" class="cursor-pointer">View Submissions</Badge>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </CardContent>
                    </Card>
                    </TabsContent>
                    <TabsContent value="Your Activity">
                    <Card class="bg-transparent">
                        <CardHeader>
                        <CardTitle>Your Activity</CardTitle>
                        </CardHeader>
                        <CardContent class="space-y-2">
                            <div class="flex flex-wrap gap-8 items-center justify-center">
                                <div class="flex flex-col gap-2 justify-center items-center border border-emerald-700 rounded-full w-[200px] h-[200px]">
                                    <div class="text-2xl font-bold text-emerald-700">{{ formSubmissions.length }}</div>
                                    <p class="text-sm text-muted-foreground">Forms Taken</p>
                                </div>
                            </div>
                        </CardContent>
                    </Card>
                    </TabsContent>
                </Tabs>
            </div>
        </div>
    </Sidebar>
</template>
