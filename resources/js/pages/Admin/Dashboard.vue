<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/layouts/AdminLayout.vue';
import { Card, CardContent, CardHeader, CardTitle, CardDescription } from '@/components/ui/card';
import { Calendar, Users, TrendingUp, DollarSign } from 'lucide-vue-next';

// Mock Data
const kpis = [
    { title: 'Citas Hoy', value: '8', icon: Calendar, trend: '+2 vs ayer' },
    { title: 'Pacientes Nuevos', value: '12', icon: Users, trend: '+15% este mes' },
    { title: 'Ingresos (Mes)', value: 'S/ 4,200', icon: DollarSign, trend: '+8% vs mes anterior' },
    { title: 'Tasa de Retención', value: '85%', icon: TrendingUp, trend: 'Estable' },
];

const activities = [
    { user: 'Juan Pérez', action: 'agendó una cita', time: 'hace 5 min' },
    { user: 'Maria Garcia', action: 'canceló su cita', time: 'hace 2 horas' },
    { user: 'Admin', action: 'actualizó perfil de usuario', time: 'hace 4 horas' },
];
</script>

<template>
    <Head title="Admin Dashboard - Creciendo Juntos" />
    <AdminLayout>
        <div class="flex flex-col gap-6">
            <h1 class="text-3xl font-bold tracking-tight">Dashboard</h1>

            <!-- KPIs -->
            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                <Card v-for="kpi in kpis" :key="kpi.title">
                    <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                        <CardTitle class="text-sm font-medium">
                            {{ kpi.title }}
                        </CardTitle>
                        <component :is="kpi.icon" class="h-4 w-4 text-muted-foreground" />
                    </CardHeader>
                    <CardContent>
                        <div class="text-2xl font-bold">{{ kpi.value }}</div>
                        <p class="text-xs text-muted-foreground">
                            {{ kpi.trend }}
                        </p>
                    </CardContent>
                </Card>
            </div>

            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-7">
                <!-- Chart Mockup -->
                <Card class="col-span-4">
                    <CardHeader>
                        <CardTitle>Citas Semanales</CardTitle>
                    </CardHeader>
                    <CardContent class="pl-2">
                        <div class="h-[200px] flex items-end justify-between gap-2 px-4">
                            <div v-for="h in [40, 65, 30, 80, 55, 90, 45]" :key="h" 
                                class="bg-primary/80 hover:bg-primary w-full rounded-t-sm transition-all"
                                :style="{ height: `${h}%` }"
                            ></div>
                        </div>
                        <div class="flex justify-between px-4 mt-2 text-xs text-muted-foreground">
                            <span>Lun</span><span>Mar</span><span>Mié</span><span>Jue</span><span>Vie</span><span>Sáb</span><span>Dom</span>
                        </div>
                    </CardContent>
                </Card>

                <!-- Recent Activity -->
                <Card class="col-span-3">
                    <CardHeader>
                        <CardTitle>Actividad Reciente</CardTitle>
                        <CardDescription>Últimas acciones en la plataforma</CardDescription>
                    </CardHeader>
                    <CardContent>
                        <div class="space-y-4">
                            <div v-for="(act, i) in activities" :key="i" class="flex items-center">
                                <span class="relative flex h-2 w-2 mr-4">
                                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                                  <span class="relative inline-flex rounded-full h-2 w-2 bg-sky-500"></span>
                                </span>
                                <div class="ml-4 space-y-1">
                                    <p class="text-sm font-medium leading-none">{{ act.user }}</p>
                                    <p class="text-sm text-muted-foreground">
                                        {{ act.action }}
                                    </p>
                                </div>
                                <div class="ml-auto font-medium text-xs text-muted-foreground">{{ act.time }}</div>
                            </div>
                        </div>
                    </CardContent>
                </Card>
            </div>
        </div>
    </AdminLayout>
</template>
