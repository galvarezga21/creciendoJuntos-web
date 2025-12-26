<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import PatientLayout from '@/layouts/PatientLayout.vue';
import { Card } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { Send, MoreVertical, Phone, Video } from 'lucide-vue-next';

const messages = [
    { id: 1, text: 'Hola, ¿cómo has estado desde la última sesión?', sender: 'doctor', time: '10:30 AM' },
    { id: 2, text: 'Hola Diana, he estado practicando los ejercicios de respiración.', sender: 'me', time: '10:32 AM' },
    { id: 3, text: '¡Me alegra escuchar eso! ¿Has notado alguna mejora en tu ansiedad?', sender: 'doctor', time: '10:33 AM' },
];
</script>

<template>
    <Head title="Ayuda - Creciendo Juntos" />
    <PatientLayout>
        <div class="h-[calc(100vh-12rem)] flex gap-6">
            <!-- Sidebar List -->
            <Card class="w-80 flex flex-col hidden md:flex">
                <div class="p-4 border-b font-semibold">Mensajes</div>
                <div class="flex-1 overflow-y-auto p-2 space-y-2">
                    <div class="p-3 rounded-lg bg-slate-100 flex gap-3 items-center cursor-pointer">
                        <Avatar>
                            <AvatarImage src="/img/psychologist.jpg" />
                            <AvatarFallback>DC</AvatarFallback>
                        </Avatar>
                        <div class="flex-1 overflow-hidden">
                            <div class="flex justify-between items-center">
                                <span class="font-medium text-sm">Psic. Diana</span>
                                <span class="text-[10px] text-slate-500">10:33 AM</span>
                            </div>
                            <p class="text-xs text-slate-500 truncate">¡Me alegra escuchar eso! ¿Has notado alguna mejora...</p>
                        </div>
                    </div>
                </div>
            </Card>

            <!-- Chat Area -->
            <Card class="flex-1 flex flex-col overflow-hidden shadow-lg border-primary/10">
                <!-- Header -->
                <div class="p-4 border-b flex justify-between items-center bg-slate-50/50">
                    <div class="flex items-center gap-3">
                        <Avatar class="h-10 w-10 border-2 border-white shadow-sm">
                            <AvatarFallback class="bg-primary text-primary-foreground">DC</AvatarFallback>
                        </Avatar>
                        <div>
                            <h3 class="font-semibold text-sm">Psic. Diana Campos</h3>
                            <div class="flex items-center gap-1.5">
                                <span class="relative flex h-2 w-2">
                                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                  <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                                </span>
                                <span class="text-xs text-slate-500">En línea</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-1">
                        <Button variant="ghost" size="icon"><Phone class="h-4 w-4" /></Button>
                        <Button variant="ghost" size="icon"><Video class="h-4 w-4" /></Button>
                        <Button variant="ghost" size="icon"><MoreVertical class="h-4 w-4" /></Button>
                    </div>
                </div>

                <!-- Messages -->
                <div class="flex-1 overflow-y-auto p-4 space-y-4 bg-slate-50/30">
                    <div v-for="msg in messages" :key="msg.id" 
                        class="flex" 
                        :class="msg.sender === 'me' ? 'justify-end' : 'justify-start'"
                    >
                        <div 
                            class="max-w-[75%] px-4 py-2 rounded-2xl text-sm shadow-sm"
                            :class="msg.sender === 'me' 
                                ? 'bg-primary text-primary-foreground rounded-br-none' 
                                : 'bg-white text-slate-800 border border-slate-100 rounded-bl-none'"
                        >
                            <p>{{ msg.text }}</p>
                            <span class="text-[10px] opacity-70 block text-right mt-1">{{ msg.time }}</span>
                        </div>
                    </div>
                </div>

                <!-- Input -->
                <div class="p-4 bg-white border-t">
                    <form class="flex gap-2">
                        <Input placeholder="Escribe un mensaje..." class="flex-1" />
                        <Button type="submit" size="icon">
                            <Send class="h-4 w-4" />
                        </Button>
                    </form>
                </div>
            </Card>
        </div>
    </PatientLayout>
</template>
