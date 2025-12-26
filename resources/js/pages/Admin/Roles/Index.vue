<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/layouts/AdminLayout.vue';
import { Card, CardContent, CardHeader, CardTitle, CardDescription } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Shield, Save } from 'lucide-vue-next';

const roles = ['Admin', 'Psicólogo', 'Paciente', 'Contador'];
const permissions = [
    { id: 'users.view', label: 'Ver Usuarios' },
    { id: 'users.create', label: 'Crear Usuarios' },
    { id: 'users.edit', label: 'Editar Usuarios' },
    { id: 'users.delete', label: 'Eliminar Usuarios' },
    { id: 'appointments.view', label: 'Ver Citas' },
    { id: 'appointments.manage', label: 'Gestionar Citas' },
    { id: 'medical_records.view', label: 'Ver Historial Médico' },
    { id: 'medical_records.edit', label: 'Editar Historial Médico' },
    { id: 'payments.view', label: 'Ver Pagos' },
];

// Mock matrix (true/false)
const matrix = {
    Admin: permissions.map(() => true),
    Psicólogo: permissions.map(p => ['appointments.view', 'appointments.manage', 'medical_records.view', 'medical_records.edit', 'users.view'].includes(p.id)),
    Paciente: permissions.map(p => ['appointments.view', 'medical_records.view'].includes(p.id)),
    Contador: permissions.map(p => ['payments.view', 'users.view'].includes(p.id)),
};
</script>

<template>
    <Head title="Roles y Permisos - Admin" />
    <AdminLayout>
        <div class="flex flex-col gap-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold tracking-tight">Roles y Permisos</h1>
                    <p class="text-muted-foreground">Define qué puede hacer cada rol en el sistema.</p>
                </div>
                <Button>
                    <Save class="mr-2 h-4 w-4" />
                    Guardar Cambios
                </Button>
            </div>

            <Card>
                <CardHeader>
                    <CardTitle class="flex items-center gap-2">
                        <Shield class="h-5 w-5 text-primary" />
                        Matriz de Permisos
                    </CardTitle>
                    <CardDescription>Marca las casillas para asignar permisos a cada rol.</CardDescription>
                </CardHeader>
                <CardContent>
                    <div class="rounded-md border overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-muted/50 text-muted-foreground font-medium">
                                <tr>
                                    <th class="p-4 min-w-[200px]">Permiso</th>
                                    <th v-for="role in roles" :key="role" class="p-4 text-center min-w-[100px]">{{ role }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(perm, index) in permissions" :key="perm.id" class="border-t hover:bg-muted/50 transition-colors">
                                    <td class="p-4 font-medium">{{ perm.label }}</td>
                                    <td v-for="role in roles" :key="role" class="p-4 text-center">
                                        <div class="flex justify-center">
                                            <Checkbox :checked="matrix[role as keyof typeof matrix][index]" />
                                        </div>
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
