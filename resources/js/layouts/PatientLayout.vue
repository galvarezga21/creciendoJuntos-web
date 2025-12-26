<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { 
    DropdownMenu, 
    DropdownMenuContent, 
    DropdownMenuItem, 
    DropdownMenuLabel, 
    DropdownMenuSeparator, 
    DropdownMenuTrigger 
} from '@/components/ui/dropdown-menu';
import { Calendar, Home, MessageCircle, Clock, User, LogOut } from 'lucide-vue-next';
import { computed } from 'vue';

const page = usePage();
const user = computed(() => page.props.auth.user);
const fullName = computed(() => user.value ? `${user.value.first_name} ${user.value.last_name}` : 'Usuario');
const avatarSrc = computed(() => user.value?.profile_photo_url || user.value?.avatar || '');

const navLinks = [
    { name: 'Inicio', href: '/portal/dashboard', icon: Home },
    { name: 'Mis Citas', href: '/portal/appointments', icon: Clock },
    { name: 'Calendario', href: '/portal/calendar', icon: Calendar },
    { name: 'Ayuda', href: '/portal/chat', icon: MessageCircle },
];
</script>

<template>
    <div class="min-h-screen bg-slate-50 font-sans text-slate-900">
        <!-- Top Navigation -->
        <header class="sticky top-0 z-30 w-full border-b bg-white/80 backdrop-blur-md shadow-sm">
            <div class="container mx-auto px-4 h-16 flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center gap-2">
                    <div class="h-8 w-8 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                        <img src="/logo-creciendo-juntos.png" alt="Logo" class="h-full w-full object-cover rounded-full" />
                    </div>
                    <span class="font-bold text-lg text-slate-800 hidden sm:inline-block">Creciendo Juntos</span>
                </div>

                <!-- Desktop Nav -->
                <nav class="hidden md:flex items-center gap-1">
                    <Link 
                        v-for="link in navLinks" 
                        :key="link.href" 
                        :href="link.href"
                        class="flex items-center gap-2 px-4 py-2 rounded-full text-sm font-medium transition-colors hover:bg-slate-100 text-slate-600 hover:text-primary"
                        :class="{ 'bg-primary/10 text-primary': $page.url.startsWith(link.href) }"
                    >
                        <component :is="link.icon" class="h-4 w-4" />
                        {{ link.name }}
                    </Link>
                </nav>

                <!-- User Menu -->
                <div class="flex items-center gap-4">
                    <DropdownMenu>
                        <DropdownMenuTrigger as-child>
                            <Button variant="ghost" class="relative h-10 w-10 rounded-full">
                                <Avatar class="h-9 w-9 border border-slate-200">
                                    <AvatarImage :src="avatarSrc" :alt="fullName" />
                                    <AvatarFallback>{{ fullName.charAt(0).toUpperCase() }}</AvatarFallback>
                                </Avatar>
                            </Button>
                        </DropdownMenuTrigger>
                        <DropdownMenuContent class="w-56" align="end">
                            <DropdownMenuLabel>Mi Cuenta</DropdownMenuLabel>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem>
                                <User class="mr-2 h-4 w-4" />
                                <span>Perfil</span>
                            </DropdownMenuItem>
                            <DropdownMenuItem>
                                <LogOut class="mr-2 h-4 w-4" />
                                <span>Cerrar Sesión</span>
                            </DropdownMenuItem>
                        </DropdownMenuContent>
                    </DropdownMenu>
                </div>
            </div>
            
            <!-- Mobile Nav (Simple Horizontal Scroll) -->
            <div class="md:hidden border-t bg-white overflow-x-auto">
                <nav class="flex p-2 gap-2 min-w-max">
                     <Link 
                        v-for="link in navLinks" 
                        :key="link.href" 
                        :href="link.href"
                        class="flex flex-col items-center justify-center gap-1 px-4 py-2 rounded-xl text-xs font-medium transition-colors hover:bg-slate-100 text-slate-600 min-w-[70px]"
                        :class="{ 'bg-primary/5 text-primary': $page.url.startsWith(link.href) }"
                    >
                        <component :is="link.icon" class="h-5 w-5" />
                        {{ link.name }}
                    </Link>
                </nav>
            </div>
        </header>

        <!-- Main Content -->
        <main class="container mx-auto px-4 py-8 max-w-6xl animate-in fade-in duration-500">
            <slot />
        </main>
        
        <footer class="border-t py-8 bg-white mt-auto">
             <div class="container mx-auto px-4 text-center text-sm text-slate-500">
                 &copy; {{ new Date().getFullYear() }} Creciendo Juntos. Portal del Paciente.
             </div>
        </footer>
    </div>
</template>
