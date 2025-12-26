<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import NavUser from '@/components/NavUser.vue';
import { computed } from 'vue';
import { 
    SidebarProvider, 
    Sidebar, 
    SidebarHeader, 
    SidebarContent, 
    SidebarFooter, 
    SidebarGroup, 
    SidebarGroupLabel, 
    SidebarMenu, 
    SidebarMenuItem, 
    SidebarMenuButton, 
    SidebarInset,
    SidebarTrigger,
    SidebarRail
} from '@/components/ui/sidebar';
import { 
    LayoutDashboard, 
    CalendarCheck, 
    Users, 
    UserCog, 
    ShieldCheck
} from 'lucide-vue-next';

const adminLinks = [
    { name: 'Resumen', href: '/admin/dashboard', icon: LayoutDashboard },
    { name: 'Citas', href: '/admin/appointments/pending', icon: CalendarCheck },
    { name: 'Pacientes', href: '/admin/users?role=patient', icon: Users },
    { name: 'Usuarios', href: '/admin/users', icon: UserCog },
    { name: 'Roles y Permisos', href: '/admin/roles', icon: ShieldCheck },
];

const page = usePage();
const user = computed(() => page.props.auth.user);
const avatarSrc = computed(() => user.value?.profile_photo_url || user.value?.avatar);
const fullName = computed(() => user.value ? `${user.value.first_name} ${user.value.last_name}` : '');
</script>

<template>
    <SidebarProvider>
        <Sidebar collapsible="icon">
            <SidebarHeader>
                <div class="flex items-center gap-2 px-2 py-1">
                    <div class="h-8 w-8 rounded-lg bg-primary flex items-center justify-center text-primary-foreground font-bold shrink-0 overflow-hidden">
                        <img v-if="avatarSrc" :src="avatarSrc" :alt="fullName" class="h-full w-full object-cover" />
                        <span v-else>CJ</span>
                    </div>
                    <div class="grid flex-1 text-left text-sm leading-tight group-data-[collapsible=icon]:hidden">
                        <span class="truncate font-semibold">Admin Panel</span>
                        <span class="truncate text-xs text-muted-foreground">Creciendo Juntos</span>
                    </div>
                </div>
            </SidebarHeader>
            
            <SidebarContent>
                <SidebarGroup>
                    <SidebarGroupLabel>Gestión</SidebarGroupLabel>
                    <SidebarMenu>
                        <SidebarMenuItem v-for="link in adminLinks" :key="link.href">
                            <SidebarMenuButton :isActive="$page.url.startsWith(link.href)" :tooltip="link.name" as-child>
                                <Link :href="link.href">
                                    <component :is="link.icon" />
                                    <span>{{ link.name }}</span>
                                </Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>
                    </SidebarMenu>
                </SidebarGroup>
            </SidebarContent>

            <SidebarFooter>
                <NavUser />
            </SidebarFooter>
            <SidebarRail />
        </Sidebar>

        <SidebarInset>
            <header class="flex h-16 shrink-0 items-center gap-2 border-b bg-background px-4">
                <SidebarTrigger class="-ml-1" />
                <div class="mr-4 hidden md:flex">
                    <h1 class="text-lg font-semibold md:text-xl">Panel Administrativo</h1>
                </div>
            </header>
            <div class="flex flex-1 flex-col gap-4 p-4 pt-0">
                <main class="flex-1 py-4 animate-in fade-in duration-500">
                    <slot />
                </main>
            </div>
        </SidebarInset>
    </SidebarProvider>
</template>
