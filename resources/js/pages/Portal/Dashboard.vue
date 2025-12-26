<script setup lang="ts">
import { Head, Link, usePage } from '@inertiajs/vue3';
import PatientLayout from '@/layouts/PatientLayout.vue';
import { Card, CardContent, CardDescription, CardHeader, CardTitle, CardFooter } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Calendar, Video, Clock, ArrowRight, PlusCircle, History } from 'lucide-vue-next';
import { computed } from 'vue';

defineProps<{
    nextAppointment?: {
        date: string;
        time: string;
        link: string;
        type: string;
    };
}>();

const page = usePage();
const user = computed(() => page.props.auth.user);
const fullName = computed(() => user.value ? `${user.value.first_name} ${user.value.last_name}` : 'Paciente');
</script>

<template>
    <Head title="Mi Portal - Creciendo Juntos" />
    <PatientLayout>
        <div class="space-y-8">
            <!-- Welcome Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h1 class="text-3xl font-bold tracking-tight text-slate-900">Hola, {{ fullName }}</h1>
                    <p class="text-slate-500">Bienvenido a tu espacio de bienestar.</p>
                </div>
                <Link href="/portal/appointments/new">
                    <Button class="shadow-lg shadow-primary/20">
                        <PlusCircle class="mr-2 h-4 w-4" />
                        Agendar Nueva Cita
                    </Button>
                </Link>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Next Appointment Card (Main) -->
                <Card class="md:col-span-2 border-primary/20 bg-gradient-to-br from-white to-slate-50 shadow-md">
                    <CardHeader>
                        <CardTitle class="flex items-center gap-2 text-primary">
                            <Calendar class="h-5 w-5" />
                            Tu Próxima Sesión
                        </CardTitle>
                        <CardDescription>Detalles de tu cita programada</CardDescription>
                    </CardHeader>
                    <CardContent class="space-y-4">
                        <div v-if="nextAppointment" class="flex flex-col md:flex-row gap-6 items-center">
                            <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm flex flex-col items-center min-w-[120px]">
                                <span class="text-4xl font-bold text-slate-800">{{ nextAppointment.date.split(' ')[0] }}</span>
                                <span class="text-sm font-medium text-slate-500 uppercase">{{ nextAppointment.date.split(' ')[1] }}</span>
                            </div>
                            <div class="space-y-2 text-center md:text-left">
                                <h3 class="font-semibold text-lg">{{ nextAppointment.type }}</h3>
                                <div class="flex items-center justify-center md:justify-start gap-2 text-slate-500">
                                    <Clock class="h-4 w-4" />
                                    <span>{{ nextAppointment.time }}</span>
                                </div>
                                <div class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Confirmada
                                </div>
                            </div>
                        </div>
                        <div v-else class="text-center py-8 text-slate-500">
                            No tienes citas próximas programadas.
                        </div>
                    </CardContent>
                    <CardFooter v-if="nextAppointment" class="border-t bg-slate-50/50 p-4">
                        <Button class="w-full sm:w-auto" variant="default">
                            <Video class="mr-2 h-4 w-4" />
                            Unirse a la videollamada
                        </Button>
                    </CardFooter>
                </Card>

                <!-- Quick Actions -->
                <div class="space-y-6">
                    <Card class="shadow-sm hover:shadow-md transition-shadow cursor-pointer group">
                        <CardHeader class="pb-2">
                            <CardTitle class="text-lg group-hover:text-primary transition-colors">Historial de Citas</CardTitle>
                        </CardHeader>
                        <CardContent>
                            <p class="text-sm text-muted-foreground mb-4">Revisa tus sesiones pasadas y notas.</p>
                            <Link href="/portal/appointments">
                                <Button variant="outline" class="w-full justify-between">
                                    Ver Historial
                                    <ArrowRight class="h-4 w-4" />
                                </Button>
                            </Link>
                        </CardContent>
                    </Card>

                    <Card class="shadow-sm hover:shadow-md transition-shadow cursor-pointer group">
                        <CardHeader class="pb-2">
                            <CardTitle class="text-lg group-hover:text-primary transition-colors">Recursos de Ayuda</CardTitle>
                        </CardHeader>
                        <CardContent>
                            <p class="text-sm text-muted-foreground mb-4">Material de lectura y ejercicios.</p>
                             <Button variant="outline" class="w-full justify-between">
                                Explorar
                                <ArrowRight class="h-4 w-4" />
                            </Button>
                        </CardContent>
                    </Card>
                </div>
            </div>
        </div>
    </PatientLayout>
</template>
