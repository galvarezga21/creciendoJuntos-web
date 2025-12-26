<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
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
    DropdownMenu, 
    DropdownMenuContent, 
    DropdownMenuItem, 
    DropdownMenuLabel, 
    DropdownMenuSeparator, 
    DropdownMenuTrigger 
} from '@/components/ui/dropdown-menu';
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { 
    LayoutDashboard, 
    CalendarCheck, 
    Users, 
    UserCog, 
    ShieldCheck, 
    LogOut, 
    ChevronUp,
    User
} from 'lucide-vue-next';

const adminLinks = [
    { name: 'Resumen', href: '/admin/dashboard', icon: LayoutDashboard },
    { name: 'Citas', href: '/admin/appointments/pending', icon: CalendarCheck },
    { name: 'Pacientes', href: '/admin/users?role=patient', icon: Users },
    { name: 'Usuarios', href: '/admin/users', icon: UserCog },
    { name: 'Roles y Permisos', href: '/admin/roles', icon: ShieldCheck },
];
</script>

<template>
    <SidebarProvider>
        <Sidebar collapsible="icon">
            <SidebarHeader>
                <div class="flex items-center gap-2 px-2 py-1">
                    <div class="h-8 w-8 rounded-lg bg-primary flex items-center justify-center text-primary-foreground font-bold shrink-0">
                        CJ
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
                <SidebarMenu>
                    <SidebarMenuItem>
                        <DropdownMenu>
                            <DropdownMenuTrigger as-child>
                                <SidebarMenuButton
                                    size="lg"
                                    class="data-[state=open]:bg-sidebar-accent data-[state=open]:text-sidebar-accent-foreground"
                                >
                                    <Avatar class="h-8 w-8 rounded-lg">
                                        <AvatarImage src="https://github.com/shadcn.png" alt="Admin" />
                                        <AvatarFallback class="rounded-lg">AD</AvatarFallback>
                                    </Avatar>
                                    <div class="grid flex-1 text-left text-sm leading-tight group-data-[collapsible=icon]:hidden">
                                        <span class="truncate font-semibold">Admin User</span>
                                        <span class="truncate text-xs text-muted-foreground">admin@creciendojuntos.com</span>
                                    </div>
                                    <ChevronUp class="ml-auto size-4 group-data-[collapsible=icon]:hidden" />
                                </SidebarMenuButton>
                            </DropdownMenuTrigger>
                            <DropdownMenuContent class="w-[--radix-dropdown-menu-trigger-width] min-w-56 rounded-lg" side="bottom" align="end" :side-offset="4">
                                <DropdownMenuLabel class="p-0 font-normal">
                                    <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                        <Avatar class="h-8 w-8 rounded-lg">
                                            <AvatarImage src="https://github.com/shadcn.png" alt="Admin" />
                                            <AvatarFallback class="rounded-lg">AD</AvatarFallback>
                                        </Avatar>
                                        <div class="grid flex-1 text-left text-sm leading-tight">
                                            <span class="truncate font-semibold">Admin User</span>
                                            <span class="truncate text-xs text-muted-foreground">admin@creciendojuntos.com</span>
                                        </div>
                                    </div>
                                </DropdownMenuLabel>
                                <DropdownMenuSeparator />
                                <DropdownMenuItem>
                                    <User class="mr-2 h-4 w-4" />
                                    Perfil
                                </DropdownMenuItem>
                                <DropdownMenuItem>
                                    <LogOut class="mr-2 h-4 w-4" />
                                    Cerrar Sesión
                                </DropdownMenuItem>
                            </DropdownMenuContent>
                        </DropdownMenu>
                    </SidebarMenuItem>
                </SidebarMenu>
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
