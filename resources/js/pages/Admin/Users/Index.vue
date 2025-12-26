<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import { route } from 'ziggy-js';
import AdminLayout from '@/layouts/AdminLayout.vue';
import { Card, CardContent, CardHeader } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Badge } from '@/components/ui/badge';
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { 
    DropdownMenu, 
    DropdownMenuContent, 
    DropdownMenuItem, 
    DropdownMenuTrigger 
} from '@/components/ui/dropdown-menu';
import { Search, MoreHorizontal, UserPlus, Filter, Pencil, Trash } from 'lucide-vue-next';
import { ref, watch } from 'vue';
import { useDebounceFn } from '@vueuse/core';

const props = defineProps<{
    users: Array<{
        id: number;
        first_name: string;
        last_name: string;
        email: string;
        profile_photo_path: string | null;
        profile_photo_url?: string;
        role: { name: string; slug: string } | null;
        is_active: boolean;
    }>;
    filters?: {
        search?: string;
    };
}>();

const search = ref(props.filters?.search || '');

const handleSearch = useDebounceFn((value: string) => {
    router.get(route('admin.users.index'), { search: value }, {
        preserveState: true,
        preserveScroll: true,
        replace: true,
    });
}, 300);

watch(search, (value) => {
    handleSearch(value);
});

const deleteUser = (id: number) => {
    if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
        router.delete(route('admin.users.destroy', id));
    }
};

const getInitials = (firstName: string, lastName: string) => {
    return `${firstName?.charAt(0) || ''}${lastName?.charAt(0) || ''}`.toUpperCase();
};
</script>

<template>
    <Head title="Usuarios - Admin" />
    <AdminLayout>
        <div class="flex flex-col gap-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <h1 class="text-3xl font-bold tracking-tight">Gestión de Usuarios</h1>
                <Link :href="route('admin.users.create')">
                    <Button>
                        <UserPlus class="mr-2 h-4 w-4" />
                        Crear Usuario
                    </Button>
                </Link>
            </div>

            <Card>
                <CardHeader class="pb-3">
                    <div class="flex items-center justify-between gap-4">
                        <div class="relative flex-1 max-w-sm">
                            <Search class="absolute left-2.5 top-2.5 h-4 w-4 text-muted-foreground" />
                            <Input v-model="search" placeholder="Buscar por nombre o email..." class="pl-9" />
                        </div>
                        <Button variant="outline" size="icon">
                            <Filter class="h-4 w-4" />
                        </Button>
                    </div>
                </CardHeader>
                <CardContent>
                    <div class="rounded-md border">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-muted/50 text-muted-foreground font-medium">
                                <tr>
                                    <th class="p-4 w-[50px]">Avatar</th>
                                    <th class="p-4">Nombre</th>
                                    <th class="p-4">Email</th>
                                    <th class="p-4">Rol</th>
                                    <th class="p-4">Estado</th>
                                    <th class="p-4 text-right">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users" :key="user.id" class="border-t hover:bg-muted/50 transition-colors">
                                    <td class="p-4">
                                        <Avatar class="h-8 w-8">
                                            <AvatarImage :src="user.profile_photo_url || ''" :alt="user.first_name" />
                                            <AvatarFallback>{{ getInitials(user.first_name, user.last_name) }}</AvatarFallback>
                                        </Avatar>
                                    </td>
                                    <td class="p-4 font-medium">{{ user.first_name }} {{ user.last_name }}</td>
                                    <td class="p-4 text-muted-foreground">{{ user.email }}</td>
                                    <td class="p-4">
                                        <Badge variant="secondary" class="capitalize">
                                            {{ user.role?.name || 'Sin Rol' }}
                                        </Badge>
                                    </td>
                                    <td class="p-4">
                                        <div class="flex items-center gap-2">
                                            <span class="h-2 w-2 rounded-full" :class="user.is_active ? 'bg-green-500' : 'bg-slate-300'"></span>
                                            <span class="capitalize">{{ user.is_active ? 'Activo' : 'Inactivo' }}</span>
                                        </div>
                                    </td>
                                    <td class="p-4 text-right">
                                        <DropdownMenu>
                                            <DropdownMenuTrigger as-child>
                                                <Button variant="ghost" class="h-8 w-8 p-0">
                                                    <span class="sr-only">Open menu</span>
                                                    <MoreHorizontal class="h-4 w-4" />
                                                </Button>
                                            </DropdownMenuTrigger>
                                            <DropdownMenuContent align="end">
                                                <Link :href="route('admin.users.edit', user.id)">
                                                    <DropdownMenuItem>
                                                        <Pencil class="mr-2 h-4 w-4" />
                                                        Editar
                                                    </DropdownMenuItem>
                                                </Link>
                                                <DropdownMenuItem @click="deleteUser(user.id)" class="text-red-600 focus:text-red-600">
                                                    <Trash class="mr-2 h-4 w-4" />
                                                    Eliminar
                                                </DropdownMenuItem>
                                            </DropdownMenuContent>
                                        </DropdownMenu>
                                    </td>
                                </tr>
                                <tr v-if="users.length === 0">
                                    <td colspan="6" class="p-8 text-center text-muted-foreground">
                                        No hay usuarios registrados.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </CardContent>
            </Card>
        </div>
    </AdminLayout>
</template>
