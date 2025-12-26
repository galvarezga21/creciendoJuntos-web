<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import PublicLayout from '@/layouts/PublicLayout.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Textarea } from '@/components/ui/textarea';
import { Card, CardContent } from '@/components/ui/card';
import { MapPin, Phone, Mail, Clock, Send } from 'lucide-vue-next';

const submitForm = (e: Event) => {
    // Aquí iría la lógica real de envío o Inertia form
    e.preventDefault();
    alert('¡Gracias por tu mensaje! Nos pondremos en contacto contigo pronto.');
};
</script>

<template>
    <Head title="Contacto - Creciendo Juntos" />
    <PublicLayout>
        <!-- Hero Small -->
        <section class="bg-primary/5 py-16 md:py-24">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-3xl md:text-5xl font-bold text-foreground mb-4">Contáctame</h1>
                <p class="text-lg text-muted-foreground max-w-2xl mx-auto">Estoy aquí para escucharte. Agenda tu cita o hazme cualquier consulta.</p>
            </div>
        </section>

        <section class="py-16 md:py-24">
            <div class="container max-w-6xl mx-auto px-4">
                <div class="grid lg:grid-cols-2 gap-12">
                    <!-- Contact Info -->
                    <div class="space-y-8">
                        <div>
                            <h2 class="text-2xl font-bold mb-6">Información de Contacto</h2>
                            <p class="text-muted-foreground mb-8">
                                Puedes visitarnos en nuestro consultorio, llamarnos o enviarnos un correo. Estaremos encantados de atenderte.
                            </p>
                        </div>

                        <div class="grid gap-6">
                            <Card class="border-none shadow-md">
                                <CardContent class="flex items-center gap-4 p-6">
                                    <div class="h-12 w-12 rounded-full bg-primary/10 flex items-center justify-center shrink-0">
                                        <MapPin class="h-6 w-6 text-primary" />
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-foreground">Dirección</h3>
                                        <p class="text-sm text-muted-foreground">Av. Principal 123, Consultorio 405, Lima, Perú</p>
                                    </div>
                                </CardContent>
                            </Card>

                            <Card class="border-none shadow-md">
                                <CardContent class="flex items-center gap-4 p-6">
                                    <div class="h-12 w-12 rounded-full bg-primary/10 flex items-center justify-center shrink-0">
                                        <Phone class="h-6 w-6 text-primary" />
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-foreground">Teléfono / WhatsApp</h3>
                                        <p class="text-sm text-muted-foreground">+51 987 654 321</p>
                                    </div>
                                </CardContent>
                            </Card>

                            <Card class="border-none shadow-md">
                                <CardContent class="flex items-center gap-4 p-6">
                                    <div class="h-12 w-12 rounded-full bg-primary/10 flex items-center justify-center shrink-0">
                                        <Mail class="h-6 w-6 text-primary" />
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-foreground">Correo Electrónico</h3>
                                        <p class="text-sm text-muted-foreground">contacto@dianacampos.com</p>
                                    </div>
                                </CardContent>
                            </Card>
                            
                             <Card class="border-none shadow-md">
                                <CardContent class="flex items-center gap-4 p-6">
                                    <div class="h-12 w-12 rounded-full bg-primary/10 flex items-center justify-center shrink-0">
                                        <Clock class="h-6 w-6 text-primary" />
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-foreground">Horario de Atención</h3>
                                        <p class="text-sm text-muted-foreground">Lunes a Viernes: 9:00 AM - 8:00 PM</p>
                                        <p class="text-sm text-muted-foreground">Sábados: 9:00 AM - 1:00 PM</p>
                                    </div>
                                </CardContent>
                            </Card>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="bg-white rounded-2xl shadow-xl border border-border p-8">
                        <h2 class="text-2xl font-bold mb-6">Envíame un mensaje</h2>
                        <form @submit="submitForm" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="space-y-2">
                                    <Label for="name">Nombre Completo</Label>
                                    <Input id="name" placeholder="Tu nombre" required />
                                </div>
                                <div class="space-y-2">
                                    <Label for="phone">Teléfono</Label>
                                    <Input id="phone" type="tel" placeholder="+51 999 999 999" />
                                </div>
                            </div>
                            
                            <div class="space-y-2">
                                <Label for="email">Correo Electrónico</Label>
                                <Input id="email" type="email" placeholder="tucorreo@ejemplo.com" required />
                            </div>

                            <div class="space-y-2">
                                <Label for="subject">Asunto</Label>
                                <Input id="subject" placeholder="Consulta sobre terapia..." required />
                            </div>

                            <div class="space-y-2">
                                <Label for="message">Mensaje</Label>
                                <Textarea id="message" placeholder="Cuéntame brevemente cómo puedo ayudarte..." class="min-h-[150px]" required />
                            </div>

                            <Button type="submit" class="w-full text-base h-12">
                                <Send class="mr-2 h-4 w-4" /> Enviar Mensaje
                            </Button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Map Placeholder -->
        <section class="h-96 w-full bg-slate-200 relative">
             <div class="absolute inset-0 flex items-center justify-center text-muted-foreground">
                 <p>Aquí iría el mapa de Google Maps embebido</p>
             </div>
             <!-- <iframe src="..." class="w-full h-full border-0" allowfullscreen="" loading="lazy"></iframe> -->
        </section>
    </PublicLayout>
</template>
