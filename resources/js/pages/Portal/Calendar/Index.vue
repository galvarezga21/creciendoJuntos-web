<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import PatientLayout from '@/layouts/PatientLayout.vue';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { ChevronLeft, ChevronRight } from 'lucide-vue-next';

const days = ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'];
// Mock days for a month
const calendarDays = Array.from({ length: 35 }, (_, i) => {
    const day = i - 2; // Offset to start mid-week
    if (day < 1 || day > 31) return null;
    return {
        day,
        events: day === 15 || day === 22 ? [{ title: 'Terapia Individual', time: '16:00' }] : []
    };
});
</script>

<template>
    <Head title="Calendario - Creciendo Juntos" />
    <PatientLayout>
        <div class="space-y-6">
            <div class="flex items-center justify-between">
                <h1 class="text-3xl font-bold tracking-tight text-slate-900">Calendario</h1>
                <div class="flex items-center gap-2">
                    <Button variant="outline" size="icon"><ChevronLeft class="h-4 w-4" /></Button>
                    <span class="font-medium text-lg min-w-[120px] text-center">Octubre 2023</span>
                    <Button variant="outline" size="icon"><ChevronRight class="h-4 w-4" /></Button>
                </div>
            </div>

            <Card>
                <CardContent class="p-6">
                    <div class="grid grid-cols-7 gap-px bg-slate-200 rounded-lg overflow-hidden border border-slate-200">
                        <!-- Headers -->
                        <div v-for="day in days" :key="day" class="bg-slate-50 p-2 text-center text-sm font-semibold text-slate-500">
                            {{ day }}
                        </div>

                        <!-- Days -->
                        <div v-for="(date, index) in calendarDays" :key="index" class="min-h-[100px] bg-white p-2 hover:bg-slate-50 transition-colors relative group">
                            <span v-if="date" class="text-sm font-medium" :class="{ 'text-primary': date.day === new Date().getDate() }">
                                {{ date.day }}
                            </span>
                            
                            <div v-if="date?.events.length" class="mt-2 space-y-1">
                                <div v-for="(event, i) in date.events" :key="i" class="text-xs p-1 rounded bg-primary/10 text-primary border border-primary/20 truncate">
                                    {{ event.time }} {{ event.title }}
                                </div>
                            </div>
                        </div>
                    </div>
                </CardContent>
            </Card>
        </div>
    </PatientLayout>
</template>
