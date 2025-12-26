<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/layouts/AdminLayout.vue';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Badge } from '@/components/ui/badge';
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { 
    DropdownMenu, 
    DropdownMenuContent, 
    DropdownMenuItem, 
    DropdownMenuLabel, 
    DropdownMenuTrigger 
} from '@/components/ui/dropdown-menu';
import { Search, MoreHorizontal, UserPlus, Filter } from 'lucide-vue-next';

// Mock Data
const users = [
    { id: 1, name: 'Juan Pérez', email: 'juan@example.com', role: 'patient', status: 'active', avatar: '' },
    { id: 2, name: 'Diana Campos', email: 'diana@creciendojuntos.com', role: 'admin', status: 'active', avatar: '/img/psychologist.jpg' },
    { id: 3, name: 'Maria Garcia', email: 'maria@example.com', role: 'patient', status: 'inactive', avatar: '' },
    { id: 4, name: 'Carlos Ruiz', email: 'carlos@example.com', role: 'patient', status: 'active', avatar: '' },
    { id: 5, name: 'Contabilidad', email: 'conta@creciendojuntos.com', role: 'accountant', status: 'active', avatar: '' },
];

const roleMap: Record<string, string> = {
    patient: 'Paciente',
    admin: 'Administrador',
    accountant: 'Contador',
    psychologist: 'Psicólogo'
};
</script>

<template>
    <Head title="Usuarios - Admin" />
    <AdminLayout>
        <div class="flex flex-col gap-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <h1 class="text-3xl font-bold tracking-tight">Gestión de Usuarios</h1>
                <Button>
                    <UserPlus class="mr-2 h-4 w-4" />
                    Crear Usuario
                </Button>
            </div>

            <Card>
                <CardHeader class="pb-3">
                    <div class="flex items-center justify-between gap-4">
                        <div class="relative flex-1 max-w-sm">
                            <Search class="absolute left-2.5 top-2.5 h-4 w-4 text-muted-foreground" />
                            <Input placeholder="Buscar por nombre o email..." class="pl-9" />
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
                                            <AvatarImage :src="user.avatar" />
                                            <AvatarFallback>{{ user.name.substring(0,2).toUpperCase() }}</AvatarFallback>
                                        </Avatar>
                                    </td>
                                    <td class="p-4 font-medium">{{ user.name }}</td>
                                    <td class="p-4 text-muted-foreground">{{ user.email }}</td>
                                    <td class="p-4">
                                        <Badge variant="secondary" class="capitalize">
                                            {{ roleMap[user.role] || user.role }}
                                        </Badge>
                                    </td>
                                    <td class="p-4">
                                        <div class="flex items-center gap-2">
                                            <span class="h-2 w-2 rounded-full" :class="user.status === 'active' ? 'bg-green-500' : 'bg-slate-300'"></span>
                                            <span class="capitalize">{{ user.status === 'active' ? 'Activo' : 'Inactivo' }}</span>
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
                                                <DropdownMenuLabel>Acciones</DropdownMenuLabel>
                                                <DropdownMenuItem>Editar Usuario</DropdownMenuItem>
                                                <DropdownMenuItem>Ver Detalles</DropdownMenuItem>
                                                <DropdownMenuItem class="text-red-600">Desactivar</DropdownMenuItem>
                                            </DropdownMenuContent>
                                        </DropdownMenu>
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
