<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/layouts/AdminLayout.vue';
import { Card, CardContent, CardHeader, CardTitle, CardDescription } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';
import { Check, X, Clock } from 'lucide-vue-next';

// Mock Data
const pendingAppointments = [
    { id: 1, patient: 'Ana López', date: '2023-10-25', time: '10:00 AM', type: 'Terapia Individual', status: 'pending' },
    { id: 2, patient: 'Carlos Ruiz', date: '2023-10-25', time: '11:00 AM', type: 'Consulta Inicial', status: 'pending' },
    { id: 3, patient: 'Elena Diaz', date: '2023-10-26', time: '04:00 PM', type: 'Terapia de Pareja', status: 'pending' },
];
</script>

<template>
    <Head title="Citas Pendientes - Admin" />
    <AdminLayout>
        <div class="flex flex-col gap-6">
            <div>
                <h1 class="text-3xl font-bold tracking-tight">Citas Pendientes</h1>
                <p class="text-muted-foreground">Revisa y aprueba las solicitudes de citas.</p>
            </div>

            <Card>
                <CardHeader>
                    <CardTitle>Solicitudes Recientes</CardTitle>
                    <CardDescription>Tienes {{ pendingAppointments.length }} solicitudes esperando aprobación.</CardDescription>
                </CardHeader>
                <CardContent>
                    <div class="rounded-md border">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-muted/50 text-muted-foreground font-medium">
                                <tr>
                                    <th class="p-4">Paciente</th>
                                    <th class="p-4">Fecha y Hora</th>
                                    <th class="p-4">Tipo</th>
                                    <th class="p-4">Estado</th>
                                    <th class="p-4 text-right">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="apt in pendingAppointments" :key="apt.id" class="border-t hover:bg-muted/50 transition-colors">
                                    <td class="p-4 font-medium">{{ apt.patient }}</td>
                                    <td class="p-4">
                                        <div class="flex flex-col">
                                            <span>{{ apt.date }}</span>
                                            <span class="text-xs text-muted-foreground">{{ apt.time }}</span>
                                        </div>
                                    </td>
                                    <td class="p-4">{{ apt.type }}</td>
                                    <td class="p-4">
                                        <Badge variant="outline" class="bg-yellow-100 text-yellow-800 border-yellow-200">Pendiente</Badge>
                                    </td>
                                    <td class="p-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            <Button size="sm" class="bg-green-600 hover:bg-green-700 h-8 w-8 p-0">
                                                <Check class="h-4 w-4" />
                                            </Button>
                                            <Button size="sm" variant="destructive" class="h-8 w-8 p-0">
                                                <X class="h-4 w-4" />
                                            </Button>
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
