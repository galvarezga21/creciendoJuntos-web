<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import PatientLayout from '@/layouts/PatientLayout.vue';
import { Card, CardContent, CardHeader, CardTitle, CardDescription } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';
import { Calendar as CalendarIcon, Clock, MapPin, Video, Plus } from 'lucide-vue-next';

defineProps<{
    appointments?: Array<{
        id: number;
        date: string;
        time: string;
        type: string;
        status: 'scheduled' | 'completed' | 'cancelled';
        mode: 'virtual' | 'presencial';
    }>;
}>();

const statusMap = {
    scheduled: { label: 'Programada', class: 'bg-blue-100 text-blue-800 hover:bg-blue-100' },
    completed: { label: 'Completada', class: 'bg-green-100 text-green-800 hover:bg-green-100' },
    cancelled: { label: 'Cancelada', class: 'bg-red-100 text-red-800 hover:bg-red-100' },
};
</script>

<template>
    <Head title="Mis Citas - Creciendo Juntos" />
    <PatientLayout>
        <div class="flex flex-col space-y-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold tracking-tight text-slate-900">Mis Citas</h1>
                    <p class="text-slate-500">Gestiona tus sesiones y revisa tu historial.</p>
                </div>
                <Button class="shadow-md">
                    <Plus class="mr-2 h-4 w-4" />
                    Nueva Cita
                </Button>
            </div>

            <div class="grid gap-4">
                <Card v-for="apt in appointments" :key="apt.id" class="transition-all hover:shadow-md">
                    <CardContent class="p-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                        <div class="flex gap-4 items-start">
                            <div class="bg-primary/10 p-3 rounded-xl flex flex-col items-center justify-center min-w-[80px]">
                                <span class="text-xl font-bold text-primary">{{ apt.date.split(' ')[0] }}</span>
                                <span class="text-xs font-semibold uppercase text-primary/70">{{ apt.date.split(' ')[1] }}</span>
                            </div>
                            <div class="space-y-1">
                                <h3 class="font-semibold text-lg">{{ apt.type }}</h3>
                                <div class="flex flex-wrap gap-3 text-sm text-slate-500">
                                    <div class="flex items-center gap-1">
                                        <Clock class="h-4 w-4" />
                                        {{ apt.time }}
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <component :is="apt.mode === 'virtual' ? Video : MapPin" class="h-4 w-4" />
                                        {{ apt.mode === 'virtual' ? 'Videollamada' : 'Consultorio 405' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4 w-full md:w-auto justify-between md:justify-end">
                            <Badge :class="statusMap[apt.status].class" variant="secondary">
                                {{ statusMap[apt.status].label }}
                            </Badge>
                            
                            <Button v-if="apt.status === 'scheduled'" variant="outline" size="sm">
                                Reprogramar
                            </Button>
                            <Button v-if="apt.status === 'completed'" variant="ghost" size="sm">
                                Ver Notas
                            </Button>
                        </div>
                    </CardContent>
                </Card>
                
                <div v-if="!appointments?.length" class="text-center py-12 bg-white rounded-lg border border-dashed">
                    <p class="text-muted-foreground">No tienes citas registradas aún.</p>
                </div>
            </div>
        </div>
    </PatientLayout>
</template>
