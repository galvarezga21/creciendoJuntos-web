<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import PublicLayout from '@/layouts/PublicLayout.vue';
import { Button } from '@/components/ui/button';
import { ArrowRight, BookOpen, Award, GraduationCap, Briefcase, UserCheck, Brain, Heart } from 'lucide-vue-next';

const experience = [
    {
        year: '2013',
        title: 'Licenciatura en Psicología',
        description: 'Graduada con honores de la Universidad Nacional Mayor de San Marcos.',
        icon: GraduationCap
    },
    {
        year: '2015',
        title: 'Especialización Clínica',
        description: 'Postgrado en Terapia Cognitivo Conductual y manejo de ansiedad.',
        icon: Award
    },
    {
        year: '2016 - Presente',
        title: 'Práctica Privada',
        description: 'Fundadora del consultorio Creciendo Juntos, atendiendo a más de 500 pacientes.',
        icon: Briefcase
    }
];
</script>

<template>
    <Head title="Sobre Mí - Creciendo Juntos" />
    <PublicLayout>
        <!-- Hero Small -->
        <section class="bg-muted/30 py-16 md:py-24 relative overflow-hidden">
             <div class="absolute inset-0 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px] opacity-50"></div>
            <div class="container mx-auto px-4 text-center relative z-10">
                <h1 class="text-3xl md:text-5xl font-bold text-foreground mb-4">Sobre Mí</h1>
                <p class="text-lg text-muted-foreground max-w-2xl mx-auto">Conoce a la profesional detrás de Creciendo Juntos y mi enfoque terapéutico.</p>
            </div>
        </section>

        <!-- Main Content -->
        <section class="py-16 md:py-24">
            <div class="container max-w-5xl mx-auto px-4 md:px-6">
                <div class="grid lg:grid-cols-2 gap-12 items-start">
                     <!-- Image -->
                    <div class="relative sticky top-24">
                        <div class="absolute inset-0 bg-secondary/20 rounded-3xl transform translate-x-4 translate-y-4"></div>
                        
                         <!-- Main Image Placeholder - Simbolo Psicología -->
                        <div class="relative overflow-hidden rounded-3xl shadow-xl border-4 border-white bg-white shadow-primary/20 aspect-[4/5] w-full max-w-sm lg:max-w-md mx-auto flex flex-col items-center justify-center">
                             <div class="absolute inset-0 bg-gradient-to-br from-primary/5 via-white to-secondary/5"></div>
                             
                             <!-- Psychology Symbol (Brain + Heart concept) -->
                             <div class="relative z-10 flex flex-col items-center justify-center text-primary/80 transition-transform duration-700 hover:scale-105 mb-16">
                                <Brain class="h-32 w-32 md:h-48 md:w-48 lg:h-56 lg:w-56 drop-shadow-lg transition-all duration-500" stroke-width="1" />
                                <div class="mt-4 md:mt-8 text-center space-y-2">
                                    <div class="inline-flex items-center justify-center p-2 md:p-3 rounded-full bg-primary/10 mb-2">
                                        <Heart class="h-5 w-5 md:h-6 md:w-6 text-primary fill-primary/20" />
                                    </div>
                                </div>
                             </div>

                             <div class="absolute bottom-4 md:bottom-6 left-0 right-0 z-20 text-center">
                                 <div class="mx-4 md:mx-6 p-3 md:p-4 rounded-xl bg-white/80 backdrop-blur-md border border-primary/10 shadow-lg">
                                     <p class="font-bold text-base md:text-lg text-primary">Psic. Diana Campos</p>
                                     <p class="text-xs md:text-sm text-muted-foreground">C.Ps.P. 12345</p>
                                 </div>
                             </div>
                        </div>
                    </div>

                    <!-- Text -->
                    <div class="space-y-8">
                        <div>
                            <h2 class="text-3xl font-bold text-foreground mb-2">Hola, soy Diana Campos Del Carpio</h2>
                            <h3 class="text-xl text-primary font-medium flex items-center gap-2">
                                <UserCheck class="w-5 h-5" />
                                Psicóloga Clínica Especializada
                            </h3>
                        </div>
                        
                        <div class="prose prose-slate text-muted-foreground text-lg leading-relaxed">
                            <p>
                                Mi pasión es acompañar a las personas en su proceso de autodescubrimiento y sanación. Con más de 10 años de experiencia en la práctica clínica, he ayudado a cientos de pacientes a superar obstáculos emocionales y construir una vida más plena y significativa.
                            </p>
                            <p>
                                Fundé <strong>Creciendo Juntos</strong> con la visión de crear un espacio que no solo trate síntomas, sino que promueva el desarrollo integral del ser humano. Creo firmemente que cada persona tiene el potencial de transformar su vida cuando cuenta con el apoyo y las herramientas adecuadas.
                            </p>
                        </div>

                        <!-- Timeline -->
                        <div class="pt-8">
                            <h4 class="text-xl font-bold mb-6 flex items-center gap-2">
                                <GraduationCap class="w-6 h-6 text-primary" />
                                Trayectoria Profesional
                            </h4>
                            <div class="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-300 before:to-transparent">
                                <div v-for="(item, index) in experience" :key="index" class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                                    
                                    <div class="flex items-center justify-center w-10 h-10 rounded-full border border-white bg-slate-100 group-[.is-active]:bg-primary text-slate-500 group-[.is-active]:text-white shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10">
                                        <component :is="item.icon" class="w-5 h-5" />
                                    </div>
                                    
                                    <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] p-4 rounded-xl border border-slate-200 bg-white shadow-sm hover:shadow-md transition-shadow">
                                        <div class="flex items-center justify-between space-x-2 mb-1">
                                            <div class="font-bold text-slate-900">{{ item.title }}</div>
                                            <time class="font-caveat font-medium text-primary">{{ item.year }}</time>
                                        </div>
                                        <div class="text-slate-500 text-sm">{{ item.description }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6">
                            <Link href="/contact">
                                <Button size="lg" class="rounded-full px-8 w-full sm:w-auto shadow-lg shadow-primary/20 hover:-translate-y-1 transition-transform">
                                    Agendar una cita
                                    <ArrowRight class="ml-2 h-4 w-4" />
                                </Button>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Philosophy/Quote -->
        <section class="py-24 bg-primary text-primary-foreground relative overflow-hidden">
             <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
             <div class="container mx-auto px-4 text-center max-w-4xl relative z-10">
                <BookOpen class="w-16 h-16 mx-auto mb-8 opacity-80" />
                <blockquote class="text-3xl md:text-5xl font-medium italic mb-10 leading-tight">
                    "La curiosa paradoja es que cuando me acepto tal como soy, entonces puedo cambiar."
                </blockquote>
                <cite class="text-xl font-semibold not-italic opacity-90 block">— Carl Rogers</cite>
             </div>
        </section>
    </PublicLayout>

</template>
